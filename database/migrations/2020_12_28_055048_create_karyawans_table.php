<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_karyawan');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('proyek_id');
            $table->string('telpon');
            $table->timestamps();

            // $table->foreign('department_id')
            //     ->references('id')
            //     ->on('departements')
            //     ->onDelete('cascade');

            // $table->foreign('proyek_id')
            //     ->references('id')
            //     ->on('proyeks')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
