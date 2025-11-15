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
        Schema::create('item_statuses', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->timestamps();
        });

        DB::table('item_statuses')->insert([

            ['name' => json_encode(['en' => 'In Stock','ka'=>'მარაგში'])],
            ['name' => json_encode(['en' => 'In Use','ka'=>'მიმაგრებული'])],
            ['name' => json_encode(['en' => 'Under Repair','ka'=>'შესაკეთბელი'])],
            ['name' => json_encode(['en' => 'Retired','ka'=>'ჩამოწერილი'])],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_statuses');
    }
};
