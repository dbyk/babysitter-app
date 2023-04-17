<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersGetRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'email' => 'string',
            'personality' => 'array:phlegmatic,melancholic,sanguine,choleric',
            'personality.phlegmatic' => 'int|min:1|max:100',
            'personality.melancholic' => 'int|min:1|max:100',
            'personality.sanguine' => 'int|min:1|max:100',
            'personality.choleric' => 'int|min:1|max:100',
        ];
    }
}
