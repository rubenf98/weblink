<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Laravel'],
            ['name' => 'React'],
            ['name' => 'Vue'],
            ['name' => 'anime.js'],
            ['name' => 'Sass'],
            ['name' => 'Java'],
            ['name' => 'PHP'],
            ['name' => 'JavaScript'],
            ['name' => 'Python'],
            ['name' => 'Ruby'],
            ['name' => 'C++'],
            ['name' => 'C#'],
            ['name' => 'C'],
            ['name' => 'Perl'],
            ['name' => 'Go'],
            ['name' => 'Hack'],
            ['name' => 'Django'],
            ['name' => 'Node'],
            ['name' => 'Express'],
            ['name' => 'Rails'],
            ['name' => 'Spring'],
            ['name' => 'Angular'],
            ['name' => 'Ember'],
            ['name' => 'Backbone'],
            ['name' => 'HAML'],
        ];

        foreach ($items as $item) {
            Tag::create($item);
        }

        // give each post some tags
        foreach (Post::all() as $post) {

            $limit = rand(1, 3);

            while ($post->tag()->count() < $limit) {
                $id = Tag::all()->count();

                $tag = rand(1, $id);

                if (!$post->tag()->sync([$tag], false)) {
                    $post->tag()->attach($tag);
                }
            }
            $post->save();
        }
    }
}
