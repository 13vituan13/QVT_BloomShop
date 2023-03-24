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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('customer_id')->unsigned();
            $table->date('date');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_zipcode');
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->integer('status_id');
            $table->integer('total_money');
            $table->integer('flg_del')->nullable();
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
