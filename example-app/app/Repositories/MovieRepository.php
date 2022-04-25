<?php

namespace App\Repositories;

use App\Models\Actor;
use App\Models\Movie;
use App\Repositories\Interfaces\MovieRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MovieRepository implements MovieRepositoryInterface
{

    //Репоситорий для работы с фильмами

    public function GetAllFilms(){
        return Movie::all();
    }

    /**
     * @param mixed $search - параметры для поиска
     * @param mixed $sort - параметры для сортировки
     * @return mixed
     */
    public function getMovies(mixed $search, mixed $sort)
    {
        $movie = Movie::with('actors');

        foreach ($search as $val){
            $val['value']= ($val['condition'] == 'like')?'%'.$val['value'].'%':$val['value'];
            $movie = $movie->orWhere($val['field'], $val['condition'],$val['value'] );
        }
        $movie = $movie->orderBy($sort['field'], $sort['type']);

        return response()->json($movie->get());
    }
}
