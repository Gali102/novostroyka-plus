<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status')->default(0);
            $table->integer('view')->default(0);
            $table->integer('is_featured')->default(0);

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
        Schema::dropIfExists('banks');
    }
}
