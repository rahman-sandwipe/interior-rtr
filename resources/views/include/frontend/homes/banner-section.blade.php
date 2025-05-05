<section class="section-dark text-light no-top no-bottom position-relative overflow-hidden z-1000">
    <div class="v-center">
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            @if (count($sliders) > 0)
            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <div class="swiper-inner" data-bgimage="url({{ asset($slider->image) }})">
                    <div class="sw-caption relative z-1000">
                        <div class="container">
                            <div class="row gx-5 align-items-center">
                                <div class="spacer-double"></div>
                                <div class="col-lg-6 offset-lg-6">     
                                    <div class="spacer-single"></div>
                                    <div class="sw-text-wrapper">
                                        <h1 class="slider-title mb-3">{{ $slider->title }} <span class="d-block alt-font fw-500 id-color-2 fs-96 fs-xs-60">{{ $slider->subtitle }}</span></h1>
                                        <div class="col-lg-8">
                                            <p class="slider-teaser mb-3">{!! $slider->description !!}</p>
                                        </div>
                                        <div class="spacer-10"></div>
                                        <a class="btn-main bg-color-2 mb10 mb-3" href="{{ $slider->button_link }}">{{ __('Our Services') }}</a>
                                    </div>
                                </div>

                                <div class="spacer-single"></div>
                            </div>

                        </div>
                    </div>
                    <img src="{{ asset('images/partials/flowers-crop.webp') }}" class="w-30 absolute bottom-0 start-0 sw-anim" alt="">
                </div>
            </div>
            @endforeach
            @else
            <div class="swiper-inner" data-bgimage="url({{ asset('images/banners/banner-default.png') }})">
                <div class="sw-caption relative z-1000">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <div class="spacer-double"></div>
                            <div class="text-center text-danger">No slider found</div>
                        </div>
                    </div>
                
                </div>
                <img src="{{ asset('images/partials/flowers-crop.webp') }}" class="w-30 absolute bottom-0 start-0 sw-anim" alt="">
            </div>
            @endif
            <!-- Slides -->
            {{-- <div class="swiper-slide">
                <div class="swiper-inner" data-bgimage="url(images/slider/1.webp)">
                    <div class="sw-caption relative z-1000">
                        <div class="container">
                            <div class="row gx-5 align-items-center">
                                <div class="spacer-double"></div>
                                <div class="col-lg-6 offset-lg-6">     
                                    <div class="spacer-single"></div>
                                    <div class="sw-text-wrapper">
                                        <div class="subtitle s2 mb-2">RTR Interior Design</div>
                                        <h1 class="slider-title mb-3">Begin Your <span class="d-block alt-font fw-500 id-color-2 fs-96 fs-xs-60">Inner Peace Journey</span></h1>
                                        <div class="col-lg-8">
                                            <p class="slider-teaser mb-3">Embark on a journey of self-discovery and emotional healing with our expert therapists.</p>
                                        </div>
                                        <div class="spacer-10"></div>
                                        <a class="btn-main bg-color-2 mb10 mb-3" href="services.html">Our Services</a>
                                    </div>
                                </div>

                                <div class="spacer-single"></div>
                            </div>

                        </div>
                    </div>
                    <img src="images/misc/flowers-crop.webp" class="w-30 absolute bottom-0 start-0 sw-anim" alt="">
                </div>
            </div> --}}
            <!-- Slides -->

            
            

          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

          <!-- If we need scrollbar -->
          <div class="swiper-scrollbar"></div>
        </div>
    </div>
</section>