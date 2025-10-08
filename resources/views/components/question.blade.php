@props(['question'])

<div class="glass-card p-6 md:p-8 mb-6">
    <div class="mb-6">
        <div class="flex items-start mb-4">
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 bg-opacity-30 text-blue-300 font-bold mr-3 flex-shrink-0">
                #
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
</style>