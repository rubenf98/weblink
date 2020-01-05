<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\PostView;
use App\Like;
use App\User;

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
            'user_id' => 1,
            'title' => 'CodePen',
            'description' => 'CodePen is a social development environment for front-end designers and developers. Build and deploy a website, show off your work, build test cases to learn and debug, and find inspiration.',
            'url' => 'https://codepen.io/',
            'image' => '/images/website/codepen.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Pusher',
            'description' => 'Hosted APIs that are flexible,  scalable, and easy to integrate',
            'url' => 'https://pusher.com/',
            'image' => '/images/website/pusher.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Ant Design',
            'description' => 'A design system with values of Nature and Determinacy for better user experience of enterprise applications',
            'url' => 'https://ant.design/',
            'image' => '/images/website/antd.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Overleaf',
            'description' => 'The easy to use, online, collaborative LaTeX editor',
            'url' => 'https://www.overleaf.com/',
            'image' => '/images/website/overleaf.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Firefox',
            'description' => 'Get the latest Firefox browser and start getting the respect you deserve with our family of privacy-first products.',
            'url' => 'https://www.firefox.com',
            'image' => '/images/website/firefox.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Chrome',
            'description' => 'Get more done with the new Chrome now more simple, secure, and faster than ever - with Google’s smarts built-in.',
            'url' => 'https://www.google.com/intl/en-ENG/chrome/',
            'image' => '/images/website/chrome.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Universidade da Madeira',
            'description' => 'A Universidade da Madeira é uma universidade pública portuguesa. Localizada na cidade do Funchal, na Região Autónoma da Madeira, foi criada a 13 de Setembro de 1988.',
            'url' => 'https://www.uma.pt/',
            'image' => '/images/website/uma.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Lenovo',
            'description' => 'Lenovo is a Chinese multinational technology company with headquarters in Beijing. It designs, develops, manufactures, and sells personal computers, tablet computers, smartphones, workstations, servers, electronic storage devices, IT management software, and smart televisions.',
            'url' => 'https://www.lenovo.com/us/en/',
            'image' => '/images/website/lenovo.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'ITI',
            'description' => 'ITI is dedicated to the interdisciplinary field of Human-computer Interaction and explores psychology, social sciences, computer science, creativity and Design.',
            'url' => 'https://iti.larsys.pt/',
            'image' => '/images/website/iti.png',
            'source' => 'https://github.com/',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Nike',
            'description' => 'American multinational corporation that is engaged in the design, development, manufacturing, and worldwide marketing and sales of footwear, apparel, equipment, accessories, and services. The company is headquartered near Beaverton, Oregon, in the Portland metropolitan area.',
            'url' => 'https://www.nike.com',
            'image' => '/images/website/nike.png',
            'source' => 'https://github.com/',
        ]);

        // give each post some views
        foreach (Post::all() as $post) {

            $limit = rand(1, 50);

            for ($i = 0; $i < $limit; $i++) {
                PostView::create([
                    'user_id' => 1,
                    'post_id' => $post->id,
                ]);
            }

            // give each post some likes
            foreach (User::all() as $user) {
                $random = rand(1, 100);
                if ($random > 50 && $post->likes()->count() < $post->views()->count()) {
                    Like::create([
                        'user_id' => $user->id,
                        'likeable_id' => $post->id,
                        'likeable_type' => 'App\Post',
                    ]);
                }
            }
        }
    }
}
