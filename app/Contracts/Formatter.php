<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface Formatter
{
    function formatOne(Model $model);

    function formatMany(Collection $models);
}
