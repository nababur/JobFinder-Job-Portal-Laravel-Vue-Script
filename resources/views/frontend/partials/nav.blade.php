


<div class="site-wrap">

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->
  

<div class="site-navbar-wrap js-site-navbar bg-white">
      
    <div class="container">
      <div class="site-navbar bg-light">
        <div class="py-1">
          <div class="row align-items-center">
            <div class="col-2">
              <h2 class="mb-0 site-logo"><a href="/">Job<strong class="font-weight-bold">Finder</strong> </a></h2>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container pr-0">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block">
         
                    <li class="{{ request()->routeIs('company') ? 'active' : '' }}"><a href="{{ route('company') }}">Company</a></li>
                    @if (!Auth::check())
                    <li class="{{ request()->routeIs('/register') ? 'active' : '' }}"><a href="/register">For Job Seeker</a></li>
                    <li class="{{ request()->routeIs('employer.register') ? 'active' : '' }}"><a href="{{ route('employer.register') }}">For Employees</a></li>
                    @else

                 
                        @if (Auth::user()->user_type==='employer' || Auth::user()->user_type==='seeker')
                        <li class="has-children">
                          <a href="/home">Dashboard</a>
                          
                          <ul class="dropdown arrow-top">

                            @if (Auth::user()->user_type==='employer')
                            <li><a  href="{{ route('job.create') }}">
                                {{ __('Create new Job') }}
                              </a>
                            </li>
                            <li><a  href="{{ route('myjobs') }}">
                              {{ __('My Jobs') }}
                              </a>
                            </li>
                            <li><a  href="{{ route('company.create') }}">
                                {{ __('Company') }}
                              </a>
                            </li>

                            <li><a  href="{{ route('applicant') }}">
                                {{ __('Applicants') }}
                            </a></li>
                            @endif

                            @if (Auth::user()->user_type==='seeker')
                            <li><a  href="{{ route('user.profile') }}">
                                {{ __('Profile') }}
                            </a></li>
                            <li><a  href="{{ route('home') }}">
                                {{ __('Saved Jobs') }}
                            </a></li>
                            @endif





                          </ul>
                        </li>
                    
                        @else

                          <li><a href="/home">Dashboard</a></li>

                         @endif



                    @endif


                    @if (!Auth::check())
                      <li>
                        <a href="#" data-bs-target="#login-modal" data-toggle="modal" data-target="#login-modal" ><span class="bg-primary text-white py-3 px-3 rounded"><span class="icon-sign-in mr-3"></span>Login</span></a>
                      </li>
                    @else
                      <li>
                        <a class="bg-primary text-white py-3 px-3 rounded" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          <span class="icon-sign-out mr-3"></span>{{ __('Logout') }}
                      </a>
                      </li>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                      
                    @endif


                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div style="height: 100px;"></div> --}}


  <!-- Login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content pb-4">
      <div class="modal-header mt-2 mb-2">
        <h5 class="modal-title" id="login-modal">{{ __('User/Employee/Admin') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
       
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                      
                    <div class="row mb-3">
                        <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Email Address') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>
  <!-- Modal -->


  