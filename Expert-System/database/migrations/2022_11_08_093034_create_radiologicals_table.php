<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radiologicals', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('date');
            $table->string('chest_xray');
            $table->string('xray_bone_and_spine');
            $table->string('usg_leukemic_infaction');
            $table->string('usg_intraabdeminal');
            $table->string('report')->nullable();
            $table->text('note')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('radiologicals');
    }
};
