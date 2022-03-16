<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            
            $table->bigInteger('chef_type_id')->unsigned();
            $table->string('file_govt_id')->nullable();
            $table->string('file_culinary_cert')->nullable();
            $table->string('school')->nullable();
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_rejected')->default(0);
            $table->boolean('is_agrmt_signed')->default(0);

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
        Schema::dropIfExists('chefs');
    }
}
