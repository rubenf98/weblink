@extends('dashboard.dashboard')

@section('dashboardContent')
<div class="default-table-container">
    <h1>Tags</h1>
    <div class="table-filter-container">
        <div>
            <div class="search-container">
                <form class="search-form" action="/dashboard/tags" method="get">
                    <input autofocus id="search" class="search-input" type="text"
                        placeholder="What are you looking for?" name="search">

                    <input class="search-submit" type="submit" value="Search">
                </form>
            </div>
            <a class="reset-button" href="/dashboard/tags">Reset</a>
        </div>
        <button class="add-button">Add new</button>
    </div>
    @if (count($tags) > 0)
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
            <tr id="row-tag-{{$tag->id}}">
                <td><img src={{$tag->image}} class="profile-image" srcset=""></td>
                <td>{{$tag->name}}</td>
                <td>{{$tag->description}}</td>
                <td>{{$tag->clicks}}</td>
                <td>{{$tag->views}}</td>
                <td>{{$tag->likes}}</td>
                <td>
                    <div class="operation-container">
                        <img src="/icons/pen-solid.svg" class="operation-icon">
                        <img onclick="deleteRecord({{$tag->id}}, 'tag')" src="/icons/delete.svg" class="operation-icon">
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="no-data">
        <img src="/images/nodata.png">
        <p>No results found!</p>
    </div>
    @endif

</div>
<script src="/js/welcome.js"></script>
@endsection