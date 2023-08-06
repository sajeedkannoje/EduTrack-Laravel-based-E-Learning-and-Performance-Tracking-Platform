@extends('layouts/contentLayoutMaster')

{{-- @section('title', 'Modules') --}}

@section('vendor-style')
    @include('inc/datatable/styles')
    @include('inc/form/styles')
    @include('inc/select2/styles')
@endsection

@section('breadcrumb_right')
    <div class="dropdown">
        <button 
        class="btn-icon btn btn-primary rounded-circle btn-sm get-content" data-toggle="modal"
        data-target="#dynamic-modal" data-url="{{ route('module.index') }}" data-title="Create Post"
        type="button" aria-haspopup="true" aria-expanded="false">
            <i data-feather="plus"></i>
        </button>
    </div>
@endsection

@section('content')
    <section id="responsive-datatable">        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom d-none">
                        <h4 class="card-title">Modules</h4>
                        <textarea name="test" id="test1" cols="30" rows="10"></textarea>
                    </div>
                    <div class="card-datatable">
                        {{-- <nav class="row container">
                            <div class=" col-md-6 nav nav-tabs " id="nav-tab" role="tablist">
                              <a class="nav-item nav-link active text-light filter_base" id="selectedFilterBase" data-toggle="tab" data-filter="all" role="tab" aria-controls="all" aria-selected="true">All</a>
        
                              @foreach (config('setting.post_status') as $status=>$value)
                                <a class="nav-item nav-link filter_base text-light" data-toggle="tab" role="tab" data-filter="{{ $status }}" aria-controls="nav-{{ $value }}" aria-selected="true">
                                    {{ Str::ucfirst($value) }}
                                </a>
                              @endforeach
        
                              <a class="nav-item nav-link filter_base text-light" data-toggle="tab" data-filter="trash" role="tab" aria-controls="nav-trash" aria-selected="false">Trash</a>

                            </div>
                        </nav> --}}
                        <table id="datatable" class="dt-responsive table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    {{-- <th>Description</th>                                     --}}
                                    <th>Module Type</th>
                                    <th>Introductio Video</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    @include('inc/datatable/scripts')
    @include('inc/form/scripts')
    @include('inc/sweet-alert/scripts')
    @include('inc/select2/scripts')
    @include('inc.ckeditor.script')
    
@endsection

@section('page-script')
    <script>
        // CKEDITOR.replace( 'test1' );
        var datatable = $('#datatable').DataTable({
            ajax: {
                url: "{{ route('module.index') }}",
                data: function(d) {
                    // d.filter_base = $('#selectedFilterBase').data('filter');
                    // d.keyword_type = $('#keyword_type').val();
                },
                error: function(data) {
                    let json = data.responseJSON;
                    if(data.status == 401) {
                        setAlert({
                            code: "error",
                            title: "Oops!",
                            message: "Unauthenticated.",
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        setAlert({
                            code: "error",
                            title: "Oops!",
                            message: "Something went wrong.",
                        });
                    }
                    console.warn(json.message);
                },   
            },
            columns: [
                { data : 'title' },
                // { 
                //     data: 'description',
                //     render: function ( data, type, row ) {
                //         return data.substr( 0, 20 )+"...";
                //     }
                // },
                {data : 'module_type'},
                {data : 'introVideo'},
                { data: 'action' }
            ],
            drawCallback: function() {
                $("*[data-toggle='tooltip']").tooltip();
            },
            "order": [
                [3, "desc"]
            ],
        });

        // $("body").on("click",".filter_base",function(e){
        //     $('#selectedFilterBase').removeAttr('id');
        //     $(this).attr('id','selectedFilterBase');
        //     datatable.draw();
        // })

        // function keywordPosts(){
        //     // alert("youe are right");
        //     // console.log($('#keyword_type').val())
        //     datatable.draw()
        // }
        // Delete Post
        // $("body").on("click", ".delete-post", function(e) {
        //     let btn = $(this);

        //     confirm({
        //         confirmButtonText: btn.data("title"),
        //         text: ""
        //     }, {
        //         yes: function() {
        //             submitAjax({
        //                 type: "DELETE",
        //                 url: btn.data('url'),
        //                 dataType: "json",
        //             }, {
        //                 submitBtn: btn
        //             });
        //         }
        //     });
        // });

        // Restore trashed Post
        // $("body").on("click", ".restore-post", function(e) {
        //     let btn = $(this);

        //     confirm({
        //         confirmButtonText: btn.data("title"),
        //         text: ""
        //     }, {
        //         yes: function() {
        //             submitAjax({
        //                 type: "GET",
        //                 url: btn.data('url'),
        //                 dataType: "json",
        //             }, {
        //                 submitBtn: btn
        //             });
        //         }
        //     });
        // });


        function dynamicScript() {
            $("#keywords").select2();
            let formValidator = $("#form").validate({
                rules:{
                    title:{
                        required:true,
                        minlength:3,
                        maxlength:60
                    },
                    description:{
                        required:true,
                        minlength:20
                    },
                    keywords:{
                        required:true,
                    }
                },
                message:{}
            });
            submitForm($("#form"), {
                formValidator: formValidator,
                submitBtn: "#submit",
            });
            
        }

    </script>
@endsection
