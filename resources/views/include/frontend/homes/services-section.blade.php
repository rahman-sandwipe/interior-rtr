<section class="bg-grey relative overflow-hidden">
    <img src="images/misc/flowers-crop-2.webp" class="w-30 absolute top-0 start-0 sw-anim" alt="">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="subtitle wow fadeInUp mb-3">Our Services</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">Transform Your<span
                        class="d-block mt-2 alt-font fw-500 fs-72 id-color-2">Beautiful Home</span></h2>
                <p class="lead wow fadeInUp">Get in touch today – give your space a new look!</p>
            </div>
        </div>

        <div class="row g-5">
            @if (count($services) > 0)
            <div class="col-12">
                <h4 class="text-center mt-4">We have {{ count($services) }} services available <a href="#">View All</a></h4>
            </div>
            @foreach ($services as $service)
            <div class="col-lg-4 col-sm-6">
                <div class="relative p-4 pb-0 text-center bg-white mt-5 h-100 rounded-10px">
                    <div class="alt-font absolute end-0 pe-4 fw-bold fs-24 id-color">{{ $loop->iteration }}</div>
                    <img src="{{ asset($service->img) }}" class="img-fluid circle mb-4 w-30 mt-50 shadow-soft wow scaleIn"
                    data-wow-delay=".2s" alt="">
                    <h4>{{ $service->title }}</h4>
                    <p class="no-bottom">{!! $service->description !!}</p>
                    <a class="btn-main btn-main btn-light-trans mt-3" href="#">Our Services</a>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <h4 class="text-center mt-4">No services are currently available. Please check back later.</h4>
            </div>
            @endif
        </div>

        <div class="spacer-double"></div>
    </div>
</section>