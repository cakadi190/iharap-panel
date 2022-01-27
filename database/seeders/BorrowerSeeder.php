<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BorrowerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    File::cleanDirectory('public/uploads');
    \App\Models\Borrower::factory(30)->create();
  }
}
