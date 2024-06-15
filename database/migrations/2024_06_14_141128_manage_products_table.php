<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManageProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop foreign key constraint that references the products table
        Schema::table('product_masuk', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        // Drop the products table if it exists
        Schema::dropIfExists('products');
        
        // Create the products table
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });

        // Recreate foreign key constraint
        Schema::table('product_masuk', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop foreign key constraint
        Schema::table('product_masuk', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        // Drop the products table if it exists
        Schema::dropIfExists('products');

        // Recreate the products table
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });

        // Recreate foreign key constraint
        Schema::table('product_masuk', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
