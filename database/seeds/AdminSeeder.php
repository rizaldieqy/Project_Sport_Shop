<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234'),
            'address' => 'Cikokol',
            'phone' => '08789324',
            // 'role' => 'admin',
        ]);
    }
}
