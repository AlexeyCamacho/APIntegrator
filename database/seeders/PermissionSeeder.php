<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Права для администратора
        Permission::create(['name' => 'admin.*']);
        Permission::create(['name' => 'devices.*']);

        // Права для юзеров
        Permission::create(['name' => 'devices.create']);
        Permission::create(['name' => 'devices.view']);
    }
}
