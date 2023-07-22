<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MultipleOf implements Rule
{
    protected $multiple;

    public function __construct($multiple)
    {
        $this->multiple = $multiple;
    }

    public function passes($attribute, $value)
    {
        return $value % $this->multiple === 0;
    }

    public function message()
    {
        return 'The :attribute must be a multiple of ' . $this->multiple;
    }
}
