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
        Schema::create('permissions_role', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('permission_id')->constrained('permissions', indexName: 'permissins_role_permissions_id')->onDelete('restrict');
            $table->foreignUuid('role_id')->constrained('roles', indexName: 'permissions_role_role_id')->onDelete('restrict');
            $table->foreignUuid('processor_id')->constrained('processors', indexName:'permissions_role_processor_id')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions_role');
    }
};
