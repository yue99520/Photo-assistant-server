<?php


namespace App\Http\Formatters;

use App\Contracts\Formatter;
use Illuminate\Database\Eloquent\Model;

class UserFormatter implements Formatter
{

    function format(Model $user)
    {
        return [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "created_at" => $user->created_at,
            "updated_at" => $user->updated_at
        ];
    }
}
