<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('father_name', 50);
            $table->string('mother_name', 50);
            $table->string('mother_nick_name', 50);
            $table->string('soishal_state', 50);
            $table->date('birth_date')->nullable();
            $table->string('natual_number');
            $table->string('study_org');//
            $table->string('type_of_certif');//
            $table->string('study_type');//
            $table->string('study_place');//  
            $table->string('live_place');
            $table->string('state');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('phone_number');
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
        Schema::dropIfExists('employees');
    }
}
