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
        if (Schema::hasTable('clients')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->index('status', 'clients_status_index');
            });
        }

        if (Schema::hasTable('projects')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->index('status', 'projects_status_index');
                $table->index('client_id', 'projects_client_id_index');
            });
        }

        if (Schema::hasTable('tasks')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->index('status', 'tasks_status_index');
                $table->index('due_date', 'tasks_due_date_index');
                $table->index('project_id', 'tasks_project_id_index');
            });
        }

        if (Schema::hasTable('invoices')) {
            Schema::table('invoices', function (Blueprint $table) {
                $table->index('status', 'invoices_status_index');
                $table->index('due_date', 'invoices_due_date_index');
                $table->index('project_id', 'invoices_project_id_index');
            });
        }

        if (Schema::hasTable('activity_logs')) {
            Schema::table('activity_logs', function (Blueprint $table) {
                $table->index('created_at', 'activity_logs_created_at_index');
                $table->index('project_id', 'activity_logs_project_id_index');
                $table->index('client_id', 'activity_logs_client_id_index');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('clients')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->dropIndex('clients_status_index');
            });
        }

        if (Schema::hasTable('projects')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropIndex('projects_status_index');
                $table->dropIndex('projects_client_id_index');
            });
        }

        if (Schema::hasTable('tasks')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->dropIndex('tasks_status_index');
                $table->dropIndex('tasks_due_date_index');
                $table->dropIndex('tasks_project_id_index');
            });
        }

        if (Schema::hasTable('invoices')) {
            Schema::table('invoices', function (Blueprint $table) {
                $table->dropIndex('invoices_status_index');
                $table->dropIndex('invoices_due_date_index');
                $table->dropIndex('invoices_project_id_index');
            });
        }

        if (Schema::hasTable('activity_logs')) {
            Schema::table('activity_logs', function (Blueprint $table) {
                $table->dropIndex('activity_logs_created_at_index');
                $table->dropIndex('activity_logs_project_id_index');
                $table->dropIndex('activity_logs_client_id_index');
            });
        }
    }
};

