<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(6); //display 6 movies per page
        return view('admin.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request); //to see the data being submitted in the database by coding display
        $request->validate([
            'title' => "required|string",
            'description' => "required|string",
            'genre' => "required|string",
            'production' => "required|string",
            'releaseyear' => "required|string",
            'main_picture' => "nullable|image|mimes:jpg,png,jpeg,gif",
            'addMoreInputFields.*.name' => "required|string",
            'addMoreInputFields.*.profile_picture' => "nullable|image|mimes:jpg,png,jpeg,gif",
        ]);
        //better using model shorter line rather than using DB manual way
        $movie = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'production' => $request->production,
            'releaseyear' => $request->releaseyear,
            'main_picture' => $request->main_picture ? request()->file('main_picture')->store('/image/movies') : null,
            //user images will be stored in storage/public/...
        ]);
        
        foreach ($request->addMoreInputFields as $key => $value) {
            $cast= Cast::create([
                'movie_id' => $movie->id,
                'name' => $value['name'],
                'profile_picture' => $value['profile_picture']->store("/image/movies"),
            ]);
        }
        
        return back()->with('success','Movie successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('admin.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'title' => "required|string",
            'description' => "required|string",
            'genre' => "required|string",
            'production' => "required|string",
            'releaseyear' => "required|string",//'email' => "required|email|unique:users,email,".$id,
            'main_picture' => "nullable|image|mimes:jpg,png,jpeg,gif",
        ]);

        $movie = Movie::find($id);

        if ($request->main_picture){
            Storage::delete($movie->main_picture);
            $picture = request()->file('main_picture')->store('/image/movie');
        }
        else if ($request->main_picture == null){
            $picture = $movie->main_picture;
        }
        else{
            $picture =  null;
        }

        $movie->update([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'production' => $request->production,
            'releaseyear' => $request->releaseyear,
            'main_picture' => $picture,
        ]);
        return back()->with('success','Movie successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        Storage::delete($movie->main_picture);
        $movie->delete();
        return back()->with('success','Movie successfully deleted.');
    }
}
