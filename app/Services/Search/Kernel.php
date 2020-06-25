<?php


namespace App\Services\Search;


use App\Contracts\Search\Kernel as KernelContract;
use App\Contracts\Search\MatchCase;
use App\Contracts\Search\SearchScope;
use App\Contracts\Search\Unit;
use DateTime;
use Illuminate\Support\Collection;

class Kernel implements KernelContract
{
    protected float $threshold = 0.6;

    protected array $units = [];

    public function search(string $key, SearchScope $scope, float $threshold): Result
    {
        $startDateTime = new DateTime();

        $unitInstances = $this->getUnitInstances($scope);

        $cases = $this->searchInUnits($unitInstances, $key, $scope);

        $interval = $startDateTime->diff(new DateTime());

        return new Result($key, $scope, $interval, $cases);
    }

    private function getUnitInstances(SearchScope $scope): Collection
    {
        $units = collect($this->units);

        return $units->filter(function ($value, $key) use ($scope) {

            return $scope->getSearchableNames()->contains($key);

        })->map(function ($value, $key) {

            return new $value();
        })->values();
    }

    private function searchInUnits(Collection $units, string $key, SearchScope $scope): Collection
    {
        return $units->map(function (Unit $unit, $key) use ($key, $scope) {

            $unitCases = $unit->search($key, $scope);

            $unitCases = $this->scoreThreshold($unitCases);

            return $unitCases;

        })->flatten();
    }

    private function scoreThreshold(Collection $unitCases): Collection
    {
        return $unitCases->reject(function (MatchCase $case, $key) {
            return $case->getScore() < $this->threshold;
        });
    }
}
