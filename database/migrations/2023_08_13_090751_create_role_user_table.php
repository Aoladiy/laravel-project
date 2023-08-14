<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')->references('id')->on('roles');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->primary(['role_id', 'user_id']);
        });

        Role::factory()->create(['name' => 'admin']);
        User::factory()->create(['name' => 'admin', 'email' => env('ADMIN_USER_EMAIL'), 'password' => env('ADMIN_USER_PASSWORD')])->roles()->saveMany(Role::where('name', 'admin')->get());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
