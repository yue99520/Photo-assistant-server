<?php


namespace App\Search\Units;


use App\Location;
use App\Services\Search\AbstractSearchUnit;
use App\Services\Search\Algorithm\LengthRatioScoring;
use App\Services\Search\MatchCase;
use Illuminate\Support\Collection;

class SearchLocation extends AbstractSearchUnit
{

    protected function privateSearch(string $key): Collection
    {
        $locations = auth()->user()->locations()->get();

        return $this->searchLocations($locations, $key);
    }

    private function searchLocations(Collection $locations, $key): Collection
    {

        $results = collect();
        $locations->each(function (Location $location, $k) use ($results, $key) {

            $matchedKeyword = null;
            $finalScore = 0;

            $words = $location->getKeywords();
            $words->each(function ($word, $k) use (&$matchedKeyword, &$finalScore, $key) {

                $main = $word->title;
                $score = LengthRatioScoring::score($key, $main);

                if ($score >= $finalScore) {
                    $finalScore = $score;
                    $matchedKeyword = $word;
                }
            });

            if (is_null($matchedKeyword)) {

                $case = new MatchCase($location, $finalScore, $matchedKeyword, Location::class);
                $results->concat($case);
            }
        });

        return $results;
    }

    protected function publicSearch(string $key): Collection
    {
        // TODO: Implement publicSearch() method.
        return collect();
    }

    protected function globalSearch(string $key): Collection
    {
        // TODO: Implement globalSearch() method.
        return collect();
    }
}
