@extends('layout')

@section('content')
@include('layout.button')

<div class="posts-container">
    <div class="search-container">
        <form class="search-form" action="" method="get">
            <input class="search-input" type="text" placeholder="What are you looking for?" name="post">



            <input class="search-submit" type="submit" value="Search">


        </form>


    </div>

    <div class="posts">
        <form class="order-form" action="" method="get">

            <select class="search-select">
                <option value="volvo">New</option>
                <option value="saab">Hot</option>
                <option value="mercedes">Rising</option>
                <option value="audi">Best</option>
            </select>
        </form>
        @foreach ($posts as $post)

        <div class="card" onclick="window.location.href='/post/{{$post->id}}'">

            @if ($post->image)
            <div class="card-image" style="--background: url({{ $post->image}});"></div>
            @else
            <div class="card-image" style="--background: url(/default.png);"></div>
            @endif

            <div class="card-text">
                <h2>{{$post->title}}</h2>
                <span class="name">{{$post->user->name}}</span>
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