<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rating;

class MovieRatings extends Component
{
    public $rating;
    public $ratings;
    public $currentRating = '-';
    public $comment;
    public $currentId;
    public $movie;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render() //show comments 
    {
        $comments = Rating::where('movie_id', $this->movie->id)->where('status', 1)->with('user')->get();
        return view('livewire.movie-ratings', compact('comments'));
    }

    public function mount() 
    {
        if(auth()->user()){
            $rating = Rating::where('user_id', auth()->user()->id)->where('movie_id', $this->movie->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
            $this->ratings = Rating::where('movie_id', $this->movie->id)->get();//count directly here directly from the database
            if ($this->ratings->count()) {
               $this->currentRating = round($this->ratings->sum('rating') / $this->ratings->count(), 2) . ' / 5 (' . $this->ratings->count() . ' votes)';
            }
        }
        return view('livewire.movie-ratings');
    }

    public function delete($id) //delete comment with user id as parameter
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate() 
    {
        $rating = Rating::where('user_id', auth()->user()->id)->where('movie_id', $this->movie->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->movie_id = $this->movie->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->update();
                $this->currentRating = round(($this->ratings->sum('rating') + $rating->rating) / ($this->ratings->count() + 1), 1) . ' / 5 (' . ($this->ratings->count() + 1) . ' votes)';$this->currentRating = round(($this->ratings->sum('rating') + $rating->rating) / ($this->ratings->count() + 1), 1) . ' / 5 (' . ($this->ratings->count() + 1) . ' votes)';
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $rating = new Rating;
            $rating->user_id = auth()->user()->id;
            $rating->movie_id = $this->movie->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            
            try {
                $rating->save(); 
                $this->currentRating = round(($this->ratings->sum('rating') + $rating->rating) / ($this->ratings->count() + 1), 1) . ' / 5 (' . ($this->ratings->count() + 1) . ' votes)';
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
}