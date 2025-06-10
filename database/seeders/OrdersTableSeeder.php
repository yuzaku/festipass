<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'order_date' => '2025-06-10 14:04:36',
                'status' => 'pending',
                'created_at' => '2025-06-10 14:04:36',
                'updated_at' => '2025-06-10 14:04:36',
            ),
        ));
        
        
    }
}