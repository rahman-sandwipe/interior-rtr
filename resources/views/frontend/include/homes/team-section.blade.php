<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="subtitle wow fadeInUp mb-3">We Have Best Team</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">Our Specialist</h2>
                <p class="lead">Qui culpa qui consequat officia cillum quis irure aliquip ut dolore sit eu culpa ut
                    irure nisi occaecat dolore adipisicing.</p>
                <div class="spacer-single"></div>
            </div>
        </div>
        <div class="row g-4">
            @if (count($teams) > 0)
            @foreach ($teams as $member)
            <div class="col-lg-3 col-sm-6">
                <img src="{{ asset($member->avatar) }}" class="img-fluid rounded-10px" alt="">
                <div class="p-3 text-center bg-color-3 rounded-10px mx-3 mt-30 relative z-1000">
                    <h4 class="mb-0">{{ $member->full_name }}</h4>
                    <p class="mb-2 text-capitalize">{{ $member->role }}</p>
                    <div class="social-icons">
                        <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
                        <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <h4 class="text-center mt-4">No team members are currently available. Please check back later.</h4>
            </div>
            @endif
        </div>
    </div>
</section>
