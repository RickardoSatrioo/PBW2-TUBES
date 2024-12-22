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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_room')
            ->constrained('room')
            ->onDelete('cascade');
            $table->foreignId('created_by')
            ->constrained('users')
            ->onDelete('cascade');
            $table->foreignId('approved_by')->nullable()
            ->constrained('users')
            ->onDelete('cascade');
            $table->timestamp('startDate');
            $table->timestamp('endDate');
            $table->string('purpose');
            $table->string('file_proposal');
            $table->string('reason_reject')->nullable();
            $table->string('duration');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
