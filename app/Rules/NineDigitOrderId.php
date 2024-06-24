<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NineDigitOrderId implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        // Check if $value is exactly 9 digits
        return preg_match('/^\d{9}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The order_id must be a 9-digit number.';
    }
}
