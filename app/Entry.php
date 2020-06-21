<?php

namespace App;

use App\Contracts\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Entry extends Model implements Taggable
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    function getTaggableId()
    {
        return $this->id;
    }

    function getTaggableType()
    {
        return Entry::class;
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
