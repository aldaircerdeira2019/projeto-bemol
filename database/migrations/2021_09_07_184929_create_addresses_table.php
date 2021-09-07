<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->string('cep', 9);
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('complemento');
            $table->bigInteger('numero');
            $table->string('localidade');
            $table->char('uf',2);
            $table->unsignedBigInteger('client_id');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

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
        Schema::dropIfExists('addresses');
    }
}
