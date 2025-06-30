<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tickets')->delete();
        
        \DB::table('tickets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'event_id' => 1,
                'ticket_type' => 'VVIP',
                'price' => '200000.00',
                'stock' => 20,
                'sold' => 0,
                'created_at' => '2025-06-10 21:03:51',
                'updated_at' => '2025-06-10 21:03:51',
            ),
            1 => 
            array (
                'id' => 2,
                'event_id' => 1,
                'ticket_type' => 'Regular',
                'price' => '100000.00',
                'stock' => 100,
                'sold' => 0,
                'created_at' => '2025-06-10 21:03:51',
                'updated_at' => '2025-06-10 21:03:51',
            ),
            2 => 
            array (
                'id' => 3,
                'event_id' => 2,
                'ticket_type' => 'Regular Early',
                'price' => '80000.00',
                'stock' => 50,
                'sold' => 2,
                'created_at' => '2025-06-10 21:03:51',
                'updated_at' => '2025-06-10 14:04:36',
            ),
        ));
        
        
    }
}