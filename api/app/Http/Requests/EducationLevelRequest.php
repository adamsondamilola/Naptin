<?php
declare(strict_types=1);
namespace App\Http\Requests;

use App\Enums\EducationLevel;
use Illuminate\Foundation\Http\FormRequest;

class EducationLevelRequest extends FormRequest
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
            'level' => ['required', 'in:'.EducationLevel::toString()],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
            'institutionName' => ['required', 'string'],
            'qualificationObtained' => ['required', 'string'],
            'document' => ['nullable', 'file', 'mimes:jpeg,jpg,png,pdf', 'max:10000']
        ];
    }

    public function messages(): array
    {
        return [
            'document.size' => 'Document size can be maximum of 10mb'
        ];
    }
}
