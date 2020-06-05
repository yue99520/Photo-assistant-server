<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCondition extends Model
{
    protected $fillable = ['event'];

    protected $table = "event_conditions";

    public function entry()
    {
        return $this->morphOne(Entry::class, "entriable");
    }
}
