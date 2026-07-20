<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLibroRequest extends FormRequest
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
            'titulo' => ['required', 'string', 'max:150'],
            'autor' => ['required', 'string', 'max:120'],
            'genero' => ['required', 'string', 'max:80'],
            'anio_publicacion' => ['required', 'integer', 'min:1500', 'max:' . date('Y')],
            'paginas' => ['required', 'integer', 'min:1', 'max:5000'],
            'disponible' => ['required', 'boolean'],
            'descripcion' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
