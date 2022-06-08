<?php

namespace Modules\Share\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPassword implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/', $value);
    }

    public function message()
    {
        return 'Password must be uppercase and lowercase with numbers.';
    }
}
