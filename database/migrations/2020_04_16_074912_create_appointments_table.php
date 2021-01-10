<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('appoint_user_name');
            $table->string('appoint_user_email');
            $table->string('appoint_user_contact');
            $table->string('appoint_date');
            $table->string('appoint_time');
            $table->string('shop_appoint_name');
            $table->string('shop_appoint_id');
            $table->string('shop_appoint_email');
            $table->string('amount')->nullable();
            $table->string('payment_order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('status')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
