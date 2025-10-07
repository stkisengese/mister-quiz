@extends('app')

@section('content')

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div class="content">
    <h2 class="title">Leaderboard</h2>
    <table class="leaderboard-table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>XP</th>
                <th>Total Correct</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->xp }}</td>
                <td>{{ $user->total_correct }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection