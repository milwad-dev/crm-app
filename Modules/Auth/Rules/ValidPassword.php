<?php

namespace Mlk\Auth\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPassword implements Rule
{
    public function __construct()
    {

    }

    public function passes($attribute, $value)
    {
        return preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/', $value);
    }

    public function message()
    {
        return 'رمز عبور باید حروف بزرگ و حروف کوچک با اعداد باشد.';
    }
}
