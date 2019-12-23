@extends('dashboard.dashboard')

@section('dashboardContent')
<div class="default-table-container">
    <h1>Suggestions</h1>
    <div class="table-filter-container">
        <div>
            <div class="search-container">
                <form class="search-form" action="/dashboard/suggestions" method="get">
                    <input autofocus id="search" class="search-input" type="text"
                        placeholder="What are you looking for?" name="search">

                    @if (Request::get('order'))
                    <input type="hidden" name="order" value="<?php echo htmlspecialchars(Request::get('order')); ?>">
                    <input id="tech" type="hidden" name="tech">
                    @endif

                    <input class="search-submit" type="submit" value="Search">
                </form>

            </div>
            <a class="reset-button" href="/dashboard/suggestions">Reset</a>
        </div>
    </div>

    @if (count($suggestions) > 0)
    <div class="table-container">
        <table class="table">
            <thead>
                <tr class="w3-red">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Creation</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            @foreach ($suggestions as $suggestion)
            <tr id="row-tag-suggestion-{{$suggestion->id}}">
                <td>{{$suggestion->name}}</td>
                <td>{{$suggestion->description}}</td>
                <td>{{$suggestion->link}}</td>
                <td>{{$suggestion->created_at}}</td>
                <td>Accepted</td>
                <td>
                    <div class="operation-container">
                        <img src="/icons/ban.svg" class="operation-icon">
                        <img src="/icons/pen-solid.svg" class="operation-icon">
                        <img onclick="deleteRecord({{$suggestion->id}}, 'tag-suggestion')" src="/icons/delete.svg" class="operation-icon">
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