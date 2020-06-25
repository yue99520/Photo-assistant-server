<?php


namespace App\Search;


use App\Location;
use App\Search\Units\SearchLocation;
use App\Services\Search\Kernel as SearchKernel;

class Kernel extends SearchKernel
{
    protected float $threshold = 0.6;

    protected array $units = [

        Location::class => SearchLocation::class
    ];
}
