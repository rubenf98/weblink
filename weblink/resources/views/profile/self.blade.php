@extends('layout')

@section('content')
<div class="profile-container">
    <div class="about">
        @if (Auth::user()->id==$user->id)
            <!-- Botão editar perfil -->
        @endif
        

        <div class="profileData">
            <img src="/default-user-male.svg" alt="">
                <p>{{$user->name}}</p>
                <p>{{$user->description}}</p>
            <div class="contact_follow">
                <button>Follow</button>
                <button>Contact</button>
            </div>
        </div>
    </div>
    <div class="profile_posts">
        <h1>Posts</h1>
        <hr>
        <div class="profile_posts_section">
            @foreach ($user->post as $post)
                
            <a href="/post/{{$post->id}}">
            <div class="profile_post">
                <img src={{$post->image}} alt="">
                <div class="post-text">
                    <div class="post-title"> {{$post->title}}</div>
                    <div class="post-description">{{$post->description}}</div>
                    <div class="post-date">{{$post->created_at->toFormattedDateString()}}</div>
                </div>
            </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection