<?php

namespace Database\Seeders;

use App\Types\PermissionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = PermissionType::cases();

        // Add new models here if you need permission seeded
        $models = collect([
            'event',
            'position',
            'registration',
            'user',
            'venue',
        ]);

        collect($permissions)
            ->each(function ($permission) use ($models) {
                $permission = $permission->value();

                $models->each(function ($model) use ($permission) {
                    $modelPermission = "$permission $model";
                    Permission::firstOrCreate(['name' => $modelPermission]);

                });
            });
    }
}
