<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePDCsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_d_cs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('fullName')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('contactNo')->nullable();
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
        Schema::dropIfExists('p_d_cs');
    }
}
