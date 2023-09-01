@extends('layouts.main')

@section('content')

<div style="height: 95px;"></div>
<div class="unit-5 overlay" style="background-image: url({{ asset('uploads/banner') }}/{{ $company->banner }});">
    <div class="container text-center">
      <h1 class="mb-0" style="    color: #fff;
      font-size: 2.5rem;">Company name:<strong>&nbsp;{{ $company->cname }}</strong></h1>
      <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a> </span> <span><span class="sep m-0"> ></span> Company details</span></p>
    </div>
</div>
  


<div class="site-section bg-light">
    <div class="container">
      <div class="row">
     
        <div class="col-md-12 col-lg-12 mb-5">
        
          
        
          <div class="p-4 bg-white">
  
            <div class="mb-4 mb-md-4 mr-5">
             <div class="job-post-item-header">
                <div class="d-flex align-items-center">
                    @if ($company->logo)
                    
                    <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" style="width:100px; height:100px;border-radius:100px;object-fit: cover;" class="border  mb-3" alt="">
                    @endif
        
                    <h3 class="mx-4 mb-0">Company name:<strong>&nbsp;{{ $company->cname }}</strong> </h3>

                </div>
                <p class="mt-3"><strong>Company Details:</strong> &nbsp;{{ $company->description }}</p>
                <p><strong>Slogan:</strong>&nbsp;{{ $company->slogan }}</p>
                <p><strong>Address:</strong>&nbsp;{{ $company->address }}</p>
                <p><strong>Phone:</strong>&nbsp;{{ $company->phone }}</p>
                <p><strong>Website: </strong>&nbsp;<a target="_blank" href="{{ $company->website }}">{{ $company->website }}</a></p>
               
             </div>
        
            </div>
  
          </div>
        </div>
  

      </div>

      @if (count($company->jobs)> 0)
        
     
      <div class="row">
     
        <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <div class="p-4 bg-white">
            <h3 class="mb-5 h3">{{ $company->cname }} <i style="color: #28a745;" class="icon-hand-o-right"></i> other Jobs</h3>
            <div class="rounded border jobs-wrap">
  
          
              @foreach ($company->jobs as $job)
            
  
              <a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom  
                
                @if($job->type =='fulltime')         
                fulltime
                @elseif($job->type =='freelance') 
                freelance  
                @elseif($job->type =='partime')   
                partime  
                @elseif($job->type =='remote')   
                remote
                @endif
  
                ">
                @if ($job->company->logo)
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{ asset('/uploads/logo') }}/{{ $job->company->logo }}" alt="Image" class="img-fluid mx-auto">
                </div>
                @endif
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{ $job->title }}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{ $job->position }}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{ Str::limit($job->address, 20)}}</div>
                      <div><span class="icon-clock-o mr-1"></span> {{ $job->created_at->diffForHumans() }}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                  <div class="p-3">
                    
                    <span class="text-info p-2 rounded border border-info">Apply Job</span>
                  </div>
                </div>  
              </a>
  
  
              @endforeach
  
  
  
  
            </div>
          </div>
        </div>

      </div>
      @endif




    </div>
  </div>
  




@endsection
