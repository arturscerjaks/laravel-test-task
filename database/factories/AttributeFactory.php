<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => fake()->word(),
            'value' => fake()->word()
        ];
    }

    public function length(): AttributeFactory
    {
        return $this->state(
            fn(array $attributes) => [
                'key' => 'length (cm)',
                'value' => fake()->numberBetween(1, 20)
            ]
        );
    }

    public function width(): AttributeFactory
    {
        return $this->state(
            fn(array $attributes) => [
                'key' => 'width (cm)',
                'value' => fake()->numberBetween(1, 20)
            ]
        );
    }

    public function color(): AttributeFactory
    {
        return $this->state(
            fn(array $attributes) => [
                'key' => 'color',
                'value' => fake()->safeColorName()
            ]
        );
    }

    public function weight(): AttributeFactory
    {
        return $this->state(
            fn(array $attributes) =>
            [
                'key' => 'weight (grams)',
                'value' => fake()->numberBetween(10, 2000)
            ]
        );
    }
}