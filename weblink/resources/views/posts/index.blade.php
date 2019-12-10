@extends('layout')

@section('content')
@include('layout.button')

<div class="posts-container">
    <div class="search-container">
        <form class="search-form" action="/posts" method="get">
            <input autofocus id="search" class="search-input" type="text" placeholder="What are you looking for?"
                name="search">

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


    </div>

    <div id="pag" class="pagination">

        {{$posts->appends(request()->except('page'))->links("pagination::default")}}
    </div>

</div>

<script>
    var url_string = $(location).attr('href');
    var url = new URL(url_string);
    var search = url.searchParams.get("search");

    if (search) 
        document.getElementById("search").defaultValue = search;
</script>

<script>
    $( "#sort" ).change(function() {
        console.log($( "#sort option:selected" ).val())
        $.ajax({ url: "/posts?order="+$( "#sort option:selected" ).val(),
            context: document.body,
            success: function(data){
                

                       
  

                    }});
    });
</script>


@endsection