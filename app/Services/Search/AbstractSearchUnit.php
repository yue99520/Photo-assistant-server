<?php


namespace App\Services\Search;


use App\Contracts\Search\SearchScope;
use App\Contracts\Search\Unit;
use Illuminate\Support\Collection;

abstract class AbstractSearchUnit implements Unit
{

    function search(string $key, SearchScope $scope): Collection
    {
        $result = collect();
        switch ($scope->getRange()) {
            case SearchScope::PRIVATE:
                $result->concat($this->privateSearch($key));
                break;
            case SearchScope::PUBLIC:
                $result->concat($this->publicSearch($key));
                break;
            case SearchScope::GLOBAL:
                $result->concat($this->globalSearch($key));
                break;
            default:
                $result->concat($this->privateSearch($key));
        }
        return $result;
    }

    protected abstract function privateSearch(string $key): Collection;

    protected abstract function publicSearch(string $key): Collection;

    protected abstract function globalSearch(string $key): Collection;
}
