<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Historys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     // Store detailed bank account history. To see details for further checking
     public function up()
     {
         Schema::create('historys', function (Blueprint $table) {
             $table->id();
             $table->string('name_bank');
             $table->decimal('total', 15,2);
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
        //
    }
}
