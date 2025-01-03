<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminPrimadonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->create([
            'name' => 'Admin Primadona',
            'slug' => Str::slug('Admin Primadona'),
            'email' => str_replace(' ', '', 'adminprimadona') . "@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt('primadonakraksaan'),
        ]);

        $user->assignRole(RoleEnum::SCHOOL->value);
    }
}
