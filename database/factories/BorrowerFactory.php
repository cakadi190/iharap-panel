<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowerFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $amount = $this->faker->randomNumber(5, true);
    $period = $this->faker->randomElement([1, 2, 3, 4, 5]);

    return [
      'created_at'        => $this->faker->dateTimeThisMonth(),
      'updated_at'        => $this->faker->dateTimeThisMonth(),
      'id_loan'           => uniqid(),
      'comment'           => null,
      'purpose'           => 'Gambling',
      'annual_tax'        => $this->faker->randomDigit(),
      'comment'           => '',
      'amount'            => $amount,
      'period'            => $period,
      'fullname'          => $this->faker->name(),
      'nric'              => $this->faker->numberBetween(11111111, 999999999),
      'ic_number'         => $this->faker->word(),
      'email'             => $this->faker->randomElement(['officialcakadi@gmail.com', 'dasakreativa@gmail.com', 'adiboocreative@gmail.com', 'amirzuhdiwibowo123@gmail.com']),
      'phone'             => $this->faker->unique()->phoneNumber(),
      'birthday'          => $this->faker->date(),
      'dependants_child'  => $this->faker->randomDigit(),
      'employment_stat'   => $this->faker->randomElement(['employed', 'unemployed']),
      'status'            => $this->faker->randomElement(['reject', 'pending']),
      'ic_back'           => $this->faker->image(public_path('uploads'), 720, 360, null, false, true, "Hello", false),
      'ic_front'          => $this->faker->image(public_path('uploads'), 720, 360, null, false, true, "Hello", false),
      'salary'            => $this->faker->image(public_path('uploads'), 720, 360, null, false, true, "Hello", false),
      'salary_slip'       => $this->faker->image(public_path('uploads'), 720, 360, null, false, true, "Hello", false),
    ];
  }
}
