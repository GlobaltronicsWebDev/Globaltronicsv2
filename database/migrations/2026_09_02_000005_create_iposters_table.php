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
        Schema::create('iposters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('Digital iPoster Ad Placement');
            $table->string('mall_or_location')->nullable();
            $table->string('image')->nullable();
            $table->text('short_description')->nullable();
            $table->text('features')->nullable();
            $table->string('specifications')->nullable();
            $table->string('daily_traffic')->nullable();
            $table->string('cta_label')->default('BOOK YOUR IPOSTER ADS NOW');
            $table->string('cta_url')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iposters');
    }
};
