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
            'name'=> 'Mary S. Roberts',
            'email'=> 'teste@teste.com',
            'password'=> bcrypt('secret'), 
            'b_day' => '1980-12-19',
            'country' => 'Portugal',
            'gender' => 0           
        ]);

        User::create([
            'name'=> 'James M. Peterson',
            'email'=> 'teste2@teste.com',
            'password'=> bcrypt('secret'),
            'b_day' => '1943-08-02',
            'country' => 'Portugal',
            'gender' => 1
        ]);

        User::create([
            'name'=> 'Etta E. Oliver',
            'email'=> 'teste3@teste.com',
            'password'=> bcrypt('secret'), 
            'b_day' => '1967-06-12',
            'country' => 'Portugal',
            'gender' => 0           
        ]);

        User::create([
            'name'=> 'Marc Evans',
            'email'=> 'teste4@teste.com',
            'password'=> bcrypt('secret'),
            'b_day' => '1955-08-17',
            'country' => 'Portugal',
            'gender' => 1
        ]);

        User::create([
            'name'=> 'Lisa Torres',
            'email'=> 'teste5@teste.com',
            'password'=> bcrypt('secret'), 
            'b_day' => '1981-10-22',
            'country' => 'Portugal',
            'gender' => 0           
        ]);

        User::create([
            'name'=> 'Mary Watson',
            'email'=> 'teste6@teste.com',
            'password'=> bcrypt('secret'),
            'b_day' => '1972-01-18',
            'country' => 'Portugal',
            'gender' => 0
        ]);

        User::create([
            'name'=> 'Ronald C. Rudolph',
            'email'=> 'teste7@teste.com',
            'password'=> bcrypt('secret'), 
            'b_day' => '1992-09-05',
            'country' => 'Portugal',
            'gender' => 0           
        ]);
    }
}
