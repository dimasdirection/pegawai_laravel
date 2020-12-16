<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('email', 50);
            $table->string('password', 50);
            $table->timestamp('created_time')->nullable();
            $table->dateTime('updated_time');
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->integer('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
