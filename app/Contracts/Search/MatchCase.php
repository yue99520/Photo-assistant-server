<?php


namespace App\Contracts\Search;


use Illuminate\Database\Eloquent\Collection;

interface MatchCase
{
    function getScore();

    function getMatchesWords(): Collection;

    function getSearchableType(): int;
}
