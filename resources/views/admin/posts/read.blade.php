@extends('layouts.main')
@section('content')

  <div style="height: 94px;"></div>

<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
  <div class="container text-center">
    <h1 class="mb-0" style="    color: #fff;
    font-size: 2.5rem;">{{$post->title}}</h1>
    <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="/post">Blog</a> </span> <span><span class="sep m-0"> ></span> Post details</span></p>
  </div>
</div>

  
  

  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
     
        <div class="col-md-12 col-lg-8 mb-5">
        
          
        
          <div class="p-5 bg-white">

            <div class="mb-3 mb-md-4">
             <div class="job-post-item-header d-flex align-items-center">
               <h2 class="mr-3 text-black h4">{{$post->title}}</h2>
               
             </div>
             <div class="job-post-item-body d-block d-md-flex">
               <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> Posted by : <a href="#">Admin</a></div>
               <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> Category : <a href="#">{{$post->category->name}}</a></div>
               <div><span class="fl-bigmug-line-big104"></span> <span >Date : {{ $post->created_at->diffForHumans() }}</span></div>

        

             </div>
            </div>


          
            <div class="img-border mb-5">
                @if ($post->post_thumbnail)
                <img src="{{ asset('storage/'.$post->post_thumbnail)}}" alt="" class="img-fluid img-thumbnail">
                @else  
                <img src="external/images/img_1.jpg" alt="" class="img-fluid img-thumbnail">

                @endif
            </div>
          
        
            
            <p>{{$post->description}}</p>


          </div>
        </div>

        <div class="col-md-4 block-16" data-aos="fade-left" data-aos-delay="200">
          <div class="d-flex mb-0">
            <h2 class="mb-5 h3 mb-0">Featured Jobs</h2>
            <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
          </div>

          <div class="nonloop-block-16 owl-carousel">


            @foreach ($featured as $feature)
              
           

            <div class="border rounded p-4 bg-white">
              <h2 class="h5"><a href="{{ route('job.show', [$feature->id, $feature->slug]) }}">{{ $feature->title }}</a></h2>
              <p>
                
                <span class=" p-2 rounded border 

                @if($feature->type =='fulltime')         
                text-info  border-info
                @elseif($feature->type =='freelance') 
                text-warning   border-warning
                @elseif($feature->type =='partime')   
                text-danger   border-danger
                
                @elseif($feature->type =='remote')   
                text-dark   border-dark
                @endif
                
                ">{{  Str::ucfirst($feature->type)}}</span>
              </p>
              <p>
                <span class="d-block"><span class="icon-suitcase"></span> {{ Str::limit($feature->position, 20)}}</span>
                <span class="d-block"><span class="icon-room"></span> {{ Str::limit($feature->address, 20)}}</span>
                <span class="d-block"><span class="icon-money mr-1"></span> ${{ $feature->salary }}</span>
              </p>
              <p class="mb-0">{{ Str::limit($feature->description, 150)}}</p>
            </div>
            @endforeach
           

          </div>

        </div>
      </div>
    </div>
  </div>




  @endsection
