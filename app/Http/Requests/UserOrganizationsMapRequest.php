<?php

namespace App\Http\Requests;

use App\Rules\UserOrganization;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $role
 * @property mixed $organization_id
 * @property mixed $user_id
 */
class UserOrganizationsMapRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'user_id' => ['required', new UserOrganization($this->role,$this->organization_id, $this->user_id)],
             'role' => 'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
