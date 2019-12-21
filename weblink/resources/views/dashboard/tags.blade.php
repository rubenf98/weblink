@extends('dashboard.dashboard')

@section('dashboardContent')
<div class="default-table-container">
    <h1>Tags</h1>
    <div class="table-filter-container">
        <div class="search-container">
            <form class="search-form" action="/dashboard/tags" method="get">
                <input autofocus id="search" class="search-input" type="text" placeholder="What are you looking for?"
                    name="search">

                @if (Request::get('order'))
                <input type="hidden" name="order" value="<?php echo htmlspecialchars(Request::get('order')); ?>">
                <input id="tech" type="hidden" name="tech">
                @endif

                <input class="search-submit" type="submit" value="Search">
            </form>
        </div>
        <button class="add-button">Add new</button>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr class="w3-red">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Clicks</th>
                    <th>Views</th>
                    <th>Likes</th>
                    <th>Operations</th>
                </tr>
            </thead>
            @foreach ($tags as $tag)
            <tr>
                <td><img src={{$tag->image}} class="profile-image" srcset=""></td>
                <td>{{$tag->name}}</td>
                <td>{{$tag->description}}</td>
                <td>{{$tag->clicks}}</td>
                <td>{{$tag->views}}</td>
                <td>{{$tag->likes}}</td>
                <td>
                    <div class="operation-container">
                        <img src="/icons/pen-solid.svg" class="operation-icon">
                        <img src="/icons/delete.svg" class="operation-icon">
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection