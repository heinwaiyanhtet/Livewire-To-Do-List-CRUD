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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->tinyText('titles');
            $table->string('description')->nullable();
            $table->timestamp('duedate')->nullable();
            $table->enum('status', ['done', 'processing','Pending']);
            $table->tinyText('createdBy');
            $table->tinyText('updatedBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
