@extends('layout')

@section('content')
<div class="profile-container">
    <div class="about">
        
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
            <div class="profile_post">
                <img src="/default.png" alt="">
                <p>Descrição</p>
            </div>

            
        </div>
    </div>
</div>
@endsection