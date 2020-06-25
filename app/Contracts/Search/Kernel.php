<?php


namespace App\Contracts\Search;


interface Kernel
{
    function search(string $key, SearchScope $scope, float $threshold): Result;
}
