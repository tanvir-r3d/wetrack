<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Hash;
use Auth;

class MatchOldPassword implements Rule
{

    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth::user()->password);;
    }

    public function message()
    {
        return 'Not matching with current password';
    }
}
