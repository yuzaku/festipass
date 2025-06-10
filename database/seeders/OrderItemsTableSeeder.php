<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('order_items')->delete();

        \DB::table('order_items')->insert(array (
            0 =>
            array (
                'id' => 1,
                'order_id' => 1,
                'ticket_id' => 3,
                'quantity' => 2,
                'total_price' => '160000.00',
                'created_at' => '2025-06-10 14:04:36',
                'updated_at' => '2025-06-10 14:04:36',
            ),
        ));
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}
