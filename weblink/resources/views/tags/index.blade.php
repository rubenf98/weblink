@extends('layout')

@section('content')

<div class="tags-container">

    <div class="header">
        <h1>Explore Topics</h1>
        <p>Languages, resources, libraries, frameworks and UI patterns.</p>
        <input class="button" type="button" value="Suggest a Topic">
    </div>

    <div class="tag-container">
        @foreach ($tags as $tag)
        <div id="tag" class="tag" onclick="window.location.href='/posts?tech={{$tag->name}}&order=best'">
            <div id="tagImage" class="tag-image">
                <img src={{$tag->image}}>
            </div>
            <div id="tagInfo" class="tag-info">
                <h1>{{$tag->name}}</h1>
                <p>{{$tag->description}}</p>
            </div>
        </div>
        @endforeach

    </div>


</div>


@endsection