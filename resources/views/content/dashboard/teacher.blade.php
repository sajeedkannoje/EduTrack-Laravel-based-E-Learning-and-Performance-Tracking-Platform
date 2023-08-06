
@extends('layouts/contentLayoutMaster')

{{-- @section('title', 'Dashboard') --}}

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">

    
        <div class="row w-100">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-1">
                          <form data-btnload="true" id="resend-email-form" method="POST"
                          action="{{ route('logout') }}">
                              @csrf
                              <button type="submit" class="btn btn-link custom-login-link">Logout</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</section>
<!-- Dashboard Ecommerce ends -->
@endsection


@section('page-script')
  {{-- Page js files --}}
@endsection
