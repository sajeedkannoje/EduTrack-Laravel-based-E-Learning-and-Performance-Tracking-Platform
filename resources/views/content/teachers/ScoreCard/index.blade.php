@extends('layouts/contentLayoutMaster')

@section('title', 'Manage Scorecards')

@section('vendor-style')
@endsection
@section('page-style')

    {{-- @include('course-sidebar.sidebarStyle') --}}


@endsection

@section('content')
<style>

    label.fw-bold.text-black.mb-1 {
        font-size: 18px;
        color: #228b22 !important;
        font-weight: bold !important;
    }

    button#download-records {
        max-width: 120px;
        width: 100%;
    }

    .manage-score-card-table-container {
        overflow-X: auto;
    }
    .referral-heading {
    box-shadow: grey 0px 7px 5px -6px;
    padding: 0.71rem 1rem;
}

    .referral-code-container {
      width: auto !important;
      text-align:center;
    }
    .referral-code-container.card {
        padding:0px;
    }
    .referral-code-copy {
    width: 30%;
    margin: 0 auto;
    margin-top: 20px;
    }
    .referral-text {
    padding: 20px;
}
    .teacher-refferal-container {
      padding-left: 20px;
    }
    .referral-code-container i {
      position: absolute;
      right: -25%;
      top: -8px;
      background-color: transparent;
      box-shadow: none;
    }
    .referral-code-container i:active {
      box-shadow: none;
    }
    .referral-code-container i img {
      width:55px;
    }
    .referral-code-container .referral-call {
      position: absolute;
      left: 116%;
      top: 0px;
      width: 100%;
    }
    #copyMaker.hiddenput {
      cursor: pointer;
    }
     .tooltip-label {
       position: relative;
     }
     .referral-code-container .referral-call, .referral-code-container .referral-call:hover, .referral-code-container .referral-call:active, .referral-code-container .referral-call:hover {
       background-image: none;
       background-color: white !important;
       color: forestgreen !important;
       border: 1px solid forestgreen !important;
     }
     .referral-code-container .referral-call {
   position: absolute;
   left: 125%;
   top: -10px;
   width: 100%;
}
.referral-code-container .referral-call::before {
 width: 0px;
height: 0px;
content: '';
border-top: 10px solid transparent;
border-bottom: 10px solid transparent;
border-right: 10px solid forestgreen;
position: absolute;
top: 12px;
left: -10px;
}
.referral-code-container .referral-call::after {
 width: 0px;
height: 0px;
content: '';
border-top: 9px solid transparent;
border-bottom: 9px solid transparent;
border-right: 9px solid white;
position: absolute;
top: 13px;
left: -9px;
}

     @media only screen and (max-width:1580px){
       .referral-code-container {
          width: 30%;
      }
     }

    @media only screen and (max-width:1540px) {
        label.fw-bold.text-black.mb-1 {
            font-size: 16px;
        }
        .referral-code-container i {
          top: -10px;
        }
    }


    @media only screen and (max-width:1440px) {
        .referral-code-container {
            width: 30%;
        }
    }


    @media only screen and (max-width:1380px){
        #user_infomation_card .float-end.form-group.d-flex {
                width: 40%;
        }
    }


    @media only screen and (max-width:1240px) {
        .referral-code-container {
            width: 35%;
        }
    }


    @media only screen and (max-width:990px){
        .manage-scorecard-container {
            margin: 40px 20px 0px 20px;
        }
    }


    @media only screen and (max-width:940px){
        .manage-scorecard-table-container {
            overflow-X: auto;
        }
        #user_infomation_card .float-end.form-group.d-flex {
            width: 50%;
        }
    }

    @media only screen and (max-width:890px){
        .referral-code-container {
            width: 40%;
        }
    }


    @media only screen and (max-width:767px){
        .manage-scorecard-container {
            margin: 0px;
        }
        .referral-code-container {
            width: 100%;
        }
        .referral-code-container input {
            width: 70%;
        }
        .referral-code-container {
            width: 100% !important;
        }
        .referral-code-container.card {
            margin-bottom:30px;
        }
    }


    @media only screen and (max-width:580px){
        #user_infomation_card .float-end.form-group.d-flex {
            width: 80%;
        }
        .referral-code-container .referral-call {
    position: absolute;
    left: 25%;
    top: 35px;
    width: 100%;
}
.referral-code-container .referral-call::before {
  border-left: 10px solid transparent;
    border-bottom: 10px solid forestgreen;
    border-right: 10px solid transparent;
    border-top: 0px;
    top: -10px;
    left: 83%;
}
.referral-code-container .referral-call::after {
    width: 0px;
    height: 0px;
    content: '';
    border-top: 0px;
    border-left: 9px solid transparent;
    border-bottom: 9px solid white;
    border-right: 9px solid transparent;
    position: absolute;
    top: -9px;
    left: 83.3%;
}
    }


    @media only screen and (max-width:500px){
        #user_infomation_card .float-end.form-group.d-flex {
            width: 100%;
        }


        .referral-code-container input {
            padding-top:5px;
            padding-bottom: 5px;
            font-size: 14px !important;
        }

        .scorecard-card-details-header {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .scorecard-card-details-content {
            padding-left: 0px;
            padding-right: 0px;
        }

        .manage-scorecard-container {
            padding: 20px;
        }

    }


    @media only screen and (max-width:400px) {
        #user_infomation_card .float-end.form-group.d-flex {
            width: 100%;
            flex-direction: column;
          }

        button#download-records {
            margin-left: 0px !important;
            margin-top: 10px;
        }

    }
    .pagination-container nav div{
            margin-top: 10px;
        }
        .pagination-container nav div .relative {
            padding: 10px 20px !important;
        }

</style>
    <section class="main-content">
    <div class="col-3 referral-code-container card">

<label for="student-email" class="fw-bold text-black mb-1 tooltip-label referral-heading">Referral Code
  <!-- <img src="{{asset('images/teachers/homepage/new-icon.png')}}" class="btn btn-sm info-icon-fixed referral-tool-tip">

  <div class="referral-call bg-gradient-primary text-white zindex-4 d-none fw-bold text-primary p-1 rounded-3">
    You can share this referral code with your students. They can enter this code on their dashboard to get connected with your account and allow you to access their scorecard.
  </div> -->
</label>
<input class="hiddenput referral-code-copy form-control text-black fw-bold text-center font-medium-4" value="{{Auth::user()->referral_code}}" onclick="copyText(this);"  readonly id="copyMaker"/>
<p class="copy-to-clipboard referral-text"> <span style="color:forestgreen; font-weight: bold">Note:</span> Provide your students with the referral code given above if you would like to keep track of their scores. Click the box given above to copy the code to your clipboard. Once you’ve copied the code to your clipboard one of the links on the navigation bar to your left will be “Manage Scorecard.” This is where you are able to see a spreadsheet and monitor your student’s progress (as long as they key in the referral code when they create an account).</p>
</div>

        <div class="card manage-scorecard-container">
            @if (Auth::user()->hasRole('teacher'))
            <div class="form-group row">
                {{-- <div class="col-4">
                    <button class="btn btn-primary mt-2" id="aText" onclick="copyText(this);" >Copy Referral code</button>
                </div> --}}
            </div>
            @endif
            <div class="card-header border-bottom-2 border-bottom-black d-inline scorecard-card-details-header">
                <span class="font-medium-2 text-black fw-bold">Student Score Card</span>
                <div class=" float-lg-end font-medium-2 text-black fw-bold">
                    {{-- {{dd($students)}} --}}
                    Total Students : {{ $students->count() }}
                </div>
            </div>

            <div class="card-body mt-1 scorecard-card-details-content">
                <div class="row">

                    {{-- <div class="col-md-8" id="user_infomation_card">
                    </div> --}}
                </div>

                <div class="row" id="user_infomation_card">
                    @if ($students->count())
                        <div class="">
                            <div class="float-start">
                                Showing {{($studentRecord['paginate']->currentPage()-1)* $studentRecord['paginate']->perPage()+($studentRecord['paginate']->total() ? 1:0)}} to {{($studentRecord['paginate']->currentPage()-1)*$studentRecord['paginate']->perPage()+count($studentRecord['paginate'])}}  of  {{$studentRecord['paginate']->total()}}  Results
                            </div>
                        <div class="float-end form-group col-md-4 d-flex">
                            <select name="file_format" id="file-format" class="form-select text-black fw-bold">
                                <option value="" class="fw-bold text-black">Select File Format</option>
                                @foreach (config('setting.file_format') as $key => $format)
                                    <option value="{{ $key }}" class="fw-bold text-black">{{ $format }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary ms-1 download-file-format"  id="download-records" >Download</button>
                        </div>

                    </div>
                    <div class="manage-scorecard-table-container">
                    <table class="table table-bordered text-black fw-bold mt-2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>% Correct</th>
                                <th>Modules Completed</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                               $count = $studentRecord['paginate']->firstItem();
                           @endphp

                     @foreach ($studentRecord['record'] as $item)


                        @if (!$item['error'])
                        <tr>
                            <td>
                                {{$count}}
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
                            @php
                                $count++
                            @endphp

                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="row pagination-container">
                            {{ $studentRecord['paginate']->links() }}
                    </div>
                    @else
                    <div class="card">
                        <div class="card-body">
                            <h1><span>Oops!</span> Sorry we couldn’t find any Students</h1>
                        </div>
                    </div>

                    @endif


                </div>
            </div>

        </div>


    </section>

@endsection

@section('vendor-script')
    {{-- vendor files --}}

@endsection

@section('page-script')

    {{-- @include('course-sidebar.sidebarScript') --}}

    <script>



        $('.add-more-email-row').click((e) => {
            e.preventDefault();
            let html = document.querySelector('.email-password-row');
            $('.email-password-container').append(`<div class='appended-email-row'>${html.innerHTML}<button class="btn btn-danger btn-sm mt-25 remove-this-row" tabindex="-1">Remove</button><div>`);
            addRowRemoveCode();
        })

        const addRowRemoveCode = () => {
            $('.remove-this-row').click((e) => {
                e.preventDefault();
                $(e.target).closest('.appended-email-row').remove();
            })
        }



        $('#submit_score_card_form').click((e) => {
            e.preventDefault();
            if($('.error-logs').length){
                $('.error-logs').remove()
            }
            if(!$('#student-email').val()){
                $('#student-email').closest('div').append(`<div class="error-logs alert alert-danger">Please enter Email</div>`)
                return false;
            }

            let formData = $('#score-card-form').serialize();
            $.ajax({
                url : "{{ route('teacher.student_score') }}",
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend : () => {
                    submitLoader(e.target)
                },
                success : (res) => {

                    if(res.status == 'userNotFound'){

                        setAlert({
                            code: "warning",
                            title: "Alert!",
                            message: res.message,
                        });
                        submitReset(e.target)
                        return false;
                    }

                    $('#user_infomation_card').html(res.html);
                    submitReset(e.target);


                },
                error : (err) => {
                    console.error(err);
                },
                complete : () => {
                    submitReset(e.target)
                }
            })
        })

        function copyText(text) {
        // Identify hidden field
        var hiddenPut = $('#copyMaker');
        // // Selects hidden field's contents
        hiddenPut.select();
        // // Copy
        document.execCommand('copy');
        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": false,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": true,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            };
        toastr["success"]( "Referral code copied!","Copied")

        }

        $('#download-records').click((e) => {
                e.preventDefault();

            var url = "";
            let type = $("#file-format :selected").val();

            if(type == ""){
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    toastr["warning"]("Please Select File Format", "Warning")
                $('#file-format').css("border","1px solid red")
                // alert('select file format');
            }else if(type == "pdf"){
                $('#file-format').css("border","")
                submitLoader(e.target)
                window.location.href ="{{route('download-pdf')}}"
                submitReset(e.target);
            }else{
                $('#file-format').css("border","")

                var formData = $('#copyMaker').val();
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
                beforeSend : () => {
                    submitLoader(e.target)
                },
                    success : (res) => {
                        submitReset(e.target);
                        var a = document.createElement('a');
                        // console.log(res.type);
                      var url = window.URL.createObjectURL(res);
                            a.href = url;
                            if(res.type == 'text/plain'){
                                a.download = 'StudentsPerformance.csv';
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
            $('.referral-tool-tip').click((e) => {
                e.preventDefault();
                $('.referral-call').toggleClass('d-none');
          })
    </script>
@endsection
