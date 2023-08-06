{{-- For submenu --}}

 


<ul class="menu-content">
  @if(isset($menu))
  
  @foreach($menu->submenu as $submenu)
  @php
      $submenu = (object)$submenu;
      $submenu_classes = "";
      if(isset($submenu->classlist)) {
        $submenu_classes = $submenu->classlist;
      }
      $submenu_course_text = "";
      if(isset($submenu->textClass)){
        $submenu_course_text = $submenu->textClass;
      }
  @endphp


  <li class = "{{ $submenu_classes }} {{ $submenu->url == '/'.Request::path() ? 'active' : '' }}">
    <a href="{{isset($submenu->url) ? url($submenu->url):'javascript:void(0)'}}" class="d-flex align-items-center sub-menu-url" target="{{isset($submenu->newTab) && $submenu->newTab === true  ? '_blank':'_self'}}">
      @if(isset($submenu->icon))
      <i class="text-yellow fw-bolder font-medium-3 {{$submenu->icon}}"></i>
      @endif
      <span class="menu-item text-wrap {{ $submenu_course_text }}">{{ $submenu->name }}</span>
    </a>
    @if (isset($submenu->submenu))
    @include('panels/submenu', ['menu' => $submenu->submenu])
    @endif
  </li>
  @endforeach
  @endif
</ul>
