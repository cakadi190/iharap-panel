<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $stat   = $this->faker->randomElement([0, 1]);
      $status = $stat == 1 ? $this->faker->randomElement(['disbursed', 'blacklist', 'finish']) : 'pending';
      return [
        'created_at'        => $this->faker->dateTimeThisMonth(),
        'updated_at'        => $this->faker->dateTimeThisMonth(),
        'id_loan'           => uniqid(),
        'comment'           => '',
        'annual_tax'        => $this->faker->randomDigit(),
        'purpose'           => 'Gambling',
        'comment'           => null,
        'amount'            => $this->faker->randomNumber(5, true),
        'period'            => $this->faker->randomElement([1, 2, 3, 4, 5]),
        'fullname'          => $this->faker->name(),
        'nric'              => $this->faker->numberBetween(11111111, 999999999),
        'ic_number'         => $this->faker->word(),
        'email'             => $this->faker->randomElement(['officialcakadi@gmail.com', 'dasakreativa@gmail.com', 'adiboocreative@gmail.com', 'amirzuhdiwibowo123@gmail.com']),
        'phone'             => $this->faker->unique()->phoneNumber(),
        'birthday'          => $this->faker->date(),
        'dependants_child'  => $this->faker->randomDigit(),
        'employment_stat'   => $this->faker->randomElement(['employed', 'unemployed']),
        'status'            => $status,
        'ic_back'           => $this->faker->image(public_path('/uploads'), 720, 360, null, false, true, "Hello", false),
        'ic_front'          => $this->faker->image(public_path('/uploads'), 720, 360, null, false, true, "Hello", false),
        'salary'            => $this->faker->image(public_path('/uploads'), 720, 360, null, false, true, "Hello", false),
        'salary_slip'       => $this->faker->image(public_path('/uploads'), 720, 360, null, false, true, "Hello", false),
        'applied_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        'emandate_stat'     => $stat,
      ];
    }
}
