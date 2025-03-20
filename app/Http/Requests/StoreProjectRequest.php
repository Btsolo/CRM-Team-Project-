<?php

namespace App\Http\Requests;

use App\Enum\ProjectStatus;
use App\Enum\ProjectPriority;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255' ,Rule::unique('projects')],
            'description' => ['required', 'string', 'max:1000'],
            'status' => ['required', Rule::in(array_column(ProjectStatus::cases(), 'value'))],
            'priority' => ['required', Rule::in(array_column(ProjectPriority::cases(), 'value'))],
            'start_date' => ['required', 'date', function($attribute, $value, $fail){
                if(request()->filled('end_date') && $value > request('end_date')){
                    $fail('The start date must be before the end date');
                }
            }
        ],
            'end_date' => ['nullable', 'date'],
            'budget' => ['required', 'numeric', 'min:100', 'max:1000000'],
            'actual_cost' => ['nullable', 'required_if:status,completed', 'numeric', 'min:100', 'max:1000000'],
            'notes' => ['required', 'max:255', 'string'],
            'customer_id' => ['required', Rule::exists('customers', 'id')]
            
        ];
    }
}
