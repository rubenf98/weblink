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
            ['name' => 'Laravel', 'description' => 'Framework PHP para trabalho estruturado e rápido.', 'image' => '/images/tags/laravel.png'],
            ['name' => 'React', 'description' => 'Biblioteca JavaScript para criação de interfaces de utilizador.', 'image' => '/images/tags/react.png'],
            ['name' => 'Vue', 'description' => 'Framework JavaScript para criação de componentes reutilizáveis.', 'image' => '/images/tags/vue.png'],
            ['name' => 'anime.js', 'description' => 'Biblioteca leve de animação JavaScript.', 'image' => '/images/tags/anime.png'],
            ['name' => 'Sass', 'description' => 'Linguagem de script que é interpretada ou compilada em Cascading Style Sheets', 'image' => '/images/tags/sass.png'],
            ['name' => 'Java', 'description' => 'Linguagem de programação orientada a objetos da Oracle Corporation.', 'image' => '/images/tags/java.png'],
            ['name' => 'PHP', 'description' => 'Utilizada para o desenvolvimento de aplicações no lado do servidor.', 'image' => '/images/tags/php.png'],
            ['name' => 'JavaScript', 'description' => 'Linguagem de script em alto nível com tipagem dinâmica fraca e multi-paradigma.', 'image' => '/images/tags/javascript.png'],
            ['name' => 'Python', 'description' => 'Linguagem de alto nível, interpretada, imperativa, orientada a objetos, funcional.', 'image' => '/images/tags/python.png'],
            ['name' => 'Ruby', 'description' => 'Linguagem de programação interpretada multiparadigma, de tipagem dinâmica e forte.', 'image' => '/images/tags/ruby.png'],
            ['name' => 'C++', 'description' => 'Linguagem de programação compilada multi-paradigma e de uso geral.', 'image' => '/images/tags/cplusplus.png'],
            ['name' => 'C#', 'description' => 'Linguagem de programação, multiparadigma, de tipagem forte e parte da plataforma .NET.', 'image' => '/images/tags/csharp.png'],
            ['name' => 'C', 'description' => 'Linguagem de programação compilada de propósito geral, estruturada, imperativa, procedural, padronizada.', 'image' => '/images/tags/c.png'],
            ['name' => 'Perl', 'description' => 'Família de duas linguagens multiplataforma. A linguagem passou por muitas atualizações e revisões.', 'image' => '/images/tags/perl.png'],
            ['name' => 'Go', 'description' => 'Linguagem de programação compilada e focada em produtividade e programação concorrente.', 'image' => '/images/tags/go.png'],
            ['name' => 'Hack', 'description' => 'Linguagem para o HipHop Virtual Machine, é um software de código aberto sob a licença BSD.', 'image' => '/images/tags/hack.png'],
            ['name' => 'Django', 'description' => 'Framework Python para desenvolvimento rápido para web, que utiliza o padrão model-template-view.', 'image' => '/images/tags/django.png'],
            ['name' => 'Node', 'description' => 'Interpretador de JavaScript assíncrono focado em migrar a programação do cliente para os servidores.', 'image' => '/images/tags/node.png'],
            ['name' => 'Spring', 'description' => 'Framework Java não intrusiva, baseada nos padrões IoC e injeção de dependência. ', 'image' => '/images/tags/spring.png'],
            ['name' => 'Angular', 'description' => 'Framework JavaScript open source, que auxilia na execução de single-page applications.', 'image' => '/images/tags/angular.png'],
            ['name' => 'Ember', 'description' => 'Framework JavaScript open source, baseado na arquitetura Model–view–view-model (MVVM).', 'image' => '/images/tags/ember.png'],
            ['name' => 'Backbone', 'description' => 'Biblioteca JavaScript inspirada em uma interface JSON RESTful.', 'image' => '/images/tags/backbone.png'],
            ['name' => 'HAML', 'description' => 'Sistema de modelos projetado para evitar a gravação de código embutido e tornar o HTML mais limpo.', 'image' => '/images/tags/haml.png'],
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
