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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId('user_id');
            $table->string('resi')->unique();
            // $table->foreignId('book_id');
            // $table->foreignId('transaction_id');
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
            // $table->string('name');
            // $table->string('username');
            // $table->string('email');
            $table->string('kurir')->nullable();
             $table->string('provinsi')->nullable();
             $table->string('kota')->nullable();
            $table->string('zip')->nullable();
            $table->string('card-name')->nullable();
            $table->string('card-number')->nullable();
            $table->integer('card-expiration')->nullable();
            $table->string('card-cvv')->nullable();
            $table->string('no-hp')->nullable();
            $table->string('image')->nullable();
            $table->string('pmethod')->default("TBA");
            $table->string('status')->default("pending");
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('order');
    }
};
