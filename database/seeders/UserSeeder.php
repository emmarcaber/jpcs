<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\User;
use App\Types\PositionType;
use App\Types\RoleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            [
                "email" => "admin@jpcscspc.com"
            ],
            [
                "name" => "admin",
                "email" => "admin@jpcscspc.com",
                "password" => bcrypt("password"),
                "position_id" => Position::where('name', PositionType::SUPER_ADMIN->value())->first()->id,

            ]
        )->assignRole(RoleType::SUPER_ADMIN->value());
    }
}
