<?php
require 'vendor/autoload.php';

use VfacTmdb\Factory;
use VfacTmdb\Search;
use VfacTmdb\Item;

$movies_arr = array();
$actors_arr = array();



// Initialize Wrapper
$tmdb = Factory::create()->getTmdb('8b68552ddc3d16c721894361a1420881');

// Search a movie
$search    = new Search($tmdb);

$movies = $search->movie('Die hard');

// Get all results
foreach ($movies as $movie)
{

   // echo "movie - ".$movie->getTitle().": id-".$movie->getNote()."\n";
    $item  = new Item($tmdb);

    $movies_arr[$movie->getId()] = array ('name'=>$movie->getTitle(),
                            'id'=>$movie->getId(),'actors'=>array());

    foreach ($item->getMovie($movie->getId(), array('language' => 'en-GB'))->getCast() as $actor){
        $actors_arr[$actor->getId()] = array('name'=>$actor->getName(), 'id'=>$actor->getId(), 'movies'=>array());
        if (array_search($actor->getId(),$movies_arr[$movie->getId()]['actors'])===false){
            array_push($movies_arr[$movie->getId()]['actors'],$actor->getId());
        }
        if (array_search($movie->getId(),$actors_arr[$actor->getId()]['movies'])===false){
            array_push($actors_arr[$actor->getId()]['movies'],$movie->getId());
        }

    }

}
var_dump($actors_arr);
var_dump($movies_arr);


