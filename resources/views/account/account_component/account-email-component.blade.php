<form id="change-email-form" method="post" action="{{ route('changeMyEmail') }}">
    @csrf
    <div class="row">
        <div class="col-12 mb-75">
            <strong>Current Email Address:</strong> 
            {{ auth()->user()->email }} 
            {!! auth()->user()->hasVerifiedEmail() ? '<span class="badge rounded-pill bg-success">Verified</span>' : '<span class="badge rounded-pill bg-danger">Not Verified</span>' !!}
        </div>
        <div class="col-12 col-sm-6 change-email-column">
            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" class="form-control" id="email" name="email"
                    placeholder="Email" value="" />
            </div>
        </div>
        <div class="col-12 col-sm-6 change-email-column">
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
<script>
        $(".resend-email-verification").click(function() { 
                $("#resend-email-form").submit();
                
            });
    </script>