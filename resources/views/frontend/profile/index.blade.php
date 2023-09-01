@extends('layouts.main')

@section('content')
<div style="height: 95px;"></div>
<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }})">
    <div class="container text-center">
      <h1 class="mb-0" style="    color: #fff;
      font-size: 2.5rem;">Profile</strong></h1>
      <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a> </span> <span><span class="sep m-0"> ></span>{{ Auth::user()->name }}</span></p>
    </div>
</div>
  

<div class="site-section bg-light">

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    Update your profile
                </div>
                <div class="card-body">
                        <form action="{{ route('profile.create') }}" method="POST">
                            @csrf
                        
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ Auth::user()->profile->address }}">
                        
                                @if ($errors->has('address'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('address') }}</p>
                                </div>
                                @endif

                            </div>
                            <div class="form-group mt-3">
                                <label for="">Phone number</label>
                                <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ Auth::user()->profile->phone }}">
                                @if ($errors->has('phone'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('phone') }}</p>
                                </div>
                                @endif


                            </div>
                            <div class="form-group mt-3">
                                <label for="">Experience</label>
                                <input type="text" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" name="experience" value="{{ Auth::user()->profile->experience }}">
                                @if ($errors->has('experience'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('experience') }}</p>
                                </div>
                                @endif

                            </div>
                            <div class="form-group mt-3">
                                <label for="">Bio</label>
                                <textarea name="bio" id="" style="height: 120px" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}" cols="30" rows="10">{{ Auth::user()->profile->bio }}</textarea>
                                @if ($errors->has('bio'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('bio') }}</p>
                                </div>
                                @endif

                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-success">Update</button>
                            </div>
                            @if (Session::has('message'))
                                <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                    <strong>Wow awesome !</strong> {{ Session::get('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            
                            @endif
                            

                        

                        </form>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header  mb-3">
                            Avatar
                        </div>
                        @if (!empty(Auth::user()->profile->avatar))
                        <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" style="width:100px; height:100px;border-radius:100px;object-fit: cover; margin:0px auto" class="border  mb-3" alt="">
                        @else    
                        <img src="https://i.pravatar.cc/150" style="width:100px;border-radius:100px; margin:0px auto" class="border  mb-3" alt="">

                        @endif
                        <div class="card-body p-0 text-center">
                            <input type="hidden" name="avatar" value="avatar">
                            <input type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">
                            <button class="btn btn-success w-100 mt-3">Update</button>

                            @if ($errors->has('avatar'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('avatar') }}</p>
                                </div>
                            @endif


                            @if (Session::has('avatar'))
                                <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                    {{ Session::get('avatar') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                
                            @endif

                        </div>
                    </div>

                </form>

                <div class="card mt-3">
                    <div class="card-header">
                        Your info
                    </div>
                    <div class="card-body">
                        <p>Name:  <strong class="badge bg-secondary badge-primary">{{ Auth::user()->name }}</strong></p>
                        <p>Email: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->email }}</strong> </p>
                        <p>Phone number: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->profile->phone }} </strong> </p>
                        <p>Address: <strong class="badge bg-secondary badge-primary"> {{ Auth::user()->profile->address }}</strong> </p>
                        <p>Gender: <strong class="badge bg-secondary badge-primary"> {{ Auth::user()->profile->gender }}</strong> </p>
                        <p> <strong class="badge bg-secondary badge-primary">Experience:</strong> {{ Auth::user()->profile->experience }} </p>
                        <p><strong class="badge bg-secondary badge-primary"> Bio: </strong> {{ Auth::user()->profile->bio }} </p>
                        <p>Member On: <strong class="badge bg-secondary badge-primary"> {{ date('F d Y', strtotime(Auth::user()->created_at)) }}</strong> </p>

                        @if (!empty(Auth::user()->profile->cover_letter))
                            <p>Download cover letter: <strong class="badge bg-info badge-primary"><a class="text-white" target="_blank" href="{{ url('storage/'.Auth::user()->profile->cover_letter) }}"> Cover letter</a></strong></p>
                        @endif
                        @if (!empty(Auth::user()->profile->resume))
                            <p>Download resume: <strong class="badge bg-info badge-primary"><a  class="text-white"target="_blank" href="{{ url('storage/'.Auth::user()->profile->resume) }}"> Resume</a> </strong></p>
                        @endif

                    </div>
                </div>
            
                <form action="{{ route('cover.letter') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card mt-3">
                        <div class="card-header">
                            Update Cover letter
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control{{ $errors->has('cover_letter') ? ' is-invalid' : '' }}" name="cover_letter">
                            <button class="btn btn-success mt-3">Update</button>

                        @if (Session::has('coverletter'))
                            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                <strong>Wow !</strong> {{ Session::get('coverletter') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->has('cover_letter'))
                            <div style="color:red">
                                <p class="mb-0">{{ $errors->first('cover_letter') }}</p>
                            </div>
                        @endif
                

                        </div>
                    </div>
                </form>
                

                
                <form action="{{ route('resume') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="card mt-3">
                        <div class="card-header">
                            Update Resume
                        </div>
                        <div class="card-body">
                            
                            <input type="file" class="form-control{{ $errors->has('resume') ? ' is-invalid' : '' }}" name="resume">
                            <button class="btn btn-success mt-3">Update</button>
                            @if (Session::has('resume'))
                                <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                    <strong>Wow !</strong> {{ Session::get('resume') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                
                            @endif

                            @if ($errors->has('resume'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('resume') }}</p>
                                </div>
                            @endif

                        </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>


</div>
@endsection
