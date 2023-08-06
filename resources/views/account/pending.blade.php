@extends('layouts/fullLayoutMaster')

@section('title', 'Setup Account')


@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Login v1 -->
            <div class="card mb-0">
                <div class="card-body text-center">
                    <a href="javascript:void(0);" class="brand-logo">
                        @include('inc/logo-text', [
                        'class' => 'h2'
                        ])
                    </a>

                    <div id="subscription-button" class="d-none">
                        
                    </div>
                    @if(session()->has('resent'))
                        <div class="row">
                            <div class="col-12 mb-75">
                                <div class="alert alert-success mb-50" role="alert">
                                    <h4 class="alert-heading">A fresh verification link has been sent to your email address.</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(!auth()->user()->hasVerifiedEmail())
                        <div class="col-12 mt-75 text-center">
                                <h4 class='text-center'>Please verify your email</h4>
                                <p>You're almost there! We sent an email to<br><strong>{{ auth()->user()->email }}</strong></p>
                                <p>
                                    Just click on the link in that email to verify your account. If you don't see it, you may need to <strong>check your spam</strong> folder.
                                </p>
                                <p>
                                    Still can't find the email?
                                </p>
                                <div class="alert-body">
                                    <button href="javascript: void(0);" class="resend-email-verification btn btn-primary">
                                        Resend confirmation
                                    </button>
                                    <form id="resend-email-form" class="d-none" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                    @else
                        @if(auth()->user()->profile_status == null)
                            <h4 class="text-center">Thanks for submitting.</h4>
                            <p>We are reviewing your profile, you will be notified when your profile is approved or declined.</p>
                        @endif
                        @if(auth()->user()->profile_status == 'decline')
                            <h4>Your Profile is Declined</h4>
                        @endif
                        @if(auth()->user()->profile_status == 'approved')
                            <h4>Your Profile is Approved</h4>
                        @endif
                    @endif
                    <div>
                        <p>Need help? <a href="{{ config('setting.contact_url') }}">Contact us</a></p>
                    </div>
                    <div class="mt-1">
                        <a onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="javascript: void(0);">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('page-script')

    <script>
        $(document).ready(function() {

            //  Resend email
            $(".resend-email-verification").click(function() { 
                submitLoader($(this));
                $("#resend-email-form").submit();
            });
        });

        

    </script>
@endsection
