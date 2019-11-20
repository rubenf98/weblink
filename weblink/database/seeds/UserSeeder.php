<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Admin',
            'email'=> 'admin@admin.com',
            'password'=> bcrypt('admin'),
            'b_day' => '1998-03-03',
            'country' => 'Portugal',
            'gender' => 1
        ]);

        User::create([
            'name'=> 'Teste',
            'email'=> 'teste@teste.com',
            'password'=> bcrypt('secret'), 
            'b_day' => '1998-03-03',
            'country' => 'Portugal',
            'gender' => 0           
        ]);
    }
}
