@php
    $attemptsExist = false;
@endphp
@foreach ($quizAndscores['quizDetail'] as $QandS)
    @php
        $QandS = (object)$QandS;                                
    @endphp

    @if (count($QandS->attemptScore))
    @php
    $attemptsExist = true;
        
    @endphp
    @endif
@endforeach
@if ($attemptsExist)
@foreach ($quizAndscores['quizDetail'] as $QandS)
    @php
        $QandS = (object)$QandS;                                
    @endphp

    @if (count($QandS->attemptScore))

    <style>

        .student-quiz-mark-card {
            background-color: white;
            padding: 20px 30px 30px 30px;
            border-radius: 20px;
        }

    </style>

    <div class="student-quiz-mark-card">

    <div class="row mt-1">
        <div class="col-6">
            {{-- <i data-feather="feather" class="font-medium-3 text-primary"></i> --}}
            Module:
            <a href="{{ route('this-section', $QandS->section_id) }}"
                class="text-success">
                {{ $QandS->section_title }}
            </a>
        </div>
        <div class=" col-6 ">
            Section:
            {{-- <i data-feather="feather" class="font-medium-3 text-success"></i> --}}
            <a href="{{ route('startQuiz',$QandS->section_id) }}" class="text-success">
                {{ $QandS->quiz_title }}
            </a>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-6">
            <div class="">
                Total Questions : {{ $QandS->totalQuestions }}
            </div>
        </div>
        <div class="col-6">
            <div class="">
                Total Attempts : {{ Helper::array_count($QandS->attemptScore) }}
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-6">
            <div class="">
                Heighest Score : {{ Helper::array_max($QandS->attemptScore) }}
            </div>
        </div>
        <div class="col-6">
            <div class="">
                Average Score(per attempt) : {{ Helper::array_avg($QandS->attemptScore) }}
            </div>
        </div>
    </div>
</div>

@endif
@endforeach
@else
<div class="student-quiz-mark-card">
    <div class="col-12">
        <div class="col-12">
            No Record Found!
        </div>
    </div>
</div>
@endif