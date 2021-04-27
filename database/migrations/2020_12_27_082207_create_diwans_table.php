<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiwansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diwans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("book_id");
            $table->string('book_type');
            $table->string('book_date');
            $table->string('book_address');
            $table->string('book_file');
            $table->integer('association_id');
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
        Schema::dropIfExists('diwans');
    }
}
