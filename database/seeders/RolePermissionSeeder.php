<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // ลบ cache เก่า (กัน permission ค้าง)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 👉 สร้าง permissions ตามที่ระบบต้องการ
        Permission::create(['name' => 'manage staff']);        // Manager ใช้
        Permission::create(['name' => 'view reports']);        // Manager ใช้
        Permission::create(['name' => 'approve members']);     // Staff ใช้
        Permission::create(['name' => 'manage members']);      // Staff ใช้
        Permission::create(['name' => 'manage own garden']);   // Member ใช้

        // 👉 สร้าง roles
        $admin   = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $staff   = Role::create(['name' => 'Staff']);
        $member  = Role::create(['name' => 'Member']);

        // 👉 มอบ permission ให้ role ที่เหมาะสม
        // Admin ได้ทุกอย่าง (ให้ทุก permission ที่มี)
        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo(['manage staff', 'view reports']);
        $staff->givePermissionTo(['approve members', 'manage members']);
        $member->givePermissionTo(['manage own garden']);
    }
}
