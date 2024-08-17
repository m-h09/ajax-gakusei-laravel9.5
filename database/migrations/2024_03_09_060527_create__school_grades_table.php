<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id');
            $table->integer('grade');
            $table->integer('term');
            $table->integer('japanese');
            $table->integer('math');
            $table->integer('science');
            $table->integer('social_studies');
            $table->integer('music');
            $table->integer('home_economics');
            $table->integer('english');
            $table->integer('art');
            $table->integer('health_and_physical_education');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_grades');
    }
}
