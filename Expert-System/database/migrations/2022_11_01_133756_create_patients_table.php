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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('gender');
            $table->string('blood_group');
            $table->string('age');
            $table->string('height');
            $table->string('weight');
            $table->string('bmi');
            $table->string('address')->nullable();
            $table->string('contact_number');
            $table->string('image')->nullable();
            $table->integer('status')->comment('1 = Active / 0 = Deactivate')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
