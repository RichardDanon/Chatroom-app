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

        Schema::create('chat_user_messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->increments('id');
            $table->unsignedInteger('chat_user_id');
            $table->unsignedInteger('message_id');
            $table->timestamps();

            $table->foreign('chat_user_id')->references('id')->on('chatUsers');
            $table->foreign('message_id')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_user_messages');
    }
};
