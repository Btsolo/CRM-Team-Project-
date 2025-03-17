<?php

namespace App\Http\Requests;

use App\Enum\InteractionType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInteractionRequest extends FormRequest
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
            'customer_id' => ['required',Rule::exists('clients','id')],
            'user_id' => ['required',Rule::exists('users','id')],
            'type' => ['required',Rule::in(array_column(InteractionType::cases(), 'value'))],
            'subject' => ['required','string','max:255'],
            'details' => ['nullable','string','max:1000'],
            'interaction_date' => ['required'],
        ];
    }
}
