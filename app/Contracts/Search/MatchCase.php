<?php


namespace App\Contracts\Search;


use Illuminate\Support\Collection;

interface MatchCase
{
    function getScore();

    function getSearchable(): Searchable;

    function getMatchesWords(): Collection;

    function getSearchableClassName(): string;
}
