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
                'organizer_id' => 1,
                'title' => 'ADO World Tour 2025 - Jakarta',
                'artist' => 'ADO',
                'description' => 'Experience the phenomenal voice of ADO live in Jakarta! Don\'t miss this incredible opportunity to witness one of Japan\'s most talented singers perform her hit songs including "Usseewa", "Gira Gira", and more.',
                'location' => 'Jakarta International Expo, Kemayoran',
                'event_date' => Carbon::now()->addDays(45),
                'status' => 'published',
                'poster' => 'concerts/ado-concert.jpg', // Taruh file ado-concert.jpg di storage/app/public/concerts/
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'organizer_id' => 1,
                'title' => 'Yorushika Live Concert - Bandung',
                'artist' => 'Yorushika',
                'description' => 'Join us for an intimate evening with Yorushika, the acclaimed Japanese rock duo. Experience their emotional melodies and poetic lyrics in this special acoustic performance.',
                'location' => 'Gedung Sate Concert Hall, Bandung',
                'event_date' => Carbon::now()->addDays(60),
                'status' => 'published',
                'poster' => 'concerts/yorushika-concert.jpg', // Taruh file yorushika-concert.jpg di storage/app/public/concerts/
                'created_at' => Carbon::now()->subDays(8),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'organizer_id' => 1,
                'title' => 'yanaginagi Acoustic Session - Surabaya',
                'artist' => 'yanaginagi',
                'description' => 'Don\'t miss yanaginagi\'s first solo concert in Indonesia! Known for her beautiful anime theme songs, she will perform acoustic versions of her most beloved tracks.',
                'location' => 'Balai Pemuda Surabaya',
                'event_date' => Carbon::now()->addDays(90),
                'status' => 'published',
                'poster' => 'concerts/yanaginagi-concert.jpg', // Taruh file yanaginagi-concert.jpg di storage/app/public/concerts/
                'created_at' => Carbon::now()->subDays(6),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ];

        foreach ($concerts as $concertData) {
            Concert::create($concertData);
        }
        
        $this->command->info('Sample concerts created successfully!');
    }
}