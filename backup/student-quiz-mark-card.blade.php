@foreach ($quizAndscores['quizDetail'] as $QandS)
    @php
        $QandS = (object)$QandS;                                
    @endphp

    @if (count($QandS->attemptScore))
                            
    <div class="card module-exam-card me-1">
        
        <div class="card-body">
            <div class="quiz-score-card">
                    {{-- <i data-feather="feather" class="font-medium-3 text-primary"></i> --}}
                Module:
                <a href="{{ route('this-section', $QandS->section_id) }}" class="text-info">
                    {{ $QandS->section_title }}
                </a>
            </div>
            <div class="quiz-score-card mt-1">
                Section: 
                    {{-- <i data-feather="feather" class="font-medium-3 text-success"></i> --}}
                <a href="{{ route('startQuiz',$QandS->section_id) }}" 
                class="text-info">
                    {{ $QandS->quiz_title }}
                </a>
            </div>
            <div class="quiz-score-card mt-1">
                Total Questions : {{ $QandS->totalQuestions }}
            </div>
            <div class="quiz-score-card mt-1">
                Total Attempts : {{ Helper::array_count($QandS->attemptScore) }}
            </div>
            <div class="quiz-score-card mt-1">
                Heighest Score : {{ Helper::array_max($QandS->attemptScore) }}
            </div>
            <div class="quiz-score-card mt-1">
                Average Score(per attempt) : {{ Helper::array_avg($QandS->attemptScore) }}
            </div>            
        </div>
        
    </div>    
    @endif
@endforeach