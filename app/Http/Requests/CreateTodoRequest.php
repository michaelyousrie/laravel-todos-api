<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Helpers\UnifiedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:4', 'max:50', Rule::unique('todos', 'title')->where('user_id', request()->user()->id)],
            'body' => ['required', 'min:4', 'max:999', Rule::unique('todos', 'body')->where('user_id', request()->user()->id)]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return UnifiedResponse::unprocessable(['errors' => $validator->errors()])->throwResponse();
    }
}
