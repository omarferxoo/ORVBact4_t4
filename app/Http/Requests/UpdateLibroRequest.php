<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLibroRequest extends FormRequest
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
            'titulo' => ['sometimes', 'required', 'string', 'max:150'],
            'autor' => ['sometimes', 'required', 'string', 'max:120'],
            'genero' => ['sometimes', 'required', 'string', 'max:80'],
            'anio_publicacion' => ['sometimes', 'required', 'integer', 'min:1500', 'max:' . date('Y')],
            'paginas' => ['sometimes', 'required', 'integer', 'min:1', 'max:5000'],
            'disponible' => ['sometimes', 'required', 'boolean'],
            'descripcion' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
