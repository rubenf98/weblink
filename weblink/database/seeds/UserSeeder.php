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
            'role' => 'admin',
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

        User::create([
            'name'=> 'Teste',
            'email'=> 'teste2@teste.com',
            'password'=> bcrypt('admin'),
            'b_day' => '1998-03-03',
            'country' => 'Portugal',
            'role' => 'admin',
            'gender' => 1
        ]);

        User::create([
            'name'=> 'Teste',
            'email'=> 'teste3@teste.com',
            'password'=> bcrypt('secret'), 
            'b_day' => '1998-03-03',
            'country' => 'Portugal',
            'gender' => 0           
        ]);

        User::create([
            'name'=> 'Teste',
            'email'=> 'teste4@teste.com',
            'password'=> bcrypt('admin'),
            'b_day' => '1998-03-03',
            'country' => 'Portugal',
            'role' => 'admin',
            'gender' => 1
        ]);

        User::create([
            'name'=> 'Teste',
            'email'=> 'teste5@teste.com',
            'password'=> bcrypt('secret'), 
            'b_day' => '1998-03-03',
            'country' => 'Portugal',
            'gender' => 0           
        ]);

        User::create([
            'name'=> 'Teste',
            'email'=> 'teste6@teste.com',
            'password'=> bcrypt('admin'),
            'b_day' => '1998-03-03',
            'country' => 'Portugal',
            'role' => 'admin',
            'gender' => 1
        ]);

        User::create([
            'name'=> 'Teste',
            'email'=> 'teste7@teste.com',
            'password'=> bcrypt('secret'), 
            'b_day' => '1998-03-03',
            'country' => 'Portugal',
            'gender' => 0           
        ]);
    }
}
