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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_code')->unique(); // Kode tiket unik (MBG-001)
            $table->string('reporter_name')->nullable(); // Bisa anonim
            $table->string('reporter_contact')->nullable();
            $table->text('content');
            $table->string('photo_evidence')->nullable();
            $table->enum('status', ['pending', 'process', 'done'])->default('pending');
            $table->text('response_note')->nullable();
            $table->foreignId('responder_id')->nullable()->constrained('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
