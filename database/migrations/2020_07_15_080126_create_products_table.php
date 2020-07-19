<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->text('productDescription');
            $table->string('orginalPrice');
            $table->string('discountedPrice');
            $table->string('discountRate');
            $table->string('categories');
            $table->string('productImage');
            $table->unsignedBigInteger('productOwnerId');
            $table->timestamps();

            $table->foreign('productOwnerId')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
