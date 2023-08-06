<div class="card font-medium-3 text-black">
    <div class="quiz-questions">
        <?php
            $questionNum = 1;
        ?>
        <form action="<?php echo e(route('submitQuiz')); ?>" id="quiz-questions-form" method="post">
            <?php echo csrf_field(); ?>
            <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $que): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row card-header input-parents">
                    <div class="fw-bold">
                        <?php echo e(__($questionNum.". ".$que->question)); ?>

                    </div>
                    <div class="row">
                        <?php
                            $count = 0;
                            $countArry= ['A','B','C','D'];
                        ?>
                        <?php $__currentLoopData = $que->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group m-1 col-5 quiz-question-list-container">
                                
                               <span class="quiz-question-list-style"><?php echo e($countArry[$count]); ?>)</span>

                               <div class="quiz-question-list-input">
                                    <input type="radio" name="questionOption[<?php echo e($que->id); ?>]" value="<?php echo e($option->id); ?>" class="question-options form-input" id="<?php echo e($option->id); ?>">
                                    <label class="text-dark" for="<?php echo e($option->id); ?>"><?php echo e($option->option_value); ?></label>
                               </div>
                                
                            </div>
                            <?php
                                $count++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php
                    $questionNum++;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $quizMessageText= "Submit Quiz";
                  $quizMessageResetText= "Reset Quiz";
                    if($quiz->section->is_section == 0){
                        $quizMessageText= "Submit Exam";
                        $quizMessageResetText= "Reset Exam";
                    }

                ?>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary submit-quiz"><?php echo e($quizMessageText); ?></button>
                <button type="reset" class="btn btn-warning reset-quiz"><?php echo e($quizMessageResetText); ?></button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/components/quiz-questions.blade.php ENDPATH**/ ?>