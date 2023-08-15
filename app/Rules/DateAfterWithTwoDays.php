<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateAfterWithTwoDays implements ValidationRule
{
    protected $referenceDate;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($referenceDate)
    {
        $this->referenceDate = $referenceDate;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $referenceDate = \DateTime::createFromFormat('Y-m-d', $this->referenceDate);
        $inputDate = \DateTime::createFromFormat('Y-m-d', $value);

        // Check if inputDate is greater than referenceDate and difference is at least 2 days
        return $inputDate > $referenceDate && $inputDate->diff($referenceDate)->days >= 2;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected date must be at least 2 days after the reference date.';
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }
}
