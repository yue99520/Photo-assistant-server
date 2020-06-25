<?php


namespace App\Contracts\Search;


use Illuminate\Database\Eloquent\Collection;

interface SearchScope
{
    const PRIVATE = 1;

    const PUBLIC = 2;

    const GLOBAL = 3;

    function getSearchableNames(): Collection;

    function setSearchableNames(Collection $types);

    function getRange(): int;

    function setRange(int $range);
}
