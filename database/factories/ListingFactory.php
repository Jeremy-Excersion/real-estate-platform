<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mls_number' => $this->faker->unique()->numberBetween(1000000, 9999999),
            'status' => $this->faker->randomElement(['Active', 'Pending', 'Sold']),
            'street_address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->stateAbbr,
            'zip_code' => $this->faker->postcode,
            'county' => $this->faker->state,
            'subdivision' => $this->faker->word,
            'year_built' => $this->faker->year,
            'property_type' => $this->faker->randomElement(['Single Family', 'Condo', 'Townhouse']),
            'property_subtype' => $this->faker->randomElement(['Single Family', 'Condo', 'Townhouse']),
            'lot_size' => $this->faker->randomFloat(2, 0, 100),
            'elementary_school' => $this->faker->word,
            'middle_school' => $this->faker->word,
            'high_school' => $this->faker->word,
            'school_district' => $this->faker->word,
            'stories' => $this->faker->randomElement(['1', '2', '3']),
            'bedrooms' => $this->faker->numberBetween(1, 7),
            'bathrooms' => $this->faker->randomElement(['1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5']),
            'square_footage' => $this->faker->numberBetween(1000, 5000),
            'listing_price' => $this->faker->randomFloat(2, 100000, 1000000),
            'description' => $this->faker->paragraph,
            'listing_office_name' => $this->faker->company,
            'idx_include' => $this->faker->boolean,
            'days_on_market' => $this->faker->numberBetween(1, 100),
            'hoa_fees' => $this->faker->randomFloat(2, 0, 100),
            'has_garage' => $this->faker->boolean,
            'has_pool' => $this->faker->boolean,
            'has_basement' => $this->faker->boolean,
        ];
    }
}
