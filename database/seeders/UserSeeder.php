<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Role::create(['name' => 'admin']);
    Role::create(['name' => 'employee']);

    User::create([
      'email'             => 'admin@iharap.sg',
      'password'          => bcrypt('sysadmin123'),
      'status'            => true,
      'fullname'          => 'System Administrator',
      'email_verified_at' => now(),
    ]);

    User::first()->assignRole('admin');
  }
}
