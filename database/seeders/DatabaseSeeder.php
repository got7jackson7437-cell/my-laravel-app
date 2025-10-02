<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // เรียก RolePermissionSeeder ก่อน
        $this->call(RolePermissionSeeder::class);

        // 👉 สร้างผู้ใช้ตัวอย่าง
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // รหัสผ่านตั้งเป็น password
        ]);
        $user->assignRole('Admin');

        $mgr = User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'),
        ]);
        $mgr->assignRole('Manager');

        $st = User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => bcrypt('password'),
        ]);
        $st->assignRole('Staff');

        $mem = User::factory()->create([
            'name' => 'Member User',
            'email' => 'member@example.com',
            'password' => bcrypt('password'),
        ]);
        $mem->assignRole('Member');
    }
}
