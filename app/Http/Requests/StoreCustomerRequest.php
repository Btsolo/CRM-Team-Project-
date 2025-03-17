<?php

namespace App\Http\Requests;

use App\Enum\CustomerIndustry;
use App\Enum\CustomerStatus;
use App\Enum\CustomerTag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email' => ['required','email','lowercase'],
            'phone_number' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15'],
            'company_name' => ['required','string','max:255'],
            'industry' => ['nullable',Rule::in(array_column(CustomerIndustry::cases(),'value'))],
            'tags' => ['nullable', Rule::in(array_column(CustomerTag::cases(), 'value'))],
            'status' => ['required', Rule::in(array_column(CustomerStatus::cases(), 'value'))]
        ];
    }
}
