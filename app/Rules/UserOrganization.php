<?php

namespace App\Rules;

use App\Models\UserFriendship;
use App\Models\UserOrganizationsMap;
use Illuminate\Contracts\Validation\Rule;

class UserOrganization implements Rule
{
    private int|null $role;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int|null $role)
    {
        $this->role = $role;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return !UserOrganizationsMap::query()
            ->whereRaw('role_id = ? and user_id = ?', [$this->role,$value])
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'already have this role';
    }
}
