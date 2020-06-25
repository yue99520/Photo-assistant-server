<?php


namespace App\Contracts\Search;


use DateInterval;
use Illuminate\Support\Collection;

interface Result
{
    function getKey(): string;

    function getScope(): SearchScope;

    function getInterval(): DateInterval;

    function getCases(): Collection;

    function toArray(): array;
}
