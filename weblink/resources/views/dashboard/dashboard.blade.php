@extends('layout')

@section('content')
<div class="dashboard-container">
    @include('dashboard.nav')
    <div id="dashboardContent" class="dashboardContent">
        @yield('dashboardContent')
    </div>
</div>


@endsection