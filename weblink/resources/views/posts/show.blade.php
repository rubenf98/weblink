@extends('welcome')

@section('content')
<link rel="stylesheet" href="/css/post.css">



<div class="post-container">

    <div class="post">
        <div class="post-image">
            <img class="image" src="https://www.bitcatcha.com/wp-content/uploads/2017/06/bitcatcha-hostingspeed.jpg"
                alt="">
        </div>

        <div class="post-content">
            <h1>{{$post->title}}</h1>

            <br>



            <b> <i class="fas fa-paragraph"></i> Description</b>
            <p>{{$post->description}}</p>

            <b> <i class="fas fa-tags"></i> Tags</b>
            <div class="info">
                <p>
                    @foreach ($post->tag as $tag)
                    <span class="tag">{{ $tag->name}} </span>
                    @if(!$loop->last)
                    |
                    @endif
                    @endforeach
                </p>

            </div>

            <div class="user">
                <div class="user-name">
                    <b> <i class="fas fa-user"></i> Creator</b>
                    <p> {{$post->user->name}} <a href="/#"><i class="fas fa-external-link-square-alt"></i></a></p>

                </div>
                <div class="user-rating">
                    <b> <i class="far fa-star"></i> Rating</b>
                    <p>{{$post->rating}}/5</p>
                </div>

            </div>

            <div class="user">
                <div class="user-name">
                    <div>
                        <b> <i class="fas fa-code"></i> Source </b>
                        <p><a href={{$post->source}} target="_blank">{{$post->source}}</a></p>
                    </div>

                </div>
                <div class="user-rating">
                    <div class="links">
                        <p>{{$post->created_at}}</p>

                    </div>
                </div>

            </div>





            <div class="links">
                <a href={{$post->url}} target="_blank"><button>Visit</button></a>
            </div>

        </div>
    </div>

    <hr>

    <h1>Comments</h1>

    <div>
        <form class="input-comment" action="/comment" method="post">
            <input class="input" type="text" placeholder="Add a comment" name="" id="">
            <select class="select-css" name="cars">
                <option value="1">Awfull</option>
                <option value="2">Bad</option>
                <option value="3">Medium</option>
                <option value="4">Good</option>
                <option value="5">Great</option>
            </select>
            <button type="submit" class="button">Post</button>
        </form>
    </div>


    <div class="comments">
        @foreach ($post->comment as $comment)

        <div class="comment">
            <div class="comment-user">
                <b>
                    <p>{{$comment->user->name}}</p>

                </b>
                2d
            </div>

            <div class="comment-content">
                {{$comment->content}}
            </div>

            <i class="fas fa-arrow-circle-up"></i> 312
        </div>


        <hr>

        @endforeach
    </div>

</div>

@endsection