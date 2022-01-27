<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applicants', function (Blueprint $table) {
			$table->id();
			$table->timestamps();

			$table->string('id_loan')->nullable();
			$table->string('subs_id')->nullable();
			$table->string('betterpay_id')->nullable();
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
      $table->dateTime('disbursed_at')->nullable();
			$table->enum('status', ['pending', 'blacklist', 'disbursed', 'finish'])->nullable();

			$table->dateTime('applied_at')->nullable();
			$table->boolean('emandate_stat')->nullable()->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('applicants');
	}
}
