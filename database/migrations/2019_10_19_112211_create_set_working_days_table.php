<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_working_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('saturday')->default('NULL')->nullable();
            $table->string('sunday')->default('NULL')->nullable();
            $table->string('monday')->default('NULL')->nullable();
            $table->string('tuesday')->default('NULL')->nullable();
            $table->string('wednesday')->default('NULL')->nullable();
            $table->string('thursday')->default('NULL')->nullable();
            $table->string('friday')->default('NULL')->nullable();
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
        Schema::dropIfExists('set_working_days');
    }

}
