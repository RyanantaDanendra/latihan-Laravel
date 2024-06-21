<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function(Blueprint $table){
            $table->id();
            $table->foreignId('id_user');
            $table->string('product_name');
            $table->timestamps();
            $table->timestamp('deliver_time')->nullable();
            $table->string('location');
            $table->string('post_code');
            $table->integer('price');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};