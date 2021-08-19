<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence,
            'description' => $this->faker->text,
            'adress'=> (string)$this->faker->address,
            'state'=>$this->faker->numberBetween(1, 5),
            'user_id' => User::inRandomOrder()->first()->id,
            ];
    }

}