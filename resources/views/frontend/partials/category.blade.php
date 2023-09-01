<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <h2 class="mb-5">Popular Categories</h2>
        </div>
      </div>
      <div class="row">

          
     
          @foreach ($categories as $category )
          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('category.index', [$category->id,$category->slug ]) }}" class="h-100 feature-item">
              <span class="d-block icon  mb-3 text-primary"></span>
              <h2>{{ $category->name }}</h2>
              <span class="counting">{{ $category->jobs->count() }}</span>
            </a>
          </div>
          @endforeach
 
      </div>

    </div>
  </div>