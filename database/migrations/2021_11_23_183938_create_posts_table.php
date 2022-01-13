<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('bike_type');
            $table->string('city_location');
            $table->decimal('price_hour', $precision = 8, $scale = 2);
            $table->decimal('price_day', $precision = 8, $scale = 2);
            $table->decimal('price_week', $precision = 8, $scale = 2);
            $table->text('description');
            $table->string('main_photo');
            $table->string('second_photo');
            $table->string('third_photo');
            $table->string('email');
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
        Schema::dropIfExists('posts');
    }
}
