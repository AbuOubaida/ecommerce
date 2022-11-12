<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("address");
            $table->string("collection_point_1")->nullable();
            $table->string("collection_point_2")->nullable();
            $table->string("collection_point_3")->nullable();
            $table->string("city");
            $table->string("state")->nullable();
            $table->string("country");
            $table->string("pincode");
            $table->string("mobile")->unique();
            $table->string("email")->unique();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
};
