<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('leads')->ignore($this->lead?->id ?? $this->route('lead'))
            ],
            'phone' => [
                'required',
                'regex:/^\d{8,}$/',
                Rule::unique('leads')->ignore($this->lead?->id ?? $this->route('lead'))
            ],
            'country' => 'required|string|max:100',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number must contain at least 8 digits.',
            'country.required' => 'Please select a country.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'first name',
            'last_name' => 'last name',
            'email' => 'email address',
            'phone' => 'phone number',
            'country' => 'country',
        ];
    }

}
