
    @include('frontend/partials.head')
    @include('frontend/partials.nav')
  
    @include('frontend/partials.hero')
    @include('frontend/partials.category')
    



    <div class="site-section bg-light">
      <div class="container">
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
                @if ($job->company->logo ?? '')
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{ asset('/uploads/logo') }}/{{ $job->company->logo  ?? ''}}" alt="Image" class="img-fluid mx-auto">
                </div>
                @endif
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{ $job->title }}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{ Str::limit($job->position, 20)}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{ Str::limit($job->address, 20)}}</div>
                      <div><span class="icon-money mr-1"></span> ${{ $job->salary }}</div>
                      {{-- <div><span class="icon-eye ml-3 mr-1"></span> ${{ $job->salary }}</div> --}}
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
              <a href="{{ route('alljobs') }}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
            </div>
          </div>
    
        </div>
      </div>
    </div>

    @include('frontend/partials.testimonial')


    <div class="site-blocks-cover overlay inner-page" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center" data-aos="fade">
            <h1 class="h3 mb-0">Your Dream Job</h1>
            <p class="h3 text-white mb-5">Is Waiting For You</p>
            <p><a href="/register" class="btn btn-outline-warning py-3 px-4">Job seeker</a> <a href="{{ route('employer.register') }}" class="btn btn-warning py-3 px-4">Employer </a></p>
            
          </div>
        </div>
      </div>
    </div>

    

    <div class="site-section site-block-feature bg-light">
      <div class="container">
        
        <div class="text-center mb-5 section-heading">
          <h2>Why Choose Us</h2>
        </div>

        <div class="d-block d-md-flex border-bottom">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">More Jobs Every Day</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Creative Jobs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
        <div class="d-block d-md-flex">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Healthcare</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Finance &amp; Accounting</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
    </div>

    

    @include('frontend/partials.blog')


    @include('frontend/partials.footer')
