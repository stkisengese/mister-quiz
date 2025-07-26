@props(['question'])

<div class="mb4">
    <p class="center title" style="color: white; font-size: 24px;">{{ $question->question }}</p>

    <div class="checkboxes-wrapper">
        @foreach ($question->answers as $answer)
            <div class="checkbox">
                <label>
                    <input type="radio" name="{{ $question->id }}" value="{{ $answer->answer }}" required>
                    <span>{{ $answer->answer }}</span>
                </label>
            </div>
        @endforeach
    </div>

    <div class="center line"></div>
</div>