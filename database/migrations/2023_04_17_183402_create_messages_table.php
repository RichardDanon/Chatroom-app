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
        Schema::create('messages', function(Blueprint $table){
            $table->increments('id');
            $table->string('body');
            $table->binary('image')->nullable();
            $table->timestamps();
            $table->integer('receivers_id')->unsigned();
            $table->integer('senders_id')->unsigned();

            $table->foreign('receivers_id')
                    ->references('id')
                    ->on('chatUsers')
                    ->onCascade('delete');

            $table->foreign('senders_id')
                    ->references('id')
                    ->on('chatUsers')
                    ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
