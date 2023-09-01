@extends('layouts.main')

@section('content')


<div style="height: 94px;"></div>

<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
  <div class="container text-center">
    <h1 class="mb-0" style="    color: #fff;
    font-size: 2.5rem;">All Jobs</h1>
    <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a> </span> <span><span class="sep m-0"> ></span> Jobs</span></p>
  </div>
</div>


<div class="site-section bg-light">
    <div class="container">
      <div class="row mb-3">
        <div class="col-lg-12">
          <search-component></search-component>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
          <h2 class="mb-5 h3">Recent Jobs</h2>
          <div class="rounded border jobs-wrap">

        
            @foreach ($jobs as $job)
          

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
                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{ Str::limit($job->position, 20)}}</div>
                    <div class="mr-3"><span class="icon-room mr-1"></span> {{ Str::limit($job->address, 20)}}</div>
                    <div><span class="icon-money mr-1"></span> ${{ $job->salary }}</div>
                  </div>
                </div>
              </div>
              <div class="job-category align-self-center">
                <div class="p-3">
                  <span class=" p-2 rounded border 

                  @if($job->type =='fulltime')         
                  text-info  border-info
                  @elseif($job->type =='freelance') 
                  text-warning   border-warning
                  @elseif($job->type =='partime')   
                  text-danger   border-danger
                  
                  @elseif($job->type =='remote')   
                  text-dark   border-dark
                  @endif
                  
                  ">{{  Str::ucfirst($job->type)}}</span>
                </div>
              </div>  
            </a>


            @endforeach




          </div>

          <div class="col-md-12 text-center mt-5">
            {{ $jobs->links() }}
          </div>
        </div>
  
      </div>
    </div>
  </div>








@endsection

