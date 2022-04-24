<?php

namespace App\Providers;

use App\Repositories\Interfaces\MovieRepositoryInterface;
use App\Repositories\MovieRepository;
use Illuminate\Support\ServiceProvider;

class MovieRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MovieRepositoryInterface::class,MovieRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
