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
        Schema::create('crop_solutions', function (Blueprint $table) {
           $table->id();
            $table->string('crop_name'); // e.g., Paddy, Tomato
            $table->string('problem_type'); // e.g., Pest, Disease, Nutrient
            $table->string('problem_name'); // e.g., Blight, Aphids
            $table->text('description')->nullable(); // Details about the problem
            $table->longText('solution_text'); // The actual solution steps
            $table->string('image')->nullable(); // Optional image path
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Admin creator
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_solutions');
    }
};
