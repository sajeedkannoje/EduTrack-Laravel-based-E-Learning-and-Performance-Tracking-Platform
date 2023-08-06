@if (count($notFoundedEmails))
<div class="row m-2">
    <div class="col-md-6">
        <div class="h4">Emails That are not recognised as Student.</div>
        @foreach ($notFoundedEmails as $email)
            <div class="text-black fw-bold">
                {{ __(($loop->index+1).". ".$email) }}
            </div>
            
        @endforeach
        
        <button 
            class="btn btn-danger mt-1" 
            onclick="(()=>{
                event.preventDefault();
                $('.not-found-email-rows').remove();
                $(this).parent().prepend(`<div class='alert alert-success p-25 text-center'>Below Eamils are excluded successfully.</div>`);
                $(this).remove();
            })()">
            Exclude These Emails.
        </button>
    </div>
    
</div>    
@endif


<div class="">
    <div class="float-end form-group col-md-4 d-flex">
        <select name="file-format" id="file-format" class="form-select text-black fw-bold">
            <option value="" class="fw-bold text-black">Select File Format</option>
            @foreach (config('setting.file_format') as $key => $format)
                <option value="{{ $key }}" class="fw-bold text-black">{{ $format }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary ms-1 download-file-format"  id="download-records" >Download</button>
    </div>
    
</div>

<table class="table table-bordered text-black fw-bold mt-2">
    <thead>
        <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>% Correct</th>
            <th>Modules Completed</th>
        </tr>
    </thead>    
    <tbody>
@foreach ($inforamation as $item)
    
    @if (!$item['error'])
    <tr>
        <td>
            {{ $item['email'] }}
        </td>
        <td>
            {{ $item['first_name'] }}
        </td>
        <td>
            {{ $item['last_name'] }}
        </td>
        <td>
            {{ $item['percentage'] }}
        </td>
        <td>
            {{ $item['completedModule'] }}
        </td>    
    </tr>
    @endif
        
    @if ($item['error'])
    <tr class="not-found-email-rows">
        <td>
            {{ $item['email'] }}
        </td>

        
        <td colspan="5" class="alert alert-danger">
            {{ $item['message'] }}
        </td>
    </tr>        
    @endif
        
    
@endforeach
    </tbody>
</table>

<script>

    $('#download-records').click((e) => {
                e.preventDefault();
            var url = "";
            let type = $("#file-format :selected").val();
    
            if(type == ""){
                alert('slect file formate');
            }else{
        
                var formData = $('#score-card-form').serialize();
                $.ajax({
                    url : "{{url('export_student_record')}}",
                    type: "POST",
                    data:formData + "&type="+type,
                    xhrFields: {
                    responseType: 'blob'
                },
                   
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success : (res) => {
                        var a = document.createElement('a');
                        console.log(res.type);
                      var url = window.URL.createObjectURL(res);
                            a.href = url;
                            if(res.type == 'application/pdf'){
                                a.download = 'StudentData.pdf';
                            }else if(res.type == 'text/plain'){
                                a.download = 'StudentData.csv';
                            }
                            document.body.append(a);
                            a.click();
                            a.remove();
                            window.URL.revokeObjectURL(url);
    
                    },
                    error : (err) => {
                        console.log(res);
                    },
                  
                })
             }
     
        
               
            })
    
    </script>