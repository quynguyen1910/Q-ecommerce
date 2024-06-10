<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            Schema::table('accounts', function (Blueprint $table) {
                $table->unsignedBigInteger('ma_nv')->nullable(); // Thêm trường ma_nv
    
                // Tạo khóa ngoại liên kết với bảng employees
                $table->foreign('ma_nv')->references('ma_nv')->on('employees')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign(['ma_nv']);
            $table->dropColumn('ma_nv');
        });
    }
}
