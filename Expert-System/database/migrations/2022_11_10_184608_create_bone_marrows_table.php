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
        Schema::create('bone_marrows', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('date');
            $table->string('myloid');
            $table->string('blast_cell');
            $table->string('sudan_black');
            $table->string('periodic_acid');
            $table->string('myelopsroxidsx');
            $table->string('acid_phosphatex');
            $table->json('markers');
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
        Schema::dropIfExists('bone_marrows');
    }
};
