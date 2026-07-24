<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', Rules\Password::defaults()],
            'password_confirmation' => ['required', 'same:password'],
            'cep' => ['required', 'string', 'max:9'],
            'address' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:2'],
            'number' => ['required', 'string', 'max:20'],
            'complement' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'birth_date' => ['required', 'date', 'before:today'], 
            'CPF' => ['required', 'string', 'max:14', 'unique:'.User::class],
            'balance' => ['required', 'numeric', 'min:0'],
        ];
    }

    /**
     * Customize error messages.
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'Este e-mail já está cadastrado.',
            'CPF.unique' => 'Este CPF já está cadastrado.',
            'password_confirmation.same' => 'A confirmação de senha não confere com a senha.',
            'date.before' => 'A data de nascimento deve ser anterior a hoje.',
        ];
    }
}
