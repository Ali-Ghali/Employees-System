<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_employee');
            $table->foreign('id_employee')->references('id')->on('employees')->onDelete('cascade');
            $table->string('study_org');//
            $table->string('type_of_certif');//
            $table->string('study_type');//
            $table->string('study_place');//  
            $table->text('note')->nullable();//
            $table->string('user',300);
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
        Schema::dropIfExists('employee_details');
    }
}
