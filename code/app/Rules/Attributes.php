<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Attributes implements Rule
{
    /**
     * @var int
     */
    private $amount;

    /**
     * Create a new rule instance.
     *
     * @param int $amount
     */
    public function __construct(int $amount = 2)
    {
        $this->amount = $amount;
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
        $artifactAttributes = collect(explode(';', $value))->filter();
        return $artifactAttributes->count() >= $this->amount;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans_choice('validation.custom.attributes.amount', $this->amount, ['amount' => $this->amount]);
    }
}
