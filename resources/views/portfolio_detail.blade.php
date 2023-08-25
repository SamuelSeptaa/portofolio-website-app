@extends('layout.index')
@section('section')
    <!-- about section -->
    <section class="section pt-0" id="detail">
        <!-- container -->
        <div class="container text-center">
            <p class="section-subtitle">Detail of</p>
            <h6 class="section-title mb-6">{{ $detail->title }}</h6>

            <div class="blog-description">
                {!! $detail->description !!}
            </div>
            <div class="owl-carousel owl-theme portofolio-slider">
                @foreach ($detail->images_portofolio as $p)
                    <div class="item">
                        <div class="portfolio-card">
                            <img src="{{ asset('storage/' . $p->image_url) }}" class="portfolio-card-img"
                                alt="Sam-IT-Services">
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- end of container -->
    </section> <!-- end of about section -->
@endsection
