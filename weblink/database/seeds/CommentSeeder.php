<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\User;
use App\Like;
use App\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'Sometimes I wonder if I really can. But then I think to myself, maybe I can\'t. But if I could, that would be good. Maybe it\'s all a lie?',
            'If you really wanted to do that, then why wouldn\'t you do that? Instead you do this. It makes no sense.',
            'I like to say things twice, say things twice. It can get annoying though, annoying though.',
            'If you really wanted to do that, then why wouldn\'t you do that? Instead you do this. It makes no sense.',
            'I can drive 10 miles, walk 50 feet. Turn around and before I know it, I\'d be back home. Or would I? I\'m not sure but that\'s just how it is.',
            'I see you have something to talk about. Well, I have something to shout about. Infact something to sing about. But I\'ll just keep quiet and let you carry on.',
            'From this day on I shall be known as Bob. For Bob is a good name and I am good. But if you want you can just call me Sally.',
            'Men are simple things. They can survive a whole weekend with only three things: beer, boxer shorts and batteries for the remote control.',
            'Microsoft bought Skype for 8,5 billion!.. what a bunch of idiots! I downloaded it for free!',
            'Life is full of temporary situations, ultimately ending in a permanent solution.',
            'The human body was designed by a civil engineer. Who else would run a toxic waste pipeline through a recreational area?',
            'After one look at this planet any visitor from outer space would say “I WANT TO SEE THE MANAGER.”',
            'Thank you Facebook, I can now farm without going outside, cook without being in my kitchen, feed fish I don\'t have & waste an entire day without having a life.',
            'I am ready to meet my Maker. Whether my Maker is prepared for the great ordeal of meeting me is another matter.',
            'Why go to college? There\'s Google.',
            'Don\'t you find it Funny that after Monday(M) and Tuesday(T), the rest of the week says WTF?',
            'Sorry, I can\'t hangout. My uncle\'s cousin\'s sister in law\'s best friend\'s insurance agent\'s roommate\'s pet goldfish died. Maybe next time.',
            'Life is full of temporary situations, ultimately ending in a permanent solution.',
            'Some people come into our lives and leave footprints on our hearts, while others come into our lives and make us wanna leave footprints on their face.',
            'I feel sorry for people who don\'t drink. When they wake up in the morning, that\'s as good as they\'re going to feel all day.'
        ];

        foreach (Post::all() as $post) {

            $random = rand(1, 100);

            foreach (User::all() as $user) {
                $random = rand(1, 100);
                shuffle($items);
                if ($random > 50) {
                    Comment::create([
                        'user_id' => $user->id,
                        'post_id' => $post->id,
                        'content' => $items[0],
                    ]);
                }
            }
        }

        // give each comment some likes
        foreach (Comment::all() as $comment) {

            foreach (User::all() as $user) {
                $random = rand(1, 100);
                if ($random > 50) {
                    Like::create([
                        'user_id' => $user->id,
                        'likeable_id' => $comment->id,
                        'likeable_type' => 'App\Comment',
                    ]);
                }
            }
        }
    }
}
