<?php


namespace App;


use App\Contracts\Taggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title'];

    public function attach(Taggable $taggable)
    {
        $this->taggables()->attach($taggable);
    }

    public function taggables()
    {
        return $this->morphToMany();
    }

    public function detach(Taggable $taggable)
    {
        $this->taggables()->detach($taggable);
    }
}
