<?php

namespace Src\Modules\Student\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => ['required'],
            'cpf' => ['required'],
            'birth_date' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'cep' => ['required'],
            'marital_status' => ['required'],
            'responsibility' => ['required']
        ];
    }
}
