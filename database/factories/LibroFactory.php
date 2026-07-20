<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_MX');

        return [
            'titulo' => $faker->randomElement([
                'Fundamentos de Laravel',
                'PHP moderno para APIs',
                'MySQL practico',
                'Arquitectura REST',
                'Eloquent desde cero',
                'Backend seguro',
                'Pruebas de APIs',
                'Programacion web',
            ]) . ' ' . $faker->unique()->numberBetween(1, 300),
            'autor' => $faker->name(),
            'genero' => $faker->randomElement(['Programacion', 'Base de datos', 'Backend', 'Seguridad', 'Web']),
            'anio_publicacion' => $faker->numberBetween(2005, 2026),
            'paginas' => $faker->numberBetween(120, 900),
            'disponible' => $faker->boolean(80),
            'descripcion' => $faker->paragraph(2),
        ];
    }
}
