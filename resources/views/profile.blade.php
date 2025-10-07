@extends('app')

@section('content')

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div style="margin-top:100px">
    <div class="profile-header">
        <p class="title profile-name">{{ $user->username }}</p>
        <p class="title profile-email">{{ $user->email }}</p>
    </div>

    <div class="profile-header">
        <p class="title profile-xp">{{ $user->xp }} XP</p>
        <p class="title profile-rank">Rank: {{ $rank }}</p>
    </div>

    <div class="content">
        <h2 class="title">Category Stats</h2>
        <table class="leaderboard-table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Correct/Total</th>
                    <th>Percentage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats as $category => $stat)
                <tr>
                    <td>{{ ucfirst($category) }}</td>
                    <td>{{ $stat['correct'] }}/{{ $stat['total'] }}</td>
                    <td>{{ $stat['percentage'] }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection