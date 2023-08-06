<div class="card font-medium-3 text-black">
    <div class="quiz-questions">
        @php
            $questionNum = 1;
        @endphp
        <form action="{{ route('submitQuiz') }}" id="quiz-questions-form" method="post">
            @csrf
            @foreach ($quiz->questions as $que)
                <div class="row card-header input-parents">
                    <div class="fw-bold">
                        {{ __($questionNum.". ".$que->question) }}
                    </div>
                    <div class="row">
                        @php
                            $count = 0;
                            $countArry= ['A','B','C','D'];
                        @endphp
                        @foreach ($que->options as $option)
                            <div class="form-group m-1 col-5 quiz-question-list-container">
                                
                               <span class="quiz-question-list-style">{{$countArry[$count]}})</span>

                               <div class="quiz-question-list-input">
                                    <input type="radio" name="questionOption[{{ $que->id }}]" value="{{ $option->id }}" class="question-options form-input" id="{{ $option->id }}">
                                    <label class="text-dark" for="{{ $option->id }}">{{ $option->option_value }}</label>
                               </div>
                                
                            </div>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </div>
                </div>
                @php
                    $questionNum++;
                @endphp
            @endforeach
                @php
                  $quizMessageText= "Submit Quiz";
                  $quizMessageResetText= "Reset Quiz";
                    if($quiz->section->is_section == 0){
                        $quizMessageText= "Submit Exam";
                        $quizMessageResetText= "Reset Exam";
                    }

                @endphp
            <div class="card-footer">
                <button type="submit" class="btn btn-primary submit-quiz">{{$quizMessageText}}</button>
                <button type="reset" class="btn btn-warning reset-quiz">{{$quizMessageResetText}}</button>
            </div>
        </form>
    </div>
</div>
