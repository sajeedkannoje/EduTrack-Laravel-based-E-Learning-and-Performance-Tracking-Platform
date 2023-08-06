<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit module</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.32.0/codemirror.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.32.0/codemirror.min.css" />
</head>
<body>

    <form action="{{Route('saveModule')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$module->id}}">
        @if (Session::get('success'))
        <span style="background: green; color:white">{{Session::get('success')}}</span>
        <br>
        @endif
       
        <h1>Title :: {{$module->title}}</h1>
       
        <textarea name="content" id="content" cols="150" rows="30">{!! $module->features !!}</textarea>
        <br>
        <button type="submit" style="width: 100px; height:50px; background:red;color:white">Save</button>
    </form>
    <script type="text/javascript">
        window.onload = function() {
          var myTextarea = document.getElementById("content");

         
          editor = CodeMirror.fromTextArea(myTextarea, {
            lineNumbers: true
          });
     
          editor.setSize(1200, 600);
        };
      </script>
</body>
</html>