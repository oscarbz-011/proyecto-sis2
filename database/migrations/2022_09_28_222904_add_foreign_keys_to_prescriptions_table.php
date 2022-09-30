<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->foreign(['medicines_id'], 'fk_prescriptions_medicines1')->references(['id_medicine'])->on('medicines')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['patients_id'], 'fk_prescriptions_patients1')->references(['id_patient'])->on('patients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->dropForeign('fk_prescriptions_medicines1');
            $table->dropForeign('fk_prescriptions_patients1');
        });
    }
}
