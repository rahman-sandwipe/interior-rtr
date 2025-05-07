<section class="relative overflow-hidden">
    <img src="images/misc/flowers-crop-2.webp" class="w-40 absolute top-0 end-10 sw-anim" alt="">

    <div class="container">
        <div class="row align-items-center g-4 gx-5">
            <div class="col-lg-6">
                <div class="subtitle wow fadeInUp mb-3">Our Services</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">{{ $service->title }}</h2>
                <p class="lead">{{ Illuminate\Support\Str::limit($service->description, 80) }}</p>

                <div class="fs-14 text-dark fw-500">Start from</div>
                <div class="mb-3">
                    <h2 class="d-inline id-color-2">{{ number_format($service->price, 2) }} USD</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset($service->img) }}" class="img-fluid rounded-20px" alt="">
            </div>
        </div>
    </div>
</section>
