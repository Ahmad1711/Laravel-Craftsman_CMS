<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('birthdate');
            $table->string('address');
            $table->string('phone');
            $table->string('affiliation_year');
            $table->string('craft_id');
            $table->string('exam_id');
            $table->string('image');
            $table->string('status')->default(0);
            $table->bigInteger('member_id');
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
        Schema::dropIfExists('members');
    }
}
