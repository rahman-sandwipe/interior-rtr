<section class="relative overflow-hidden">
    <img src="{{ asset('images/misc/flowers-crop-2.webp') }}" class="w-30 absolute top-0 start-0 sw-anim" alt="">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="subtitle wow fadeInUp mb-3">Our Services</div>
            </div>
        </div>

        <div class="row g-5">
            @forelse($services as $service)
            <div class="col-lg-4 col-sm-6">
                <div class="relative p-4 pb-0 text-center bg-grey mt-5 h-100 rounded-10px">
                    <div class="alt-font absolute end-0 pe-4 fw-bold fs-24 id-color">{{ $loop->iteration }}</div>
                    <img src="{{ asset($service->img) }}" class="img-fluid circle mb-4 w-30 mt-50 shadow-soft wow scaleIn" alt="{{ $service->title }}">
                    <h4>{{ $service->title }}</h4>
                    <p class="no-bottom">{{ \Illuminate\Support\Str::limit($service->description, 80) }}</p>
                    <a class="btn-main btn-light-trans mt-3" href="{{ route('service.details', $service->service_id) }}">Read More</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p>No services available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>