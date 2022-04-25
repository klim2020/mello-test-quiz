<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\MovieRepositoryInterface;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function show(Request $request, MovieRepositoryInterface $movie){

        return $movie->getMovies($request->search, $request->sort);;
    }
}
