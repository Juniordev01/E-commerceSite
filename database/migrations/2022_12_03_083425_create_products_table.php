<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            //Clothes
            $table->id();
            $table->string('ProductName');
            $table->string('ProductDescription')->nullable();
            $table->integer('price')->nullable();
            $table->integer('stock')->nullable();
            $table->string('size')->nullable();
            $table->string('Currencytype')->nullable();
            $table->string('productImage')->nullable();
            $table->string('productImage1')->nullable();

            // Phone and watches Specs
            // $table->integer('Ram')->nullable();
            // $table->integer('Rom')->nullable();
            // $table->integer('Storage')->nullable();
            // $table->String('Color')->nullable();
            
            $table->unsignedbiginteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('users');
            
            $table->unsignedbiginteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->nullable();

            $table->unsignedbiginteger('Category_Id');
            $table->foreign('Category_Id')->references('id')->on('categories');

            $table->unsignedbiginteger('subCatory_Id');
            $table->foreign('subCatory_Id')->references('id')->on('sub_categories');
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
        Schema::dropIfExists('products');
    }
};
