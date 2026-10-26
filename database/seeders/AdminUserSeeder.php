<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Administrator
        User::updateOrCreate(
            ['email' => 'mark.estoesta@globaltronics.net'],
            [
                'name' => 'Mark Estoesta',
                'role' => 'admin',
                'password' => Hash::make('Global@2026!'),
                'email_verified_at' => now(),
            ]
        );

        // HR Department User
        User::updateOrCreate(
            ['email' => 'hr.specialist@globaltronics.net'],
            [
                'name' => 'Globaltronics HR Department',
                'role' => 'hr',
                'password' => Hash::make('hrpassword123'),
                'email_verified_at' => now(),
            ]
        );

        // Sales & Inquiries Team
        User::updateOrCreate(
            ['email' => 'sales@globaltronics.net'],
            [
                'name' => 'Globaltronics Sales Team',
                'role' => 'sales',
                'password' => Hash::make('sales12345'),
                'email_verified_at' => now(),
            ]
        );
    }
}
