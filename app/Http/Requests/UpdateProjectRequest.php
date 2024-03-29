<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            //validazione

            'title' => 'required|string',
            'description' => 'max:100|string',
            'code' => 'max:30|string',
            'last_commit' => 'date',
            'type_id' => 'required|integer',
            'technologies' => 'required|array',
        ];
    }
}
