
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">

    <div class="mt-1">
      <form data-btnload="true" id="resend-email-form" method="POST"
      action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-link custom-login-link">Logout</button>
      </form>
    </div>
  </div>
</section>
 {{-- Dashboard Ecommerce ends  --}}
@endsection


@section('page-script')
  
@endsection
