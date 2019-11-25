@extends('layout')

@section('content')
@include('layout.button')

<div class="posts-container">
    <div class="posts">
        @foreach ($posts as $post)

        <div class="card" onclick="window.location.href='/post/{{$post->id}}'">

            @if ($post->image)
            <div class="card-image" style="--background: url({{ $post->image}});"></div>
            @else
            <div class="card-image" style="--background: url(/default.png);"></div>
            @endif

            <div class="card-text">
                <h2>{{$post->title}}</h2>
                <span class="date">{{$post->user->name}}: </span>
                <span class="date">{{$post->created_at->diffForHumans()}}</span>

            </div>

            <div class="card-tags">
                @foreach ($post->tag as $tag)
                <span class="tag">{{ $tag->name}} </span>
                @endforeach
            </div>


            <div class="card-stats">
                <div class="stat">
                    <div id="like" class="value"><img class="icon" src="/icons/heart-white.svg">
                        {{$post->likes->count()}}
                    </div>
                </div>
                <div class="stat">
                    <div id="like" class="value"><img class="icon" src="/icons/eye.svg">
                        {{$post->views}}
                    </div>
                </div>
                <div class="stat">
                    <div id="like" class="value"><img class="icon" src="/icons/comments.svg">
                        {{$post->comments}}
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <div class="pagination">
        {{ $posts->links("pagination::default") }}
    </div>

</div>






@endsection