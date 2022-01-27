<?php

namespace Database\Seeders;

use Database\Factories\ApplicantFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    // $this->call(ApplicantSeeder::class);
    $this->call(BorrowerSeeder::class);
    $this->call(UserSeeder::class);
  }
}
