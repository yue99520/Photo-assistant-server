<?php


namespace App\Services\Search;


use App\Contracts\Search\MatchCase as CaseContract;
use App\Contracts\Search\Searchable;
use Illuminate\Support\Collection;

class MatchCase implements CaseContract
{
    private Searchable $searchable;

    private float $score;

    private Collection $keyWords;

    private string $searchableName;

    public function __construct(Searchable $searchable, float $score, Collection $keyWords, string $searchableName)
    {
        $this->searchable = $searchable;
        $this->score = $score;
        $this->keyWords = $keyWords;
        $this->searchableName = $searchableName;
    }

    function getScore()
    {
        return $this->score;
    }

    function getMatchesWords(): Collection
    {
        return $this->keyWords;
    }

    function getSearchableClassName(): string
    {
        return $this->searchableName;
    }

    function getSearchable(): Searchable
    {
        return $this->searchable;
    }
}
