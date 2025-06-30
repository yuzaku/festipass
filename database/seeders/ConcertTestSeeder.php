<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Concert;
use App\Models\User;
use Carbon\Carbon;

class ConcertTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create test organizer if not exists
        $organizer = User::firstOrCreate(
            ['email' => 'organizer@test.com'],
            [
                'name' => 'Test Organizer',
                'password_hash' => bcrypt('password'),
                'is_organizer' => true,
                'tel_num' => '081234567890',
                'created_at' => now(),
            ]
        );

        // Sample concert data
        $concerts = [
            [
                'title' => 'ADO World Tour 2025 - Jakarta',
                'artist' => 'ADO',
                'description' => 'Experience the phenomenal Japanese singer ADO live in Jakarta! Known for her powerful vocals and hit songs like "Usseewa", "Show", and "New Genesis". This will be her first concert in Indonesia as part of the ADO World Tour 2025.',
                'location' => 'Indonesia Convention Exhibition (ICE), BSD City',
                'event_date' => Carbon::now()->addMonths(3)->setTime(19, 30),
                'status' => 'published',
                'poster' => null,
                'organizer_id' => $organizer->id,
                'created_at' => now(),
            ],
            [
                'title' => 'Jazz Night with Tomoko Sauvage',
                'artist' => 'Tomoko Sauvage',
                'description' => 'An intimate evening of experimental jazz and water percussion. Join us for a unique musical experience that blends traditional jazz with innovative sound art.',
                'location' => 'Bentara Budaya Jakarta, Central Jakarta',
                'event_date' => Carbon::now()->addMonths(2)->setTime(20, 0),
                'status' => 'published',
                'poster' => null,
                'organizer_id' => $organizer->id,
                'created_at' => now(),
            ],
            [
                'title' => 'Rock Festival Indonesia 2025',
                'artist' => 'Various Artists',
                'description' => 'The biggest rock festival in Indonesia featuring international and local rock bands. Three days of non-stop rock music with over 50 performers.',
                'location' => 'Gelora Bung Karno Main Stadium, Jakarta',
                'event_date' => Carbon::now()->addMonths(4)->setTime(15, 0),
                'status' => 'draft',
                'poster' => null,
                'organizer_id' => $organizer->id,
                'created_at' => now(),
            ],
            [
                'title' => 'Classical Symphony Night',
                'artist' => 'Jakarta Philharmonic Orchestra',
                'description' => 'A night of beautiful classical music featuring works by Beethoven, Mozart, and contemporary Indonesian composers.',
                'location' => 'Ciputra Artpreneur Theater, Jakarta',
                'event_date' => Carbon::now()->addMonth()->setTime(19, 0),
                'status' => 'published',
                'poster' => null,
                'organizer_id' => $organizer->id,
                'created_at' => now(),
            ],
        ];

        foreach ($concerts as $concertData) {
            // Use direct DB insert to avoid model complications
            \DB::table('events')->insert($concertData);
        }

        $this->command->info('Concert test data seeded successfully!');
        $this->command->info('Test organizer created: organizer@test.com / password');
    }
}