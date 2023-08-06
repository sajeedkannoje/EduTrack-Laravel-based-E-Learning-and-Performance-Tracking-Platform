<div class="content-header row mt-1 mb-1">
  <div class="content-header-left col-md-9 col-12">
    <div class="row breadcrumbs-top">
      <div class="col-12 p-0">
        <h2 class="content-header-title float-start mb-0">@yield('title')</h2>
        <div class="breadcrumb-wrapper">
          @if(@isset($breadcrumbs))
          <ol class="breadcrumb">
              {{-- this will load breadcrumbs dynamically from controller --}}
              @foreach ($breadcrumbs as $breadcrumb)
              <li class="breadcrumb-item">
                  @if(isset($breadcrumb['link']))
                  <a class="fw-bold font-medium-1" href="{{ $breadcrumb['link'] == 'javascript:void(0)' ? $breadcrumb['link']:url($breadcrumb['link']) }}">
                      @endif
                      <span class="fw-bold font-medium-1">{{$breadcrumb['name']}}</span>
                      @if(isset($breadcrumb['link']))
                  </a>
                  @endif
              </li>
              @endforeach
          </ol>
          @endisset
        </div>
      </div>
    </div>
  </div>
</div>
