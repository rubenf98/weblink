<?php

use Illuminate\Database\Seeder;
use App\PostImg;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostImg::create([
            'post_id' => 1,
            'url' => '/images/website/codepen.png',
        ]);

        PostImg::create([
            'post_id' => 2,
            'url' => '/images/website/pusher.png',
        ]);

        PostImg::create([
            'post_id' => 3,
            'url' => '/images/website/antd.png',
        ]);

        PostImg::create([
            'post_id' => 4,
            'url' => '/images/website/overleaf.png',
        ]);

        PostImg::create([
            'post_id' => 5,
            'url' => '/images/website/firefox.png',
        ]);

        PostImg::create([
            'post_id' => 6,
            'url' => '/images/website/chrome.png',
        ]);

        PostImg::create([
            'post_id' => 7,
            'url' => '/images/website/uma.png',
        ]);

        PostImg::create([
            'post_id' => 8,
            'url' => '/images/website/lenovo.png',
        ]);

        PostImg::create([
            'post_id' => 9,
            'url' => '/images/website/iti.png',
        ]);

        PostImg::create([
            'post_id' => 10,
            'url' => '/images/website/nike.png',
        ]);
    }
}
