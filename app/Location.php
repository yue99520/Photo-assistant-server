<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'entry_amount' => $this->entries()->count(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function fromArray(array $data = [])
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        $this->longitude = $data['longitude'];
        $this->latitude = $data['latitude'];
        $this->title = $data['title'];
        $this->subtitle = $data['subtitle'];
    }
}
