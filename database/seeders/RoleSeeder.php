<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create users
        $user1 = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'user',
                'password' => Hash::make('useruser'),
                'nophone' => '081234567890',
                'faculty' => 'Engineering',
                'major' => 'Computer Science',
                'birthDate' => '2000-01-01',
            ]
        );
        $user1->assignRole($userRole);

        $user2 = User::firstOrCreate(
            ['email' => 'user2@gmail.com'],
            [
                'name' => 'user2',
                'password' => Hash::make('useruser'),
                'nophone' => '081298765432',
                'faculty' => 'Business',
                'major' => 'Management',
                'birthDate' => '1998-05-15',
            ]
        );
        $user2->assignRole($userRole);

        // Create admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('adminadmin'),
                'nophone' => '081111223344',
                'faculty' => 'Administration',
                'major' => 'Public Policy',
                'birthDate' => '1995-12-25',
            ]
        );
        $admin->assignRole($adminRole);
    }
}
