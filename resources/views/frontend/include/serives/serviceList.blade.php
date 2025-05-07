<section class="relative overflow-hidden">
    <img src="{{ asset('images/misc/flowers-crop-2.webp') }}" class="w-30 absolute top-0 start-0 sw-anim" alt="">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="subtitle wow fadeInUp mb-3">Our Services</div>
            </div>
        </div>

        <div class="row g-5" id="getService">
            <!-- Services will be loaded here -->
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/getServices',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.services.forEach(function(service) {
                    rows += `
                        <div class="col-lg-4 col-sm-6">
                            <div class="relative p-4 pb-0 text-center bg-white mt-5 h-100 rounded-10px">
                                <div class="alt-font absolute end-0 pe-4 fw-bold fs-24 id-color">${service.id}</div>
                                <img src="${service.img}" class="img-fluid circle mb-4 w-30 mt-50 shadow-soft wow scaleIn" data-wow-delay=".2s" alt="">
                                <h4>${service.title}</h4>
                                <p class="no-bottom"> ${service.description.length > 80 ? service.description.substring(0, 77) + '<a class="btn-main btn-main btn-light-trans mt-3" href="/service-details/' + service.id + '">Read More</a>' : service.description}</p>
                                
                            </div>
                        </div>
                    `;
                });
                $('#getService').html(rows);
            },
            error: function(err) {
                alert('Error fetching services');
                console.error(err);
            }
        });
    });
</script>