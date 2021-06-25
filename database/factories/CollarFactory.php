<?php

namespace Database\Factories;

use App\Models\Collar;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Collar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetName(),
            'author'=>$this->faker->name(),          
            'date'=>$this->faker->date(),
            'shop_id'=>$this->faker->numberBetween($min = 1, $max = 5),   
        ];
    }
}

