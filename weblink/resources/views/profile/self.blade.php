@extends('layout')

@section('content')
<div class="profile-container">
    <h1>Seu profile</h1>
    <p>ID: {{$userInfo->id}}</p>

    <div class="profileData">
        
        <p>{{$userInfo->name}}</p>
       <img src={{$userInfo->image}} alt=""> 
        <p>Email: {{$userInfo->email}}</p>
    </div>
</div>
@endsection