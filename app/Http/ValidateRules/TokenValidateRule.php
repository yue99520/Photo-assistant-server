<?php


namespace App\Http\ValidateRules;


class TokenValidateRule
{
    static function deviceName()
    {
        return ['required', 'string'];
    }
}
