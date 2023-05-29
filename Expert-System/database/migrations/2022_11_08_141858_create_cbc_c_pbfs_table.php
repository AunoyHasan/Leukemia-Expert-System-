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
        Schema::create('cbc_c_pbfs', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('date');
            $table->string('hemoglobin');
            $table->string('platelet');
            $table->string('white_blood_cell');
            $table->string('red_blood_cell');
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
        Schema::dropIfExists('cbc_c_pbfs');
    }
};
