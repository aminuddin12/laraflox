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
        Schema::create('menu_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama tampilan menu (misal: "Dashboard", "Settings")
            $table->string('route')->nullable(); // Nama route laravel (misal: "admin.dashboard")
            $table->string('url')->nullable(); // Jika link eksternal atau custom path
            $table->string('icon')->nullable(); // Nama icon (misal: "heroicons:home" atau "solar:bolt")
            $table->string('permission_name')->nullable(); // Permission yang dibutuhkan untuk melihat menu ini
            $table->foreignId('parent_id')->nullable()->constrained('menu_permissions')->onDelete('cascade'); // Untuk submenu
            $table->integer('order')->default(0); // Urutan menu
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_permissions');
    }
};
