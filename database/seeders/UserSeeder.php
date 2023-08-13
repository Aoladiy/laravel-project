<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create(['name' => 'admin', 'email' => env('ADMIN_USER_EMAIL'), 'password' => env('ADMIN_USER_PASSWORD')])->roles()->saveMany(Role::where('name', 'admin')->get());
        $roles = Role::where('name', '<>', 'admin')->get();
        foreach (User::factory(9)->create() as $user) {
            $user->roles()->saveMany($roles->random(rand(0, 3)));
        }
    }
}
