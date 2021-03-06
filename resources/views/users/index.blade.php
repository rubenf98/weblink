@extends('dashboard.dashboard')

@section('dashboardContent')

<div class="default-table-container">
    <h1>Members</h1>
    <div class="table-filter-container">
        <div>
            <div class="search-container">
                <form class="search-form" action="/dashboard/users" method="get">
                    <input autofocus id="user-search" class="search-input" type="text"
                        placeholder="What are you looking for?" name="search">

                    <input class="search-submit" type="submit" value="Search">
                </form>

            </div>
            <a class="reset-button" href="/dashboard/users">Reset</a>
        </div>
        <button id="user-create-button" class="add-button">Add new</button>
    </div>
    @if (count($users) > 0)
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Points</th>
                    <th>Birthday</th>
                    <th>Member Since</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            @foreach ($users as $user)
            <tr id="row-user-{{$user->id}}">
                <td><img src={{$user->image}} class="profile-image" srcset=""></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->points}}</td>
                <td>{{$user->b_day}}</td>
                <td>{{$user->created_at}}</td>
                <td><span class="tag {{$user->status}}">{{$user->status}}</span></td>
                <td>
                    <div class="operation-container">

                        @if ($user->status == "banned")
                        <form action="/user/status/{{$user->id}}" method="post">
                            @csrf
                            <button type="submit" style="--background: url(/images/icons/unban.svg);"> </button>
                        </form>
                        @else
                        <form action="/user/status/{{$user->id}}" method="post">
                            @csrf
                            <button type="submit" style="--background: url(/images/icons/ban.svg);"> </button>
                        </form>
                        @endif



                        <img src="/images/icons/pen-solid.svg" class="operation-icon edit-user-button"
                            id="edit-user-{{$user->id}}">
                        <img onclick="deleteRecord({{$user->id}}, 'user')" src="/images/icons/delete.svg"
                            class="operation-icon">
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

<script>
   
</script>
<script src="/js/welcome.js"></script>
<script src="/js/user.js"></script>
@endsection