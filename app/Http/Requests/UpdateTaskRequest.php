<?php

namespace App\Http\Requests;

use App\Enum\TaskStatus;
use App\Enum\TaskPriority;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title' => ['required','max:255',Rule::unique('tasks')->ignore($this->route('task')->id)],
            'description' => ['required','max:1000','string'],
            'user_id' => ['required',Rule::exists('users','id')],
            'customer_id' => ['nullable',Rule::exists('customers','id')],
            'status' => ['required',Rule::in(array_column(TaskStatus::cases(),'value'))],
            'priority' => ['required',Rule::in(array_column(TaskPriority::cases(),'value'))],
            'due_date' => ['required'],
            'completed_at' => ['nullable']
        ];
    }
}
