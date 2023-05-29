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
        Schema::create('biochemistries', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('date');
            $table->string('uric_acid');
            $table->string('electrolyte');
            $table->string('pog_2');
            $table->string('ca_2');
            $table->string('ldh');
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
        Schema::dropIfExists('biochemistries');
    }
};
