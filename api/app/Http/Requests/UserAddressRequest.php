<?php
declare(strict_types=1);
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
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
            'stateOfResidence' => ['required', 'integer', 'numeric'],
            'lgaOfResidence' => ['required', 'integer', 'numeric'],
            'stateOfOrigin' => ['required', 'integer', 'numeric'],
            'lgaOfOrigin' => ['required', 'integer', 'numeric'],
            'homeAddress' => ['required', 'regex:/^[A-Za-z1-9\-\s\,]+$/']
        ];
    }

    public function messages(): array
    {
        return [
            'homeAddress.regex' => 'Home address can only contain alphabets, space, comma and dash',
        ];
    }
}
