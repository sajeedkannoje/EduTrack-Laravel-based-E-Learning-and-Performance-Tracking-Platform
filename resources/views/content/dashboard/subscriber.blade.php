@extends('layouts/contentLayoutMaster')

{{-- @section('title', 'Home') --}}

@section('page-style')
    {{-- <link rel="stylesheet" href="{{ asset('plugins/owl_carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl_carousel/css/owl.theme.default.min.css') }}"> --}}
@endsection

@section('content')
<div class="mt-1">
    <form data-btnload="true" id="resend-email-form" method="POST"
    action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link custom-login-link">Logout</button>
    </form>
  </div>
    
@endsection


@section('page-script')

@endsection
