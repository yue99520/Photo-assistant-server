<?php


namespace App\Http\ValidateRules;


class LocationValidateRule
{
    static function title()
    {
        return ['required', 'string', 'max:255'];
    }

    static function subTitle()
    {
        return ['required', 'string'];
    }

    static function longitude()
    {
        return ['required', 'numeric'];
    }

    static function latitude()
    {
        return ['required', 'numeric'];
    }

    static function image()
    {
        return ['exists:images,id', 'numeric'];
    }
}
