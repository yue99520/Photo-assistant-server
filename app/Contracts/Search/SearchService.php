<?php


namespace App\Contracts\Search;


use Illuminate\Database\Eloquent\Collection;

interface SearchService
{
    function search(string $key, SearchScope $scope): SearchResult;

    function setSearchableTypes(Collection $types);
}
