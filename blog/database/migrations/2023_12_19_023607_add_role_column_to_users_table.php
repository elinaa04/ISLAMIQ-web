<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['guru', 'siswa', 'kepsek'])
                ->default('siswa');
            $table->string('namaLengkap', 100)->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->string('jenisKelamin', 10)->nullable();
            $table->string('image', 200)->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
