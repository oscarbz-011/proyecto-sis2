<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDoctorHasDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_has_dates', function (Blueprint $table) {
            $table->foreign(['dates_id'], 'doctor_has_dates_ibfk_1')->references(['id_date'])->on('dates');
            $table->foreign(['doctors_id'], 'doctor_has_dates_ibfk_2')->references(['id_doctor'])->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_has_dates', function (Blueprint $table) {
            $table->dropForeign('doctor_has_dates_ibfk_1');
            $table->dropForeign('doctor_has_dates_ibfk_2');
        });
    }
}
