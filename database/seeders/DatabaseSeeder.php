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
            'event_name' => 'Feast',
            'category' => 'Konser',
            'event_description' => 'Description 1',
            'location' => 'Location 1',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-23',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => 'default.jpg',
        ]);

        Event::create([
            'user_id' => 1,
            'event_name' => 'Tulus Concert',
            'category' => 'Konser',
            'event_description' => 'Description 1',
            'location' => 'Location 1',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-23',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => 'default.jpg',
        ]);

        Event::create([
            'user_id' => 1,
            'event_name' => 'Hindia Tour',
            'category' => 'Konser',
            'event_description' => 'Description 1',
            'location' => 'Location 1',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-23',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => 'default.jpg',
        ]);

        Event::create([
            'user_id' => 1,
            'event_name' => 'Perunggu Coyy',
            'category' => 'Konser',
            'event_description' => 'Description 1',
            'location' => 'Location 1',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-23',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'image' => 'default.jpg',
        ]);

        Ticket::create([
            'event_id' => 1,
            'ticket_name' => 'Ticket 1',
            'ticket_description' => 'Description 1',
            'sell_start_date' => '2024-10-20 08:00:00',
            'sell_end_date' => '2024-10-20 17:00:00',
            'price' => 100000,
            'stock' => 100,
        ]);

        Ticket::create([
            'event_id' => 2,
            'ticket_name' => 'Ticket 1',
            'ticket_description' => 'Description 1',
            'sell_start_date' => '2024-10-20 08:00:00',
            'sell_end_date' => '2024-10-20 17:00:00',
            'price' => 150000,
            'stock' => 100,
        ]);

        Ticket::create([
            'event_id' => 3,
            'ticket_name' => 'Ticket 1',
            'ticket_description' => 'Description 1',
            'sell_start_date' => '2024-10-20 08:00:00',
            'sell_end_date' => '2024-10-20 17:00:00',
            'price' => 180000,
            'stock' => 100,
        ]);

        Ticket::create([
            'event_id' => 4,
            'ticket_name' => 'Ticket 1',
            'ticket_description' => 'Description 1',
            'sell_start_date' => '2024-10-20 08:00:00',
            'sell_end_date' => '2024-10-20 17:00:00',
            'price' => 80000,
            'stock' => 100,
        ]);
    }
}
