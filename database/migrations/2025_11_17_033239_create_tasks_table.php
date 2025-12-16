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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['todo', 'in_progress', 'review', 'completed', 'blocked'])->default('todo');
            $table->foreignId('assigned_to')->nullable()->constrained('admins')->nullOnDelete();
            $table->date('due_date')->nullable();
            $table->integer('priority')->default(0);
            $table->integer('progress_percentage')->default(0);
            $table->text('internal_comments')->nullable();
            $table->foreignId('milestone_id')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->index('project_id');
            $table->index('status');
            $table->index('assigned_to');
            $table->index('due_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
