<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NextOfKinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['required', 'regex:/^[A-Za-z\-\s]+$/'],
            'surname' => ['required', 'regex:/^[A-Za-z\-\s]+$/'],
            'relationship' => ['required', 'integer'],
            'address' => ['required', 'regex:/^[A-Za-z1-9\-\s\,]+$/'],
            'phoneNumber' => ['required', 'digits_between:12,15']
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages(): array
    {
        return [
            'firstName.regex' => 'First name can only contain alphabets, space and dash',
            'surname.regex' => 'Surname can only contain alphabets, space and dash',
            'address.regex' => 'Address can only contain alphabets, space, comma and dash'
        ];
    }
}
