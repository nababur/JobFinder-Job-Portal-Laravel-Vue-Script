<div class="site-section" data-aos="fade">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-5 mb-md-0">
          
            <div class="img-border">
              <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                <span class="icon-wrap">
                  <span class="icon icon-play"></span>
                </span>
                <img src="external/images/hero_2.jpg" alt="Image" class="img-fluid rounded">
              </a>
            </div>
          
        </div>
        <div class="col-md-5 ml-auto">
          <div class="text-left mb-5 section-heading">
            <h2>Testimonies</h2>
          </div>

          <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;{{ $testimonial->content }}&rdquo;</p>
          <p>&mdash; <strong class="text-black font-weight-bold">{{ $testimonial->name }}</strong>, {{ $testimonial->profession }}</p>
          <p><a href="https://vimeo.com/{{ $testimonial->video_id }}" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
        </div>
      </div>
    </div>
  </div>