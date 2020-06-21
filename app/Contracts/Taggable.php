<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface Taggable
{
    function getTaggableId();

    function getTaggableType();

    function getTaggableTitle();

    function tags(): MorphToMany;
}
