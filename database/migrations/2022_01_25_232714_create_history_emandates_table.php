<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryEmandatesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('history_emandates', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string("fullname")->nullable();
      $table->string("subs_id")->nullable();
      $table->string("phone")->nullable();
      $table->string("bank_id")->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('history_emandates');
  }
}
