@extends('layouts.main')

@section('content')
<div style="height: 94px;"></div>

<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
  <div class="container text-center">
    <h1 class="mb-0" style="    color: #fff;
    font-size: 2.5rem;">Profile</h1>
    <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a> </span> <span><span class="sep m-0"> ></span> {{ Auth::user()->company->cname }}</span></p>
  </div>
</div>

<div class="site-section bg-light">

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="card bg-white">
                <div class="card-header">
                    Update company profile
                </div>
                <div class="card-body">
                        <form action="{{ route('company.store') }}" method="POST">
                            @csrf
                        
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ Auth::user()->company->address }}">
                        
                                @if ($errors->has('address'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('address') }}</p>
                                </div>
                                @endif

                            </div>
                            <div class="form-group mt-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ Auth::user()->company->phone }}">
                        
                                @if ($errors->has('phone'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('phone') }}</p>
                                </div>
                                @endif

                            </div>
                            <div class="form-group mt-3">
                                <label for="">Website</label>
                                <input type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ Auth::user()->company->website }}">
                        
                                @if ($errors->has('website'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('website') }}</p>
                                </div>
                                @endif

                            </div>
                
                            <div class="form-group mt-3">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control{{ $errors->has('slogan') ? ' is-invalid' : '' }}" name="slogan" value="{{ Auth::user()->company->slogan }}">
                        
                                @if ($errors->has('slogan'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('slogan') }}</p>
                                </div>
                                @endif

                            </div>
                
                        
                            <div class="form-group mt-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" style="height: 120px" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" cols="30" rows="10">{{ Auth::user()->company->description }}</textarea>
                                
                                @if ($errors->has('description'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('description') }}</p>
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
                <form action="{{ route('logo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header  mb-3">
                            Company Logo
                        </div>
                        @if (!empty(Auth::user()->company->logo))
                        <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" style="width:100px; height:100px;border-radius:100px;object-fit: cover; margin:0px auto" class="border  mb-3" alt="">
                        @else    
                        <img src="https://i.pravatar.cc/150" style="width:100px;border-radius:100px; margin:0px auto" class="border  mb-3" alt="">

                        @endif
                        <div class="card-body p-0 text-center">
                
                            <input type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo">
                            <button class="btn btn-success w-100 mt-3">Update</button>

                            @if ($errors->has('logo'))
                                <div style="color:red">
                                    <p class="mb-0">{{ $errors->first('logo') }}</p>
                                </div>
                            @endif


                            @if (Session::has('logo'))
                                <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                    {{ Session::get('logo') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                
                            @endif

                        </div>
                    </div>

                </form>
                <div class="card mt-3">
                    <div class="card-header">
                        Company info
                    </div>
                    <div class="card-body">
                        <p><strong class="badge bg-secondary badge-primary">Slogan:  </strong> {{ Auth::user()->company->slogan }}</p>
                        <p>Company Name: <strong class="badge bg-secondary badge-primary">  {{ Auth::user()->company->cname }}</strong></p>
                        <p>Company Address: <strong class="badge bg-secondary badge-primary">  {{ Auth::user()->company->address }}</strong></p>
                        <p>Company Email: <strong class="badge bg-secondary badge-primary">  {{ Auth::user()->email }}</strong></p>
                        <p>Company Phone: <strong class="badge bg-secondary badge-primary">  {{ Auth::user()->company->phone }}</strong></p>
                        <p>Company website: <strong class="badge bg-secondary badge-primary "><a target="_blank" class="text-white" href="{{ Auth::user()->company->website }}"> {{ Auth::user()->company->website }}</a> </strong></p>
                        <p>Company Jobs: <strong class="badge bg-secondary badge-primary "><a target="_blank" class="text-white" href="company/{{ Auth::user()->company->slug }}"> View jobs</a> </strong></p>
                        <p><strong class="badge bg-secondary badge-primary ">Company Description: </strong> {{ Auth::user()->company->description }}</p>

                    </div>
                </div>
            
                <form action="{{ route('banner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card mt-3">
                        <div class="card-header">
                            Upload Banner
                        </div>
                        <div class="card-body">
                            <div>
                                @if (!empty(Auth::user()->company->banner))
                                <img src="{{ asset('uploads/banner') }}/{{ Auth::user()->company->banner }}" style="width:100%;object-fit: cover; margin:0px auto" class="border  mb-3" alt="">
                                @else
                                <img src="{{ asset('cover/cover-photo.jpg') }}" style="max-width: 100%" alt="">
                                @endif 
                            </div>
                            <input type="file" class="form-control{{ $errors->has('banner') ? ' is-invalid' : '' }}" name="banner">
                            <button class="btn btn-success mt-3">Update</button>

                        @if (Session::has('banner'))
                            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                <strong>Wow !</strong> {{ Session::get('banner') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->has('banner'))
                            <div style="color:red">
                                <p class="mb-0">{{ $errors->first('banner') }}</p>
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
