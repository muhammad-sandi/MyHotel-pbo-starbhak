<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kamar_id');
            $table->string('nama_pemesan');
            $table->string('nama_tamu');
            $table->string('email');
            $table->string('no_handphone');
            $table->string('jumlah_kamar');
            $table->string('total_harga');
            $table->string('tanggal_checkin');
            $table->string('tanggal_checkout');
            $table->enum('status', ['checkin', 'checkout'])->default('checkin');
            $table->timestamps();

            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasis');
    }
}
