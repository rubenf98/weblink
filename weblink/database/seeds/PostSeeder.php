<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id'=> 1,
            'title'=> 'My first Post',
            'description'=> 'The description of my Post',
            'url'=> 'mywebsite.com',
            'source'=> 'github.com',         
        ]);

        Post::create([
            'user_id'=> 1,
            'title'=> 'My second Post',
            'description'=> 'The description of my Post',
            'url'=> 'mywebsite.com',
            'source'=> 'github.com',         
        ]);
    }
}
