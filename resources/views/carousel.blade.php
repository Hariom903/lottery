 <div class='container pt-5 '>
            <div id="carouselExampleSlidesOnly" class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-inner rounded-5">
                    @foreach ($carousels as $carousel )
                     <div class="carousel-item active">
                        <img src="{{ asset("carousel/$carousel->path") }}" height="350px" class="d-block w-100"
                            alt="...">
                    </div>
                    @endforeach
                    {{-- <div class="carousel-item active">
                        <img src="{{ asset('images/caravsal.png') }}" height="350px" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/carousel-item2.png') }}" height="350px" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/carousel-item3.png') }}" height="350px" class="d-block w-100"
                            alt="..."> --}}
                    </div>
                </div>
            </div>
        </div>

