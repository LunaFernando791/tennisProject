<?php

namespace Database\Factories;
use App\Models\Calzado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calzado>
 */
class CalzadoFactory extends Factory
{

    /**
     * Summary of definition
     * @return array
     */
    public function definition():array
    {
        return [
            'marca'=>$this->faker->word(),
            'modelo'=>$this->faker->word(),
            'precio'=>$this->faker->numberBetween(0,2000),
            'detalle'=>$this->faker->text(),
            'imagen'=>$this->faker->imageUrl(),
        ];
    }
}
