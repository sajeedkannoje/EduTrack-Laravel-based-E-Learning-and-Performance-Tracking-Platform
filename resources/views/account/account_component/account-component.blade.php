<div class="account-wrapper d-flex">


    <!-- right content section -->
    <div class="right-content-card-section-container">
        <div class="card account_card_container">
            <div class="card-body account-card-body">
            @php
                $isReferralExist ='';
            @endphp

            @if(!Auth::user()->referred_by)
                @php
                    $isReferralExist=false;
                @endphp
            @else
                @php
                    $isReferralExist=true;
                @endphp
            @endif



            {{-- @if(!Auth::user()->referred_by)
            <div class="" id="add-referral-code" >
                <!-- form -->

             </div>
            @else
                @php
                $isActive ='active';
                @endphp
            @endif --}}
                <div class="tab-content">
                      <!-- add referral -->
                      @if (!$isReferralExist && !Auth::user()->hasRole('teacher'))
                        <div class="tab-pane active" id="addReferralCode" role="tabpanel"
                            aria-labelledby="referral-code-pill" aria-expanded="false">
                            <!-- form -->
                            <form id="add-referral-form" method="post" action="{{ route('addReferralCode') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-12 col-sm-6 referral_form_input_container">
                                        <div class="form-group">
                                            <label for="Referral">Referral</label>
                                            <input required type="text"class="form-control" id="referral" name="referral"
                                                placeholder="Referral" value="" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button id="add-referral-submit" type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                      @endif
                </div>
                    <!-- general tab -->
                    {{-- {{dd(!Auth::user()->hasRole('teacher'),$isReferralExist )}} --}}

                    <div role="tabpanel" class="tab-pane  @if($isReferralExist || Auth::user()->hasRole('teacher') )active @else fade d-none @endif" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                        @if(session()->has('resent'))
                            <div class="row">
                                <div class="col-12 mb-75 ">
                                    <div class="alert alert-success mb-50" role="alert">
                                        <h4 class="alert-heading">A fresh verification link has been sent to your email address.</h4>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <!-- header media -->

                        <div class="media d-grid justify-content-center change-photo-container">
                            <div id="user_image" href="javascript:void(0);" class="mr-25 d-flex justify-content-center mb-2">
                                <img src="{{ auth()->user()->profileImage() }}"
                                     class="rounded-circle mr-50" alt="profile image" height="80"
                                    width="80" />

                                <!-- upload and reset button -->
                                <div class="media-body mt-75 ml-1 change-photo-btn-container">
                                    <input type="file" name="profile" class="d-none" accept="image/*" id="profile">
                                    <button type="button" class="btn btn-icon text-center" data-bs-toggle="modal" id="change-photo" data-bs-target="#modal_change_photo">
                                        <i class="fi-br-camera"></i>
                                    </button>
                                </div>
                            </div>

                            @include('inc.modal.crop_image', [
                                'crop_url' => route('crop_image', 'web'),
                                'upload_url' => route('upload_image', 'web'),
                            ])
                            <!--/ upload and reset button -->
                        </div>

                        <!-- form -->

                        <form action="{{ route('updateBasicInfo') }}" id="basic-info-form" method="post" class=" mt-2">
                            @csrf

                            <div class="row">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="account-name">First Name</label>
                                        <input required type="text" class="form-control" id="account-name" name="name"
                                            placeholder="name" value="{{ auth()->user()->name }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="account-last_name">Last Name</label>
                                        <input required type="text" class="form-control" id="account-last_name" name="last_name"
                                            placeholder="Last Name" value="{{ auth()->user()->last_name }}" />
                                    </div>
                                </div>
                            </div>
                                {{-- @if(auth()->user()->hasRole('subscriber'))
                                <div class="col-12 col-sm-6">
                                    <div class="custom-control custom-control-primary custom-switch">
                                        <label class="mb-50">Notifications {!! Helper::tooltipInfo("Would you like to receive email notifications of upcoming events?") !!}</label>
                                        <div>
                                            <input {{ auth()->user()->notificationEnabled() ? 'checked' : '' }} name="email_notification" type="checkbox" class="custom-control-input" id="customSwitch3">
                                            <label class="custom-control-label" for="customSwitch3">
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                @endif --}}
                                <div class="col-12 d-flex justify-content-center mt-2">
                                    <button id="basic-info-btn" type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                </div>

                        </form>
                        <!--/ form -->
                    </div>
                    <!--/ general tab -->

                    <!-- change password -->
                    <div class="tab-pane fade d-none" id="account-vertical-password" role="tabpanel"
                        aria-labelledby="account-pill-password" aria-expanded="false">
                        <!-- form -->

                        <form action="{{ route("changePassword") }}" method="post" id="change-password-form">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input required type="password" class="form-control"
                                                id="current_password" name="current_password"
                                                placeholder="Current Password" />
                                            <div class="input-group-append account-append">
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye" class="account-eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input required type="password" id="password"
                                                name="password" class="form-control"
                                                placeholder="New Password" />
                                            <div class="input-group-append account-append">
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye" class="account-eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="password-confirmation">Retype New Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" class="form-control"
                                                id="password-confirmation" name="password_confirmation"
                                                placeholder="New Password" />
                                            <div class="input-group-append account-append">
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye" class="account-eye"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button id="change-password-submit" type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                                </div>
                            </div>
                        </form>
                        <!--/ form -->
                    </div>
                    <!--/ change password -->

                    <div class="tab-pane fade d-none" id="account-vertical-email" role="tabpanel"
                        aria-labelledby="account-pill-email" aria-expanded="false">
                        <!-- form -->

                        <form id="change-email-form" method="post" action="{{ route('changeMyEmail') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-75">
                                    <strong>Current Email Address:</strong>
                                    {{ auth()->user()->email }}
                                    {!! auth()->user()->hasVerifiedEmail() ? '<span class="badge rounded-pill bg-success">Verified</span>' : '<span class="badge rounded-pill bg-danger">Not Verified</span>' !!}
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input required type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" value="" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="email-confirmation">Retype New Email</label>
                                        <input  type="email" class="form-control" id="email-confirmation"
                                            name="email_confirmation" placeholder="Retype New Email" value="" />
                                    </div>
                                </div>
                                @if(!auth()->user()->hasVerifiedEmail())
                                    <div class="col-12 mt-75">
                                        <div class="alert alert-warning mb-50" role="alert">
                                            <h4 class="alert-heading">Your email is not verified. please check your email for a verification link.</h4>
                                            <div class="alert-body">
                                                <a href="javascript: void(0);" class="alert-link resend-email-verification">Resend
                                                    confirmation</a>
                                                <form id="resend-email-form" class="d-none" method="POST" action="{{ route('verification.resend') }}">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <button id="change-email-submit" type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                                </div>
                            </div>
                        </form>
                        <form id="resend-email-form" class="d-none" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                        </form>
                        <!--/ form -->
                    </div>



                    <!--/ change email -->
                    <ul class="nav nav-pills flex-column nav-left pass-page">
                    @if (!$isReferralExist && !Auth::user()->hasRole('teacher'))

                    <!-- referral -->
                    <li class="nav-item">
                        <a class="nav-link menu-travel active" id="referral-pill" data-toggle="pill" href="#addReferralCode"
                            aria-expanded="false">
                            <i data-feather="lock" class="font-medium-3 mr-1"></i>
                            <span class="font-weight-bold">Referral</span>
                        </a>
                    </li>
                    @endif
           <!-- general -->
           <li class="nav-item">
                <a class="nav-link menu-travel  @if($isReferralExist  || Auth::user()->hasRole('teacher') )active @endif" id="account-pill-general" data-toggle="pill"
                    href="#account-vertical-general" aria-expanded="true">
                    <i data-feather="user" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">General</span>
                </a>
            </li>
            <!-- change password -->
            <li class="nav-item">
                <a class="nav-link menu-travel" id="account-pill-password" data-toggle="pill" href="#account-vertical-password"
                    aria-expanded="false">
                    <i data-feather="lock" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Change Password</span>
                </a>
            </li>
            <!-- change passemailword -->
            <li class="nav-item">
                <a class="nav-link menu-travel" id="account-pill-email" data-toggle="pill" href="#account-vertical-email"
                    aria-expanded="false">
                    <i data-feather="mail" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Change Email</span>
                </a>
            </li>
        </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/ right content section -->
</div>
