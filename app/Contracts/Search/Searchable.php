<?php


namespace App\Contracts\Search;


use Illuminate\Database\Eloquent\Collection;

interface Searchable
{
    function getSearchableTitle(): string;

    function getKeywords(): Collection;

    function getSearchableType(): int;
}
