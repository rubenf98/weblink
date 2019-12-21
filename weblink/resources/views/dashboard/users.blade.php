@extends('dashboard.dashboard')

@section('dashboardContent')

<div class="default-table-container">
    <h1>Members</h1>
    <div class="table-filter-container">
        <div class="search-container">
            <form class="search-form" action="/dashboard/users" method="get">
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
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Points</th>
                    <th>Member Since</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            @foreach ($users as $user)
            <tr>
                <td><img src={{$user->image}} class="profile-image" srcset=""></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->points}}</td>
                <td>{{$user->created_at}}</td>
                <td><span class="tag {{$user->status}}">{{$user->status}}</span></td>
                <td>
                    <div class="operation-container">
                        <img src="/icons/ban.svg" class="operation-icon">
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