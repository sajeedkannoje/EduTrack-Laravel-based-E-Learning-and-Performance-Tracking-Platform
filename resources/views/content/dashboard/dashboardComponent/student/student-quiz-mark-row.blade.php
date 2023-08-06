@foreach ($quizAndscores['quizDetail'] as $QandS)
    @php
        $QandS = (object)$QandS;                                
    @endphp


    @if (count($QandS->attemptScore))
                            
    <tr>
        <th>
            <a href="{{ route('this-section', $QandS->section_id) }}" class="text-success">
                {{ $QandS->section_title }}
            </a>
            
        </th>

        <th>
            <a href="{{ route('startQuiz',$QandS->section_id) }}" 
            class="text-success">
                {{ $QandS->quiz_title }}
            </a>
        </th>

        <td>
            <div class="text-black fw-bold">
                {{ $QandS->totalQuestions }}
            </div>
        </td>

        <td>
            <div class="text-black fw-bold">
                {{ Helper::array_count($QandS->attemptScore) }}
            </div>
        </td>

        <td>
            <div class="text-black fw-bold">
                {{ Helper::array_max($QandS->attemptScore) }}
            </div>
        </td>

        <td>
            <div class="text-black fw-bold">
                {{ Helper::array_avg($QandS->attemptScore) }}
            </div>
        </td>

    </tr>  
    @endif  
@endforeach