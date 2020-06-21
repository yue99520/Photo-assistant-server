<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Entry extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * return query of the condition
     *
     * @return MorphTo
     */
    public function entriable()
    {
        return $this->morphTo();
    }
}
