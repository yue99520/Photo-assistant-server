<?php


namespace App\Contracts\Search;


use Illuminate\Support\Collection;

interface Unit
{
    function search(string $key, SearchScope $scope): Collection;
}
