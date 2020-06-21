<?php

namespace App;

use App\Contracts\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Location extends Model implements Taggable
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    function getTaggableId()
    {
        return $this->id;
    }

    function getTaggableType()
    {
        return Location::class;
    }

    function getTaggableTitle()
    {
        return $this->title;
    }

    function tags(): MorphToMany
    {
        return $this->morphedByMany(Tag::class);
    }
}
