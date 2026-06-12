<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('users', 'role') || ! Schema::hasColumn('users', 'status') || ! Schema::hasColumn('users', 'deleted_at')) {
            Schema::table('users', function (Blueprint $table) {
                if (! Schema::hasColumn('users', 'role')) {
                    $table->enum('role', ['admin', 'staff'])
                          ->default('staff')
                          ->after('password');
                }

                if (! Schema::hasColumn('users', 'status')) {
                    $table->enum('status', ['active', 'inactive'])
                          ->default('active')
                          ->after('role');
                }

                if (! Schema::hasColumn('users', 'deleted_at')) {
                    $table->softDeletes();
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'role') || Schema::hasColumn('users', 'status') || Schema::hasColumn('users', 'deleted_at')) {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'role')) {
                    $table->dropColumn('role');
                }

                if (Schema::hasColumn('users', 'status')) {
                    $table->dropColumn('status');
                }

                if (Schema::hasColumn('users', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });
        }
    }
};