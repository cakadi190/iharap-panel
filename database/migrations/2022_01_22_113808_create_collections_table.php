<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('collections', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->string('loan_id')->nullable();
      $table->string('pay_seq')->nullable();
      $table->string('max_pay_seq')->nullable();
      $table->string('amount')->nullable();
      $table->enum('status', ['pending', 'fail', 'success'])->nullable();
      $table->dateTime('paid_at')->nullable();
      $table->dateTime('due_date')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('collections');
  }
}
