<!-- An unexamined life is not worth living. - Socrates -->

<div 
class="side-navbar d-flex justify-content-between card text-white flex-wrap flex-column mr-2 {{ $class? $class : "" }}"
id="sidebar">
      <ul class="nav flex-column text-white">

            <li class="nav-link text-dark p-1 fw-bolder">Navigate To Modules</li>
            {{-- {{ dd($modules) }} --}}
            @foreach ($modules as $mod)
                  
                  {{-- @if($sec->checkPreviousSection())
                        <a 
                        href="{{ route('this-section',[$sec->id]) }}"
                        class="{{ $sec->id == $section->id ? "bg-primary text-white" : "text-dark" }}"
                              >
                  @endif 
                  --}}

                  
                  <li class="nav-link border p-1 fw-bold dropdown {{ $mod->id == $module->id ? "border-primary text-black" : "text-dark" }}">
                        
                        @if ($module->moduleCompletedByThisUser())
                        @endif
                        
                        <span class="">{{ $mod->title }}</span>

                        <ul class="nav p-1 ">
                              @foreach ($mod->sections as $sec)

                                    <a 
                                    href="{{ route('this-section', $sec->id) }}"
                                    class="{{ $sec->id == $section->id ? "bg-primary text-white"  : "text-dark" }}">

                                          <li class="nav-link {{ $sec->id == $section->id ? "bg-primary text-white" : "text-dark" }}">
                                                {{ $sec->title }}
                                          </li>
                                    </a>
                                                             
                              @endforeach
                        </ul>
                  </li>
                        
                  {{-- @if($sec->checkPreviousSection())
                              </a> 
                  @endif --}}

            @endforeach


      </ul>
</div>


{{-- <nav class="navbar top-navbar navbar-light bg-light px-5">
    <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
  </nav> --}}