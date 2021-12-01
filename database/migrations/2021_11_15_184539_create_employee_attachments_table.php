<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 999);//اسم الملف
            $table->string('natual_number');
            $table->string('Created_by', 999);//اسم الشخص
            $table->unsignedBigInteger('employee_id')->nullable();//اي دي الفاتورة لايقبل قيم سالبة
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');//ربط اي دي الفاتورة مع الاي دي في جدول الفواتير
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
        Schema::dropIfExists('employee_attachments');
    }
}
