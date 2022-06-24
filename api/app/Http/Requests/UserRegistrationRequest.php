<?php
declare(strict_types=1);
namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
     * @throws \Exception
     */
    public function rules(): array
    {
        return match ($this->post('step')) {
            1 => $this->step1Validation(),
            default => throw new \Exception('Unexpected registration step'),
        };
    }

    private function step1Validation(): array
    {
        return [
            'firstName' => ['required', 'regex:/^[A-Za-z\-\s]+$/'],
            'surname' => ['required', 'regex:/^[A-Za-z\-\s]+$/'],
            'dateOfBirth' => ['required', 'date'],
            'gender' => ['required', 'in:' . Gender::toString()],
            'email' => ['required', 'email', 'unique:users'],
            'phoneNumber' => ['required', 'digits_between:12,15'],
            'password' => ['required', 'confirmed'],
            'userType' => ['required', 'in:' . UserType::grantedPublicRegistration()],
            'step' => ['required', 'integer']
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
        ];
    }
}
