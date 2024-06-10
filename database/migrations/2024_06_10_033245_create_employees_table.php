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
            $table->bigIncrements('ma_nv'); // Sử dụng bigIncrements để tạo cột id với auto increment
            $table->string('ho')->nullable();
            $table->string('ten');
            $table->string('diachi');
            $table->date('ngaysinh');
            $table->tinyInteger('gioitinh');
            $table->string('sodt')->nullable();
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
