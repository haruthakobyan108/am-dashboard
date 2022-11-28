<?php

namespace App\Rules;

use App\Models\UserOrganizationsMap;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Contracts\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class IntervalRule implements Rule
{
    private string $from;
    private string $to;
    /**
     * @param mixed $from
     * @param mixed $to
     */
    public function __construct(mixed $from, mixed $to)
    {
        $this->from = $from;
        $this->to = $to;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     * @throws Exception
     */
    #[NoReturn] public function passes($attribute, mixed $value): bool
    {
        $diff = Carbon::parse( $this->from )->diffInDays( $this->to );
        if($diff > 31 ){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'date interval c\'nt be more then 31 days';
    }
}
