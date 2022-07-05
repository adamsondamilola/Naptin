<?php
declare(strict_types=1);
namespace App\Http\Requests;

use App\Enums\KitSize;
use Illuminate\Foundation\Http\FormRequest;

class KitResquest extends FormRequest
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
            'shoeSize' => ['required', 'in:'.KitSize::toString()],
            'overallSize' => ['required', 'in:'.KitSize::toString()],
            'tShirtSize' => ['required', 'in:'.KitSize::toString()]
        ];
    }
}
