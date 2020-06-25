<?php


namespace App\Services\Search;


use App\Contracts\Search\Result as ResultContract;
use App\Contracts\Search\SearchScope;
use DateInterval;
use Illuminate\Database\Eloquent\Collection;

class Result implements ResultContract
{
    private string $key;

    private SearchScope $scope;

    private DateInterval $interval;

    private Collection $cases;

    public function __construct(string $key, SearchScope $scope, DateInterval $interval, Collection $cases)
    {
        $this->key = $key;
        $this->scope = $scope;
        $this->interval = $interval;
        $this->cases = $cases;
    }

    function getKey(): string
    {
        return $this->key;
    }

    function getScope(): SearchScope
    {
        return $this->scope;
    }

    function getInterval(): DateInterval
    {
        return $this->interval;
    }

    function getCases(): Collection
    {
        return $this->cases;
    }

    function toArray(): array
    {
        return [
            'key' => $this->key,
            'scope' => $this->scope,
            'interval' => $this->interval->format('%s.%F'),
            'cases' => $this->cases->toArray(),
        ];
    }
}
