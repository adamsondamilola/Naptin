<?php
declare(strict_types=1);
namespace App\Http\Requests;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;

class TraineeRegistrationRequest extends FormRequest
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
        return match ($this->input('step')) {
            1 => $this->step1Validation(),
        };
    }

    private function step1Validation(): array
    {
        return [
            'firstName' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'dateOfBirth' => ['required', 'date'],
            'gender' => ['required', 'in:' . Gender::strings()],
            'email' => ['required', 'email', 'unique:users'],
            'phoneNumber' => ['required', 'digits_between:12,15'],
            'password' => ['required', 'confirmed'],
            'step' => ['required', 'integer']
        ];
    }
}
