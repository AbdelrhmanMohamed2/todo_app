<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'category' =>[
                'required', 'exists:categories,id'
            ],
            'name' => [
                'required', 'min:2',
                Rule::unique('tasks', 'task')->where('user_id', auth()->user()->id)->where('category_id', $this->category)
            ],

        ];
    }
}
