<?php

namespace Database\Seeders;

use App\Types\RoleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(RoleType::cases())
            ->each(function ($role) {
                Role::firstOrCreate(['name' => $role->value()]);
            });
    }
}
