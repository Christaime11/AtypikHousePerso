<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('adresse')->nullable();
            $table->integer('nombre_lit')->nullable();
            $table->string('has_tv')->nullable();
            $table->string('has_chauffage')->nullable();
            $table->string('has_climatiseur')->nullable();
            $table->string('has_internet')->nullable();
            $table->integer('validation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
