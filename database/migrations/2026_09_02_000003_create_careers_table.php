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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('department')->default('General');
            $table->string('employment_type')->default('Full-time');
            $table->string('location')->default('Mandaluyong City, Metro Manila');
            $table->string('experience_level')->nullable();
            $table->string('salary_range')->nullable();
            $table->text('description');
            $table->longText('responsibilities')->nullable();
            $table->longText('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->string('application_email')->default('careers@globaltronics.net');
            $table->string('application_url')->nullable();
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
        Schema::dropIfExists('careers');
    }
};
