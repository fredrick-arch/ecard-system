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
        Schema::create('ecards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('title');                    // Kichwa cha kadi
        $table->text('message');                    // Ujumbe wa kadi
        $table->string('recipient_name');           // Jina la mpokeaji
        $table->string('recipient_phone');          // Namba ya WhatsApp
        $table->string('image_path')->nullable();   // Picha ya kadi iliyotengenezwa
        $table->json('custom_data')->nullable();    // Data maalum (rangi, font, n.k.)
        
        $table->boolean('is_sent')->default(false);
        $table->timestamp('sent_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecards');
    }
};
