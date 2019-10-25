@extends('welcome')

@section('content')
<link rel="stylesheet" href="/css/post.css">



<div class="post-container">

    <div class="post">
        <div class="post-image">
            <img src="https://cdn.mos.cms.futurecdn.net/7Jby8HZDkqdjmR8wMyjqeX-480-80.jpg">
        </div>

        <div class="post-content">
            <h1>{{$post->title}}</h1>
            <p>{{$post->description}}</p>

            <div class="links">
                <button href="https://uma.pt" target="_blank">Visit</button>
                <button href="https://github.com/" target="_blank">Source</button>
            </div>

            <div class="info">
                <p>{{$post->user->name}}</p>
                @foreach ($post->tag as $tag)
                <span class="tag" style="--color: {{ $tag->color}};">{{ $tag->name}} </span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="comments">
        @foreach ($post->comment as $comment)

        <div class="comment">
            {{$comment->content}}
        </div>

        @endforeach
    </div>

</div>

@endsection