<?php

namespace App\Rules;

use App\Model\Product\p_group;
use Illuminate\Contracts\Validation\Rule;

class CheckSubset implements Rule
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
        $mygroup=p_group::with('toSub')->find($value)->toSub()->count();
        return  $mygroup==0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Haveasubsetcantdelete';
    }
}
