@extends('layout')

@section('content')
@include('layout.button')

<div class="posts-container">
    <div class="search-container">
        <form class="search-form" action="/posts" method="get">
            <input autofocus id="search" class="search-input" type="text" placeholder="What are you looking for?"
                name="search">

            @if (Request::get('order'))
            <input type="hidden" name="order" value="<?php echo htmlspecialchars(Request::get('order')); ?>">
            <input id="tech" type="hidden" name="tech">
            @endif

            <input class="search-submit" type="submit" value="Search">
        </form>
        <a class="reset-button" href="/posts">Reset Filters</a>
    </div>


    <div class="posts">
        <form class="order-form" action="/posts" method="get">
            <div class="filler"></div>

            <div class="filler"></div>

            <select id="sort" class="search-select">
                <option value="new">&#xf250; New </option>
                <option value="likes">&#xf004; Likes</option>
                <option value="views">&#xf06e; Views</option>
                <option value="hot">&#xf3b1; Hot</option>
                <option value="comments">&#xf201; Comments</option>
                <option value="best">&#xf3c6; Best</option>
                <option value="old">&#xf3c6; Old</option>
            </select>
        </form>

        <div id="post" class="post">
            @forelse ($posts as $post)

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
                        <div id="like" class="value"><img class="icon" src="/images/icons/heart-white.svg">
                            {{$post->likes->count()}}
                        </div>
                    </div>
                    <div class="stat">
                        <div id="like" class="value"><img class="icon" src="/images/icons/eye.svg">
                            {{$post->views}}
                        </div>
                    </div>
                    <div class="stat">
                        <div id="like" class="value"><img class="icon" src="/images/icons/comments.svg">
                            {{$post->comments}}
                        </div>
                    </div>
                </div>
            </div>
            @empty

            <div class="no-data">
                <img src="/images/nodata.png">
                <p>No results found!</p>
            </div>
            @endforelse



        </div>

        <div id="pag" class="pagination">

            {{$posts->appends(request()->except('page'))->links("pagination::default")}}
        </div>

    </div>

</div>
<script src="/js/posts.js"></script>
@endsection