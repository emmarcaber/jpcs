<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Types\PositionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(PositionType::cases())
            ->each(function ($role) {
                Position::firstOrCreate(['name' => $role->value()]);
            });
    }
}
