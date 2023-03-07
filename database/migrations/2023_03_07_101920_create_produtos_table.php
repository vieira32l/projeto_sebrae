<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('estabelecimento_id');
            $table->string('nome', 100);
            $table->float('preco', 8, 2)->default(0.01);
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('produtos');
        Schema::enableForeignKeyConstraints();
    }
}
