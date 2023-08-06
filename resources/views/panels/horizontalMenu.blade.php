@php
$configData = Helper::applClasses();
@endphp

<style>
.site-prefer-nav {
    top: 0% !important;
}

@media only screen and (max-width: 1100px) {
    .open svg {
        color: #228b22 !important;
    }

    .open span {
        color: #228b22 !important;
    }
}
</style>

{{-- Horizontal Menu --}}
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal
  {{$configData['horizontalMenuClass']}}
  {{($configData['theme'] === 'dark') ? 'navbar-dark' : 'navbar-light' }}
  navbar-shadow menu-border
  site-prefer-nav
  {{ ($configData['layoutWidth'] === 'boxed' && $configData['horizontalMenuType']  === 'navbar-floating') ? 'container-xxl' : '' }}"
        role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">

            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="nav-item me-auto p-75">
                    <a class="navbar-brand p-lg-0" href="{{ route('dashboard') }}">
                        <span class="brand-logo">

                            <img src="{{ asset('images/logo/logo.png') }}" alt="Website Logo" width="70px"
                                height="70px">
                        </span>
                        {{-- <div class="brand-text text-bold h6">
              @include('inc.final-logo')
            </div> --}}

                    </a>
                </li>

                {{-- <li class="nav-item nav-toggle">
          <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
            <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          </a>
        </li> --}}

                {{-- Foreach menu item starts --}}
                @if(isset($menuData[1]))
                @foreach($menuData[1]->menu as $menu)
                @php
                $menu = (object)$menu;
                $custom_classes = "";
                if(isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
                }

                $ActiveClass = Route::currentRouteName() === $menu->slug ? 'active' : '';
                $canAdd = $ActiveClass ? 'text-white' : "text-black" ;

                @endphp
                {{-- {{ dd(Route::currentRouteName()) }} --}}
                <li class="nav-item fw-bold py-lg-2 @if(isset($menu->submenu)){{'dropdown'}}@endif {{ $custom_classes }} {{ $ActiveClass }}"
                    @if(isset($menu->submenu)){{'data-menu=dropdown'}}@endif>
                    <a href="{{isset($menu->url)? url($menu->url):'javascript:void(0)'}}"
                        class="nav-link d-flex align-items-center @if(isset($menu->submenu)){{'dropdown-toggle'}}@endif"
                        target="{{isset($menu->newTab) ? '_blank':'_self'}}"
                        @if(isset($menu->submenu)){{'data-bs-toggle=dropdown'}}@endif>
                        <i data-feather="{{ $menu->icon }}" class="fw-bolder {{ $canAdd }}"></i>
                        <span class="{{ $canAdd }} fw-bolder">{{ $menu->name }}</span>
                    </a>
                    @if(isset($menu->submenu))
                    @include('panels/horizontalSubmenu', ['menu' => $menu->submenu])
                    @endif
                </li>
                @endforeach
                @endif
                {{-- Foreach menu item ends --}}
                <li class="nav-item py-lg-50">
                    <a class="nav-link d-flex align-items-center p-lg-0" id="dropdown-user" href="javascript:void(0);"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <div class="user-nav d-lg-block">
                            <span class="fw-bolder text-black">
                                {{ auth()->user()->fullName() }}


                            </span>

                            <span class="avatar">

                                <img class="round " src="{{ auth()->user()->profileImage() }}" alt="avatar"
                                    height="70px" width="70px">

                            </span>
                        </div>

                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                        <a class="dropdown-item fw-bolder text-black" href="{{ route('account.index') }}">
                            <i class="me-50" data-feather="user"></i> Profile
                        </a>



                        <form class="d-none" id="main-logout-form" data-btnload="true" method="POST"
                            action="{{ route('logout') }}">
                            @csrf
                        </form>
                        <a class="dropdown-item fw-bolder text-black" href="logut-me" onclick="event.preventDefault();
            document.getElementById('main-logout-form').submit();">
                            <i class="me-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li>

            </ul>

        </div>
    </div>
</div>