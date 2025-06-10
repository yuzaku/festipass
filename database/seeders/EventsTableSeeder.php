<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 1,
                'organizer_id' => 5,
                'title' => 'Aimer Concert',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu nulla consequat, sodales odio a, molestie metus. Morbi nisl libero, fermentum eget convallis quis, dictum sed nisi. Ut at elit euismod, bibendum enim quis, efficitur quam. Sed condimentum placerat neque sed efficitur. Vestibulum non neque metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque nec nibh aliquet, euismod felis et, imperdiet elit. Aliquam semper, nisi et semper placerat, neque risus interdum purus, quis pulvinar urna odio in felis. Vestibulum tincidunt, velit id lobortis commodo, est purus blandit felis, tincidunt pulvinar lorem purus ac enim. Aenean porttitor neque arcu, eu fringilla massa venenatis quis. Fusce condimentum in enim ut suscipit.',
                'poster' => 'images/bernadya.jpeg',
                'location' => 'Icon, BSD',
                'event_date' => '2025-06-10 00:00:00',
                'created_at' => '2025-06-10 20:54:41',
            ),
            1 => 
            array (
                'id' => 2,
                'organizer_id' => 5,
                'title' => 'Ado Concert',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu nulla consequat, sodales odio a, molestie metus. Morbi nisl libero, fermentum eget convallis quis, dictum sed nisi. Ut at elit euismod, bibendum enim quis, efficitur quam. Sed condimentum placerat neque sed efficitur. Vestibulum non neque metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque nec nibh aliquet, euismod felis et, imperdiet elit. Aliquam semper, nisi et semper placerat, neque risus interdum purus, quis pulvinar urna odio in felis. Vestibulum tincidunt, velit id lobortis commodo, est purus blandit felis, tincidunt pulvinar lorem purus ac enim. Aenean porttitor neque arcu, eu fringilla massa venenatis quis. Fusce condimentum in enim ut suscipit.',
                'poster' => 'images/tulus.jpeg',
                'location' => 'PTC, Surabaya',
                'event_date' => '2025-07-30 00:00:00',
                'created_at' => '2025-06-10 20:55:42',
            ),
        ));
        
        
    }
}