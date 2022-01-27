<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('borrowers', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->string('id_loan')->nullable();
      $table->integer('amount')->unsigned()->nullable();
      $table->string('nric')->nullable();
      $table->longText('comment')->nullable();
      $table->string('period')->nullable();
      $table->string('purpose')->nullable();
      $table->string('fullname')->nullable();
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->string('ic_number')->nullable();
      $table->date('birthday')->nullable();
      $table->string('annual_tax')->nullable();
      $table->enum('employment_stat', ['employed', 'unemployed'])->nullable();
      $table->string('dependants_child')->nullable();
      $table->string('ic_front')->nullable();
      $table->string('ic_back')->nullable();
      $table->string('salary')->nullable();
      $table->string('salary_slip')->nullable();
      $table->enum('status', ['pending', 'applied', 'reject', 'finish'])->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('borrowers');
  }
}
