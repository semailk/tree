<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CertificateStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:100',
                'required'
            ],
            'last_name' => [
                'string',
                'min:2',
                'max:100',
                'required'
            ],
            'email' => [
                'email',
                'min:5',
                'max:100',
                'required'
            ],
            'plantation_year' => [
                'string',
                'required'
            ],
            'to_be_paid' => [
                'numeric'
            ]
        ];
    }
}
