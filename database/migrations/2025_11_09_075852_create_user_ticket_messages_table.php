<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_ticket_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\UserTicket::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete(); // Changed from restrictOnDelete()
            $table->foreignIdFor(\App\Models\User::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_ticket_messages');
    }
};
