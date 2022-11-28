<?php

namespace App\Rules;

use App\Models\UserFriendship;
use App\Models\UserOrganizationsMap;
use Illuminate\Contracts\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class UserOrganization implements Rule
{
    private int|null $role;
    private int|null $organization_id;
    private int|null $user_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int|null $role, int|null $organizationId, int|null $userId)
    {
        $this->role = $role;
        $this->organization_id = $organizationId;
        $this->user_id = $userId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    #[NoReturn] public function passes($attribute, $value): bool
    {
        return !UserOrganizationsMap::query()
            ->whereRaw('role_id = ? and organization_id = ? and user_id = ?', [$this->role,$this->organization_id, $this->user_id])
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
