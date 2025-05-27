<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'alice@example.com',
                'password_hash' => 'hash1',
                'name' => 'Alice',
                'is_organizer' => 0,
                'created_at' => '2025-05-13 00:47:33',
                'tel_num' => '',
            ),
            1 => 
            array (
                'id' => 2,
                'email' => 'bob@example.com',
                'password_hash' => 'hash2',
                'name' => 'Bob',
                'is_organizer' => 1,
                'created_at' => '2025-05-13 00:47:33',
                'tel_num' => '',
            ),
            2 => 
            array (
                'id' => 3,
                'email' => 'charlie@example.com',
                'password_hash' => 'hash3',
                'name' => 'Charlie',
                'is_organizer' => 0,
                'created_at' => '2025-05-13 00:47:33',
                'tel_num' => '',
            ),
            3 => 
            array (
                'id' => 4,
                'email' => 'diana@example.com',
                'password_hash' => 'hash4',
                'name' => 'Diana',
                'is_organizer' => 1,
                'created_at' => '2025-05-13 00:47:33',
                'tel_num' => '',
            ),
            4 => 
            array (
                'id' => 5,
                'email' => 'etmind@email.com',
                'password_hash' => '$2y$12$/Xnd4CpPjALpzZAX5agSrOhBL1pnvoGbNAaZ.lAkB2vIIR9yyQrnG',
                'name' => 'etmind',
                'is_organizer' => 0,
                'created_at' => '2025-05-24 12:20:58',
                'tel_num' => '000011112222345',
            ),
        ));
        
        
    }
}