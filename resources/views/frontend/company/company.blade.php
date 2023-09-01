@extends('layouts.main')

@section('content')

<div style="height: 95px;"></div>
<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }})">
    <div class="container text-center">
      <h1 class="mb-0" style="    color: #fff;
      font-size: 2.5rem;">All Companies</strong></h1>
      <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('company') }}">Company</a> </span> <span><span class="sep m-0"> ></span>list</span></p>
    </div>
</div>
  


<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-title">
                    <h2>Featured Companies</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($companies as $company)
                
            
            <div class="col-lg-4 mb-2 mt-2">
                <a class="d-block" href="{{ route('company.index', [$company->id,$company->slug]) }}">
                    <div class="card company-card">
                        
                        <div class="card-header bg-transparent border-0">
                            <img  src="{{ asset('/uploads/logo') }}/{{ $company->logo }}"  style="border-radius: 50px" width="50" height="50" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $company->cname }}</h5>
                            <p class="card-text mb-2">{{ Str::limit($company->description, 50) }}</p>
                            <a href="{{ route('company.index', [$company->id,$company->slug]) }}" class="btn btn-primary">Visit company</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
    
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                {{ $companies->links() }}
              </div>
        </div>

    </div>
  </div>
  



@endsection
<style>
    .company-card{
          -webkit-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    transition: 0.3s all ease;
    }
    .company-card:hover{
        background: #fff;
        -webkit-box-shadow: 4px 0 40px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 4px 0 40px 0 rgba(0, 0, 0, 0.1);
        z-index: 2;    -webkit-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    transition: 0.3s all ease;    border: 1px solid #218838;
    }
    </style>
    