<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DateOfBirthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('date_of_birth', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('date_of_birth', function (Blueprint $table) {
            $table->dropColumn('date_of_birth');
        });
    }
}
