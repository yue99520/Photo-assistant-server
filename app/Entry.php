<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function entriable()
    {
        return $this->morphTo();
    }
}
