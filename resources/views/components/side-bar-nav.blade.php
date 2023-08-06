<!-- An unexamined life is not worth living. - Socrates -->

<div 
class="side-navbar d-flex justify-content-between card text-white flex-wrap flex-column mr-2 {{ $class? $class : "" }}"
id="sidebar">
      <ul class="nav flex-column text-white">

            <li class="nav-link text-dark p-0 py-50 px-1 fw-bolder d-flex justify-content-between">
                  Navigate To Modules
                  
                  <button class="btn btn-sm p-0 d-none"  id="small-open-menu-closer">
                        <i data-feather='x' class="font-large-1 text-danger"></i>
                  </button>
                  
                  

            </li>
            @foreach ($modules as $mod)
                  
                  <li class="nav-link p-1 pt-0 pb-50 fw-bold dropdown text-black">


                        @if ($mod->checkPreviousModule())
                              <div 
                              class="{{ $mod->id == $module->id && $page == "module" ? "bg-primary px-25 text-white py-25" : "text-black" }}"> 
                                    <a 
                                    href="{{ route('my-courses',$mod->id) }}"
                                    >
                                          <span 
                                          class="font-medium-1 {{ $mod->id == $module->id && $page == "module" ? "text-white" : "text-black" }} cursor-pointer">
                                                {{ $mod->title }}
                                          </span>
                                    </a>
                              </div>
                        @else
                        <span 
                        class="font-medium-1 text-black cursor-pointer">
                              {{ $mod->title }} 
                              <i data-feather='lock' class="text-danger"></i>
                        </span>
                        @endif


                              <ul class="px-1 cursor-pointer list-style-icons">
                              @foreach ($mod->sections as $sec)
                                    
                                    <li class="nav-link px-25 py-25 ">
                                          
                                          @if ($sec->checkPreviousSection())
                                                <div class="{{ $sec->id == $section->id && $page=="section" ? "bg-primary px-25 text-white py-25" : "text-black" }}"> 
                                                      <a 
                                                      href="{{ route('this-section',$sec->id) }}"
                                                      ><span class="font-small-3 {{ $sec->id == $section->id && $page=="section" ? "text-white" : "text-black" }}">{{ $sec->title }}</span>
                                                      </a>
                                                </div>
                                          @else
                                          <span class=" font-small-3 text-black">
                                                {{ $sec->title }}
                                                <i data-feather='lock' class="text-danger"></i>
                                          </span>
                                          @endif
                                    </li>
                                                
                                    <li class="nav-link px-25 py-25 cursor-pointer">
                                          @if ($sec->quiz->parentSectionCompleted())
                                                <div class="{{ $sec->quiz->id == $quiz->id && $page=="quiz" ? "bg-primary px-25 text-white py-25" : "text-black" }}"> 
                                                      <a 
                                                      href="{{ route('startQuiz',$sec->quiz->id) }}"
                                                      ><span class="font-small-3 {{ $sec->quiz->id == $section->id && $page=="quiz" ? "text-white" : "text-black" }}">{{ $sec->quiz->title }}</span>
                                                      </a>
                                                </div>
                                          @else
                                          <span class="font-small-3 text-black">
                                                {{ $sec->quiz->title }}
                                                <i data-feather='lock' class="text-danger"></i>
                                          </span>
                                          @endif
      
                                    </li>                                
                              @endforeach
                              </ul>
                        
                        {{-- @endif --}}
                  </li>
            @endforeach


      </ul>
</div>


{{-- <nav class="navbar top-navbar navbar-light bg-light px-5">
    <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
  </nav> --}}