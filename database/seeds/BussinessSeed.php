<?php

use Illuminate\Database\Seeder;

class BussinessSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bussiness')->insert([
       	'name' => 'chikavi',
       	'email' => 'correo'.$i.'@correo.com',
       	'email_verified_at' => Carbon::now(),
       	'password' => Hash::make('12345678'),
       	'created_at' => Carbon::now(),
       	'updated_at' => Carbon::now()
       ]);
    }
}
