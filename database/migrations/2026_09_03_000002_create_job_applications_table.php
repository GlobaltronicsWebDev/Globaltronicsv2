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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->nullable()->constrained('careers')->nullOnDelete();
            $table->string('job_title');
            $table->string('full_name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('current_address')->nullable();
            $table->text('why_hire_you')->nullable();
            $table->string('resume_path')->nullable();
            $table->string('status')->default('new'); // new, reviewed, contacted, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
