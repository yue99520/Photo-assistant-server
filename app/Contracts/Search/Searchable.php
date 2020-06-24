<?php


namespace App\Contracts\Search;


use Illuminate\Database\Eloquent\Collection;

interface Searchable
{
    function getKeyWords(): Collection;

    function getSearchableType(): int;
}
