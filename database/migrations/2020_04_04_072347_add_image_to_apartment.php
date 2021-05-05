<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToApartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->string('image')->nullable;
            $table->string('image2')->nullable;
            $table->string('image3')->nullable;
            $table->string('image4')->nullable;
            $table->string('image5')->nullable;
            $table->string('image6')->nullable;
            $table->string('image7')->nullable;
            $table->string('image8')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropColumn('image');
        });

    }
}
