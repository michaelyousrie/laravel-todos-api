<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Helpers\UnifiedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateTodoRequest extends FormRequest
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
            'title' => ['required_without_all:body', 'min:4', 'max:50', Rule::unique('todos', 'body')->ignore(request()->todo->id)->where('user_id', auth()->id())],
            'body' => ['required_without_all:title', 'min:4', 'max:99', Rule::unique('todos', 'body')->ignore(request()->todo->id)->where('user_id', auth()->id())],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return UnifiedResponse::unprocessable(['errors' => $validator->errors()])->throwResponse();
    }
}
