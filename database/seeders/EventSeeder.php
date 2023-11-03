<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::firstOrCreate(["name" => "BYCIT"], [
            "name" => "BYCIT",
            "description" => "This is a description for the event. This is a description for the event. This is a description for the event. This is a description for the event",
            "start_date" => now()->addYear(),
            "allow_registration" => true,
            "duration" => 2,
        ]);
    }
}
