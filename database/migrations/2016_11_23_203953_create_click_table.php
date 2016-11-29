<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('ua');
            $table->string('ip');
            $table->string('ref');
            $table->string('param1');
            $table->string('param2');
            $table->integer('error')->default(0);
            $table->boolean('bad_domain')->default(false);
            $table->timestamps();
            $table->unique(['ref', 'param1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('click');
    }
}
