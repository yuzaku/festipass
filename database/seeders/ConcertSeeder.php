<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concert;
use Carbon\Carbon;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing concerts
        Concert::truncate();
        
        $concerts = [
            [
                'organizer_id' => 2,
                'title' => 'ADO World Tour 2025 - Jakarta',
                'artist' => 'ADO',
                'description' => 'Experience the phenomenal voice of ADO live in Jakarta! Don\'t miss this incredible opportunity to witness one of Japan\'s most talented singers perform her hit songs including "Usseewa", "Gira Gira", and more.',
                'location' => 'Jakarta International Expo, Kemayoran',
                'event_date' => Carbon::create(2025, 4, 19, 19, 0, 0),
                'status' => 'published',
                'poster' => 'images/concerts/ado-concert.jpg',
                'created_at' => Carbon::create(2025, 4, 19)->subMonth(),
                'updated_at' => Carbon::create(2025, 4, 19)->subMonth(),
            ],
            [
                'organizer_id' => 2,
                'title' => 'Yorushika Live Concert - Bandung',
                'artist' => 'Yorushika',
                'description' => 'Join us for an intimate evening with Yorushika, the acclaimed Japanese rock duo. Experience their emotional melodies and poetic lyrics in this special acoustic performance.',
                'location' => 'Gedung Sate Concert Hall, Bandung',
                'event_date' => Carbon::create(2025, 5, 17, 19, 30, 0),
                'status' => 'published',
                'poster' => 'images/concerts/yorushika-concert.jpg',
                'created_at' => Carbon::create(2025, 5, 17)->subMonth(),
                'updated_at' => Carbon::create(2025, 5, 17)->subMonth(),
            ],
            [
                'organizer_id' => 2,
                'title' => 'yanaginagi Acoustic Session - Surabaya',
                'artist' => 'yanaginagi',
                'description' => 'Don\'t miss yanaginagi\'s first solo concert in Indonesia! Known for her beautiful anime theme songs, she will perform acoustic versions of her most beloved tracks.',
                'location' => 'Balai Pemuda Surabaya',
                'event_date' => Carbon::create(2025, 6, 21, 20, 0, 0),
                'status' => 'published',
                'poster' => 'images/concerts/yanaginagi-concert.jpg',
                'created_at' => Carbon::create(2025, 6, 21)->subMonth(),
                'updated_at' => Carbon::create(2025, 6, 21)->subMonth(),
            ],
        ];

        foreach ($concerts as $concertData) {
            Concert::create($concertData);
        }
        
        $this->command->info('Sample concerts created successfully!');
    }
}