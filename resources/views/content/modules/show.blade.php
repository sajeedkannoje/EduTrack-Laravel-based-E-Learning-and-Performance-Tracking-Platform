{{-- @if (session()->has('message'))
    <div class="alert alert-{{ session()->pull('message.message_type') }}">
      {{ session()->pull('message.message_detail') }}
    </div>
@endif --}}
@extends('layouts/contentLayoutMaster')

@section('content')
<div class="card">
    
  <div class="card-body p-1">

    {{-- <img class="thumbnail" src="{{ $post->postImage() }}" alt="Post image" height="100%" width="100%">
    <div class="mb-2 mt-1">
      <h1 class="post-title font-large-2">{{ Str::ucfirst($post->title) }}</h1>
      <div class="text-muted">
        Created : {{ $post->created_at->diffForHumans() }}
      </div>
    </div> --}}

    <article>
      <div class="card-text post-text font-medium-3">{{ Str::ucfirst($post->description) }}</div>
    </article>

  </div>

</div>
@endsection

@section('page-script')
    <script>
        //Here you can add javascript       
        

    </script>
@endsection
