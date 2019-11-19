@extends('layout')

@section('content')
<div class="profile-container">
    <h1>Seu profile</h1>
    <p>ID: {{$userInfo->id}}</p>

    <div class="profileData">
        
        <p>{{$userInfo->name}}</p>
        <!-- sexo homem-->
        @if (true)
            <img src="/defaultUserMale.svg" alt="defaultUser">
        @else
            <img src="/defaultUserFemale.svg" alt="defaultUser">
        @endif
        
        <p>Email: {{$userInfo->email}}</p>
    </div>
</div>
@endsection