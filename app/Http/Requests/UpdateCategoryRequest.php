<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => [
                'required', 'max:25', 'min:2',
                Rule::unique('categories')->where(function ($query) {
                    return $query->where('user_id', auth()->user()->id)->where('id', '!=', $this->category->id);
                })
            ]
        ];
    }
}
