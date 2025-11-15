<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->timestamps();
        });

        DB::table('priorities')->insert([
            ['name' => json_encode(['en' => 'Low', 'ka' => 'დაბალი']), 'created_at' => now(), 'updated_at' => now()],
            ['name' => json_encode(['en' => 'Medium', 'ka' => 'საშუალო']), 'created_at' => now(), 'updated_at' => now()],
            ['name' => json_encode(['en' => 'High', 'ka' => 'მაღალი']), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
};
