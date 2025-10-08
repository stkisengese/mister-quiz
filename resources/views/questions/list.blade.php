@extends('app')

@section('title', 'Quiz | QuizMaster Pro')

@section('content')

<div class="container mx-auto px-4 py-12">
    <!-- Navigation Header -->
    <div class="flex justify-between items-center mb-12">
        <div class="text-2xl font-bold flex items-center">
            <i data-feather="award" class="mr-2 w-8 h-8"></i>
            QuizMaster Pro
        </div>
        <a href="{{ route('home') }}" class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center">
            <i data-feather="arrow-left" class="mr-2 w-5 h-5"></i> Back to Home
        </a>
    </div>

    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <div class="flex items-center justify-center mb-4">
                <i data-feather="help-circle" class="w-16 h-16 text-blue-300"></i>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Quiz Questions</h1>
            <p class="text-xl opacity-80">Answer all questions to complete the quiz</p>
        </div>

        <form action="{{ route('quiz.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="quiz" value="{{ $quiz->id }}">

            @if (isset($questions) && count($questions) > 0)
                @foreach ($questions as $index => $question)
                    <div class="glass-card p-6 md:p-8 mb-6">
                        <div class="mb-6">
                            <div class="flex items-start mb-4">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 bg-opacity-30 text-blue-300 font-bold mr-3 flex-shrink-0">
                                    {{ $index + 1 }}
                                </span>
                                <h3 class="text-xl md:text-2xl font-semibold">{{ $question->question }}</h3>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @foreach ($question->answers as $answer)
                                <label class="checkbox-item block p-4 rounded-lg cursor-pointer transition-all">
                                    <div class="flex items-center">
                                        <input type="radio" 
                                               name="{{ $question->id }}" 
                                               value="{{ $answer->answer }}" 
                                               class="sr-only" 
                                               required>
                                        <div class="flex-grow flex items-center">
                                            <span class="w-5 h-5 rounded-full border-2 border-gray-400 mr-3 flex-shrink-0 flex items-center justify-center radio-circle">
                                                <span class="w-3 h-3 rounded-full bg-blue-600 hidden radio-dot"></span>
                                            </span>
                                            <span class="text-gray-800 font-medium">{{ $answer->answer }}</span>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-8">
                    <button type="submit" class="px-12 py-4 bg-green-600 hover:bg-green-700 rounded-full text-xl font-semibold btn-hover-effect flex items-center justify-center mx-auto">
                        <i data-feather="send" class="mr-2 w-6 h-6"></i> Submit Quiz
                    </button>
                </div>
            @else
                <div class="glass-card p-12 text-center">
                    <i data-feather="alert-circle" class="w-16 h-16 mx-auto mb-4 text-yellow-400"></i>
                    <p class="text-2xl font-semibold mb-4">No Questions Available</p>
                    <p class="opacity-70 mb-6">There are no questions for this quiz yet.</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-medium btn-hover-effect">
                        <i data-feather="arrow-left" class="mr-2 w-5 h-5"></i> Back to Home
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>

@section('styles')
<style>
    .checkbox-item input:checked ~ div .radio-circle {
        border-color: #2563eb;
    }
    
    .checkbox-item input:checked ~ div .radio-dot {
        display: block;
    }
    
    .checkbox-item:hover {
        background: rgba(59, 130, 246, 0.2);
    }
    
    .checkbox-item input:checked {
        background: rgba(37, 99, 235, 0.3);
    }
</style>
@endsection

@endsection