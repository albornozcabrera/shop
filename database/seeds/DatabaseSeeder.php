<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //se descomenta esta línea para que la tabla llame a la tabla
         //$this->call(UsersTableSeeder::class);
    	$this->call(UserTableSeeder::class);
    }
}
