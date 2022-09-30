<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consults', function (Blueprint $table) {
            $table->foreign(['doctors_id'], 'fk_consults_doctors1')->references(['id_doctor'])->on('doctors');
            $table->foreign(['patients_id'], 'fk_consults_patients1')->references(['id_patient'])->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consults', function (Blueprint $table) {
            $table->dropForeign('fk_consults_doctors1');
            $table->dropForeign('fk_consults_patients1');
        });
    }
}
