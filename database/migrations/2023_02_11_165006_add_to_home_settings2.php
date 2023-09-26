<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToHomeSettings2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('separator_title');
            $table->text('separator_description');
            $table->string('separator_button1_text');
            $table->string('separator_button1_link');
            $table->string('separator_button2_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            //
        });
    }
}
