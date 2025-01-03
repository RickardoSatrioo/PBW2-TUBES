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
        Schema::table('users', function (Blueprint $table) {
            $table->text('nophone');
            $table->text('about')->nullable();
            $table->string('faculty')->nullable();
            $table->string('major')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('birthDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'about',
                'faculty',
                'major',
                'birthDate'
            ]);
        });
    }
};
