<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [  
        
        'first_name'=>'required|max:255|min:3',
        'middle_name'=>'required|max:255|min:3',
        'last_name'=>'required|max:255|min:3',
        'phone'=>'required|string|min:10|max:10',
        'password'=>'required|string'
     
            //
        ];
    }
}
