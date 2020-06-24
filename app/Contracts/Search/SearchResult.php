<?php


namespace App\Contracts\Search;


use DateInterval;
use Illuminate\Database\Eloquent\Collection;

interface SearchResult
{
    function getKey(): string;

    function getScope(): SearchScope;

    function getInterval(): DateInterval;

    function getCases(): Collection;

    function getCasesCount(): int;
}
