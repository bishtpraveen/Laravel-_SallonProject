<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('owner_name');
            $table->string('shop_name');
            $table->string('address');
            $table->string('user_email');
            $table->string('shop_contact');
            $table->string('provider_user_id');
            $table->string('shop_type');
            $table->string('employ_number');
            $table->string('images');
            $table->string('shop_services');
            $table->string('shop_services_amount');
            $table->string('specillaty_service');
            $table->string('specillaty_service_amount');
            $table->string('user_type');
            $table->string('liked_user_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_infos');
    }
}
