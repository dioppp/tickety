<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123123'),
            'address' => 'Jl. Raya No. 1',
            'phone' => '08123456789',
            'image' => 'default.jpg',
        ]);

        Event::create([
            'user_id' => 1,
            'title' => 'Feast',
            'description' => 'Description 1',
            'location' => 'Location 1',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-23',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => 'default.jpg',
        ]);

        Event::create([
            'user_id' => 1,
            'title' => 'Tulus Concert',
            'description' => 'Description 1',
            'location' => 'Location 1',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-23',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => 'default.jpg',
        ]);

        Event::create([
            'user_id' => 1,
            'title' => 'Hindia Tour',
            'description' => 'Description 1',
            'location' => 'Location 1',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-23',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => 'default.jpg',
        ]);

        Event::create([
            'user_id' => 1,
            'title' => 'Perunggu Coyy   ',
            'description' => 'Description 1',
            'location' => 'Location 1',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-23',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => 'default.jpg',
        ]);

        Ticket::create([
            'event_id' => 1,
            'name' => 'Ticket 1',
            'description' => 'Description 1',
            'sell_start_date' => '2024-10-20 08:00:00',
            'sell_end_date' => '2024-10-20 17:00:00',
            'price' => 100000,
            'stock' => 100,
        ]);

        Ticket::create([
            'event_id' => 2,
            'name' => 'Ticket 1',
            'description' => 'Description 1',
            'sell_start_date' => '2024-10-20 08:00:00',
            'sell_end_date' => '2024-10-20 17:00:00',
            'price' => 150000,
            'stock' => 100,
        ]);

        Ticket::create([
            'event_id' => 3,
            'name' => 'Ticket 1',
            'description' => 'Description 1',
            'sell_start_date' => '2024-10-20 08:00:00',
            'sell_end_date' => '2024-10-20 17:00:00',
            'price' => 180000,
            'stock' => 100,
        ]);

        Ticket::create([
            'event_id' => 4,
            'name' => 'Ticket 1',
            'description' => 'Description 1',
            'sell_start_date' => '2024-10-20 08:00:00',
            'sell_end_date' => '2024-10-20 17:00:00',
            'price' => 80000,
            'stock' => 100,
        ]);
    }
}
