<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function($t){
            $t->increments('id');
            $t->integer('age');
            $t->integer('weight');
            $t->text('text_info');
            $t->json('json_info');
            $t->timestamps();
        });

        Schema::create('meta_cols', function($t){
            $t->increments('id');
            $t->integer('entity_id');
            $t->integer('meta_key');
            $t->integer('meta_value');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entities');

        Schema::drop('meta_cols');
    }
}
