<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use VfacTmdb\Factory;
use VfacTmdb\Item;
use VfacTmdb\Search;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Подключаемся к IMDB API
        $tmdb = Factory::create()->getTmdb('8b68552ddc3d16c721894361a1420881');

        // люблю я фильмы про Крепкого Орешка
        $search    = new Search($tmdb);
        $movies = $search->movie('Die hard');

        // щас посмотрим повнимательнее
        foreach ($movies as $movie)
        {
            $item = new Item($tmdb);
            $movie_model = Movie::create([
                'id' => $movie->getId(),
                'title' => $movie->getTitle(),
                'rating' => $item->getMovie($movie->getId(), array('language' => 'en-GB'))->getNote(),
            ]);

            $item  = new Item($tmdb);

            //кто снимался в главных ролях
            foreach ($item->getMovie($movie->getId(), array('language' => 'en-GB'))->getCast() as $actor){

                // если актера нету в нашем списке
                if (!(Actor::where('id',$actor->getId())->exists())){

                    //добавим к нам в список
                    $actor_model = Actor::create([
                        'id' => $actor->getId(),
                        'name' => $actor->getName(),
                        'gender' => $actor->getGender(),
                    ]);
                }else{
                    //или получаем актера из списка
                    $actor_model =  Actor::where('id',$actor->getId())->first();
                }

                // не забываем указать связь фильма и актера
                $actor_model->movies()->attach($movie_model);

                //сохраняемся
                $actor_model->save();

            }
            //сохраняемся
            $movie_model->save();

        }
        //ну и звездные войны конешно
        $movies = $search->movie('star wars');

        foreach ($movies as $movie)
        {
            $item = new Item($tmdb);
            $movie_model = Movie::create([
                'id' => $movie->getId(),
                'title' => $movie->getTitle(),
                'rating' => $item->getMovie($movie->getId(), array('language' => 'en-GB'))->getNote(),
            ]);

            $item  = new Item($tmdb);

            //кто снимался в главных ролях
            foreach ($item->getMovie($movie->getId(), array('language' => 'en-GB'))->getCast() as $actor){

                // если актера нету в нашем списке
                if (!(Actor::where('id',$actor->getId())->exists())){

                    //добавим к нам в список
                    $actor_model = Actor::create([
                        'id' => $actor->getId(),
                        'name' => $actor->getName(),
                        'gender' => $actor->getGender(),
                    ]);
                }else{
                    //или получаем актера из списка
                    $actor_model =  Actor::where('id',$actor->getId())->first();
                }

                // не забываем указать связь фильма и актера
                $actor_model->movies()->attach($movie_model);

                //сохраняемся
                $actor_model->save();

            }
            //сохраняемся
            $movie_model->save();

        }

        User::create([
            'name' => 'klim',
            'email' => 'klim@gmail.com',
            'password' => Hash::make('1111'),
            'api_token' => Str::random(60),
        ])->save();//


    }

}
