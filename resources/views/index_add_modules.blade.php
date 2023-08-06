<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <form action="{{url('AddModules')}}" method="post">
        @csrf
        <h1>Modules</h1>
        Module title : <input type="text" name="module_title" onclick="paste(this)" id="module_title"> <br> <br>
        Module intro video : <input type="text" name="module_intro_video" onclick="paste(this)"  id="module_intro_video"> <br> <br>
        Module type : <select name="module_type" id="">
            <option value="student" selected>student</option>
            <option value="teacher" >teacher</option>
        </select><br> <br>
        Module description : <textarea name="module_description" cols="150" rows="5" onclick="paste(this)" id="module_description"></textarea><br> <br>
        Module Feature : <textarea name="module_features" cols="150" rows="5" onclick="paste(this)"  id="module_features">Interactive learning materials with amazing functionality.; Opportunities to practice completing quizzes and projects.;At the end of the module, you will pass through an exam where you can calculate your grip.; </textarea><br> <br>
        Module Sequence : <input type="number" name="module_sequence"   id="module_sequence"> <br> <br>
        <hr>

        <div id="section">
            <h1>Section</h1>
            {{-- <button  type="button" id="cloneSection">Clone Section</button> --}}
            <div class="clone_section">
                Section Title : <input type="text" name="section_title[]" onclick="paste(this)"  id="section_title"> <br><br>
                Section Content : <textarea name="section_content[]" onclick="paste(this)"  cols="150" rows="5" id="section_content"></textarea> <br> <br>
                Section Sequence : <input type="number" name="section_sequence[]"  id="section_sequence"> <br> <br>
                Section Images path : <input type="text" name="section_image[]" value="picture1.jpg;picture2.jpg;picture3.jpg"  id="section_image"> <br><br> 
                <hr>
                <h1>Quiz</h1>
                Quiz Title : <input type="text" name="quiz_title[]" onclick="paste(this)"  id="quiz_title"> <br><br>
                Quiz Description : <textarea name="quiz_description[]" onclick="paste(this)"  cols="150" rows="5" id="quiz_description"></textarea><br><br>
                

            </div>
            <hr>
<div id="cloned">
    <div class="clone_questions" >
                <h1>Quiz Question</h1><br><br>
                <input type="text" id="howManyClone" style="width: 100px;height40px;  padding:10px" placeholder="enter Clone value"> <button  style="width: 100px;height40px; background:green; margin:10px;padding:15px" id="cloneMulti">Clone</button>
                <br><br>
                <div class="clone_question" style="border: 2px solid rgb(70, 63, 63); padding:5px"> <button onclick="removeQuestion(this)"> Remove</button><br>
                Question Number : <div class="question_count" style="border: 2px solid red; width: 20px;text-align:center; font-size:20px;"> <p>1</p> </div>
                Quiz Question :  <textarea class="textarea" cols="100" rows="2" onclick="paste(this)"  name="quiz_question[]" ></textarea> <br><br>
                Quiz Question Squence : <input type="number" class="number"   value="1" name="quiz_sequence[]"> <br><br>
                Quiz Question Options 1 : <input type="text" name="quiz_question_option[]" onclick="paste(this)"  id=""><input type="number" onclick="answer(this)" min="0" max="1" value="0" name="is_option_correct[]" id=""><br><br>
                Quiz Question Options 2 : <input type="text" name="quiz_question_option[]" onclick="paste(this)"  id=""><input type="number" onclick="answer(this)" min="0" max="1" value="0"   name="is_option_correct[]" id=""><br><br>
                Quiz Question Options 3 : <input type="text" name="quiz_question_option[]" onclick="paste(this)"  id=""><input type="number" onclick="answer(this)" min="0" max="1" value="0"  name="is_option_correct[]" id=""><br><br>
                Quiz Question Options 4: <input type="text" name="quiz_question_option[]" onclick="paste(this)"  id=""><input type="number" onclick="answer(this)" min="0" max="1" value="0"  name="is_option_correct[]" id=""><br><br>
                </div>
            </div>
           
</div> 
{{-- <button type="button" id="clone_question" style="width: 100px;height40px; background:green; margin:10px">Clone Questions</button>  --}}
            
        </div>
        <button style="width: 100px;height100px; background:yellow; margin:10px;padding:15px" type="submit">Submit</button>
    </form>
</body>
<script>
 var count = 1;
    // $('#clone_question').click((e)=>{
    //   e.preventDefault();
    //    var clone =  $('.clone_question:last').clone();
    //    count =  clone.find('.number').val();
    // //    console.log(typeof( count))
    // clone.find('input:text').val('');
    // clone.find('.textarea').val('');
    // count = parseInt (count) + 1;
    //    clone.find('.number').val( count);
    //    clone.find('.question_count').empty().html('<p>'+ count+ '</p>')
    //     $('#cloned').append(clone);
    //     clone =undefined;
    // });

    $('#cloneMulti').click((e)=>{
        e.preventDefault()
        var howManyClone = $('#howManyClone').val()
 var count = 1;

        for (let index = 0; index < howManyClone-1; index++) {
            
            var clone =  $('.clone_question:last').clone();
       count =  clone.find('.number').val();
    //    console.log(typeof( count))
    clone.find('input:text').val('');
    clone.find('.textarea').val('');
    count = parseInt (count) + 1;
       clone.find('.number').val( count);
       clone.find('.question_count').empty().html('<p>'+ count+ '</p>')
        $('#cloned').append(clone);
        clone =undefined;
        }


    })
function removeQuestion(X){
$(X).parent().remove();
};

async function  paste(P){
        const READ = await navigator.clipboard.readText()
        $(P).val(READ);
}
let answer= (T)=> { 
    
    if($(T).val() == 0){
        $(T).val(1);
    }else{
        $(T).val(0);

    }

};



</script>

</html>