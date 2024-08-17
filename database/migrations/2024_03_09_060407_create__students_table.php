<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id',11)->nullable(false);
            
            $table->string('grade')->nullable(); // デフォルト値をNULLに設定
            $table->string('name')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('img_path')->default('default_image_path.jpg')->nullable(); // ここを修正
            $table->string('comment')->default('')->nullable();
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
        Schema::dropIfExists('students');
    }
}
