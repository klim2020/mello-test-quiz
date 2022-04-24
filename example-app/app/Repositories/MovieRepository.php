<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Repositories\Interfaces\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{

    //Репоситорий для работы с фильмами

    public function GetAllFilms(){
        return Movie::all();
    }

}
