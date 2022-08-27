<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id())],
            'profile_image' => ['mimes:jpg,png,jpeg', 'max:2048', Rule::requiredIf(auth()->user()->profile_image == null)],
            'bio' => ['required', 'string', 'max:2048'],
            'academy_id' => ['required', 'max:1'],
            'skills' => ['required', 'min:5', 'max:10']
        ];
    }
}
