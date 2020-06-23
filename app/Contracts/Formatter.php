<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;

interface Formatter
{
    function format(Model $model);
}
