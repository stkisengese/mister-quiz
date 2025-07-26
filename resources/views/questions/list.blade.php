@extends('app')

@section('content')

    <a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

    <div class="content">
        <p class="title">Quiz Questions</p>

        <form action="{{ route('quiz.submit') }}" method="post">
            @csrf
            <input type="hidden" name="quiz" value="{{ $quiz->id }}">

            @if (isset($questions) && count($questions) > 0)
                @foreach ($questions as $question)
                    <x-question :question="$question" />
                @endforeach
            @else
                <p class="center title" style="color: white;">No questions available</p>
            @endif

            <button type="submit" class="center green-btn">Submit Quiz</button>
        </form>
    </div>

@endsection