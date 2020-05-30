<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Roberto Britz',
            'email' => 'roberto.britz@hotmail.com',
            'password' => bcrypt('123456'), // para mandar criptografado
            'adm' => 1,
        ]);

    }
}
