<?php


namespace App\Http\ValidateRules;


class UserValidateRule
{
    static function id()
    {
        return ['required', 'numeric', 'exists:users,id'];
    }

    static function name()
    {
        return ['required', 'string', 'max:255', 'unique:users,name'];
    }

    static function loginEmail()
    {
        return ['required', 'string', 'email', 'max:255'];
    }

    static function email()
    {
        return ['required', 'string', 'email', 'max:255', 'unique:users'];
    }

    static function updatePassword()
    {
        return ['required', 'string', 'min:8', 'confirmed'];
    }

    static function checkPassword()
    {
        return ['required', 'string'];
    }
}
