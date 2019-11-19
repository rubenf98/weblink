@extends('layout')

@section('content')
<div class="profile-container">
    <h1>Visita</h1>

    <p>Está a visitar o perfil de: {{$userInfo->name}}</p>
</div>
@endsection