<?php

namespace AnthonyEdmonds\GovukLaravel\Helpers;

use ErrorException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

/* Models can be created over several form steps using the User's session */
class GovukForm
{
    /* Put a form model into the User's session */
    public static function set(string $key, Model $model): void
    {
        Session::put($key, $model);
    }

    /* Retrieve a form model from the User's session */
    public static function get(string $key): Model
    {
        if (Session::has($key) === false) {
            throw new ErrorException('The form you are trying to access has expired. Please start again.');
        }

        return Session::get($key);
    }

    public static function clear(string $key): void
    {
        Session::forget($key);
    }
}
