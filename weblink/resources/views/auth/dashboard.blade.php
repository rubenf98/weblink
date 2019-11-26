@extends('layout')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="dashboard-container">
    <h2>Users</h2>

    <table class="w3-table-all">
        <thead>
            <tr class="w3-red">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Points</th>
            </tr>
        </thead>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Adam</td>
            <td>Johnson</td>
            <td>67</td>
        </tr>
    </table>
</div>
@endsection