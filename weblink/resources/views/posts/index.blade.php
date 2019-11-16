@extends('welcome')

@section('content')


<link rel="stylesheet" href="/css/posts.css">

<div class="posts-container">
    <div class="posts">
        @foreach ($posts as $post)

        <div onclick="window.location.href='/post/{{$post->id}}'" class="card">

            @forelse ($post->post_img as $img)
            @if ($loop->first)
            <div class="card-image" style="--background: url({{ $img->url}});"></div>
            @endif
            @empty
            <div class="card-image" style="--background: url(/default.png);"></div>
            @endforelse

            <div class="card-text">
                <span class="date">{{$post->user->name}}: </span>
                <span class="date">{{$post->created_at->diffForHumans()}}</span>
                <h2>{{$post->title}}</h2>
            </div>

            <div class="card-tags">
                @foreach ($post->tag as $tag)
                <span class="tag">{{ $tag->name}} </span>
                @endforeach
            </div>


            <div class="card-stats">
                <div class="stat">
                    <div class="value"><i class="far fa-star"></i> {{$post->favorites}}</div>
                </div>
                <div class="stat">
                    <div class="value"><i class="far fa-eye"></i> {{$post->views}}</div>
                </div>
                <div class="stat">
                    <div class="value"><i class="far fa-comments"></i> {{$post->comments}}</div>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <div class="pagination">
        {{ $posts->links() }}
    </div>


</div>






@endsection