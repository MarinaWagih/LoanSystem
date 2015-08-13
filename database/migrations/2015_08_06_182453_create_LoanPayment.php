<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->double('quantity');
            $table->integer('loan_id')->unsigned();
            $table->dateTime('date');
            $table->timestamps();
            $table->foreign('loan_id')
                ->references('id')
                ->on('loans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loan_payment');
    }
}
