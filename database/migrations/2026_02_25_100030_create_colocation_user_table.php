<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('colocation_user', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(false);
            $table->timestamp('left_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('colocation_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void {
        Schema::dropIfExists('colocation_user');
    }
};
