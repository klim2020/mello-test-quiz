<?php

namespace App\Repositories\Interfaces;

interface MovieRepositoryInterface
{
    public function GetAllFilms();

    public function getMovies(mixed $search, mixed $sort);
}
