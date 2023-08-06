<body class="horizontal-layout horizontal-menu {{$configData['contentLayout']}} {{$configData['horizontalMenuType']}} {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{ $configData['footerType'] }}"
data-open="hover"
data-menu="horizontal-menu"
data-col="{{$configData['showMenu'] ? $configData['contentLayout'] : '1-column' }}"
data-framework="laravel"
data-asset-path="{{ asset('/')}}">



<button class=" btn d-xl-none modern-nav-toggle m-2 position-absolute zindex-1 right" data-bs-toggle="collapse" style="right: 0%;">
  <i class="d-block d-xl-none text-primary toggle-icon font-large-2" data-feather="menu"></i>
</button>

{{-- <button class=" btn  m-2 position-absolute zindex-1 top-50 right" data-bs-toggle="">
  <i class="d-block d-xl-none text-primary  font-large-2" data-feather="settings"></i>
</button> --}}


  <!-- BEGIN: Header-->
  @include('panels.navbar')

  {{-- Include Sidebar --}}
  @if((isset($configData['showMenu']) && $configData['showMenu'] === true))
  @include('panels.horizontalMenu')
  @endif

  <!-- BEGIN: Content-->
  <div class="app-content content {{$configData['pageClass']}} site-pref-content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    @if(($configData['contentLayout']!=='default') && isset($configData['contentLayout']))
    <div class="content-area-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container-xxl p-0' : '' }}">
      <div class="{{ $configData['sidebarPositionClass'] }}">
        <div class="sidebar">
          {{-- Include Sidebar Content --}}
          @yield('content-sidebar')
        </div>
      </div>
      <div class="{{ $configData['contentsidebarClass'] }}">
        <div class="content-wrapper">
          <div class="content-body">
            {{-- Include Page Content --}}
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="content-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container-xxl p-0' : '' }}">
      {{-- Include Breadcrumb --}}
      @if($configData['pageHeader'] == true)
      {{-- @include('panels.breadcrumb') --}}
      @endif

      <div class="content-body">

        {{-- Include Page Content --}}
        @yield('content')

      </div>
    </div>
    @endif

  </div>
  <!-- End: Content-->


  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  {{-- include footer --}}
  @include('panels/footer')

  {{-- include default scripts --}}
  @include('panels/scripts')

  <script type="text/javascript">
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,height: 14
        });
      }

      let menuWidth = $('#main-menu-navigation').height();
      $('.horizontal-layout.navbar-sticky .app-content').css("padding-top", `${menuWidth+1}px`)
    })
    $(window).on('resize',() => {
      

      let menuWidth = $('.site-prefer-nav').height();
      if(typeof(menuWidth) !== 'undefine'){
        $('.horizontal-layout.navbar-sticky .app-content').css("padding-top", `${menuWidth+1}px`);
      }else{
        $('.horizontal-layout.navbar-sticky .app-content').css("padding-top", "1%");
      }
    })
  </script>
</body>

</html>
