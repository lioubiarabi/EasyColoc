<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('invitations', function (Blueprint $table) {
            $table->string('UUID', 32)->primary(); // varchar(32) as per ERD
            $table->string('status', 50)->default('pending');
            $table->string('email', 220);
            $table->foreignId('colocation_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('invitations');
    }
};
