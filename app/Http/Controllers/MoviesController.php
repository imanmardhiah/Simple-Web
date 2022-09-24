<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(6); //display 6 movies per page
        return view('user.movieindex', compact('movies'));
    } 

    public function show($id) //show one movie for user
    {
        $movie = Movie::findOrFail($id);
        return view('user.movie', compact('movie'));
    }
}
