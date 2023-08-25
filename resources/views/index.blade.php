@extends('layout.index')
@section('section')
    <!-- about section -->
    <section class="section pt-0" id="about">
        <!-- container -->
        <div class="container text-center">
            <!-- about wrapper -->
            <div class="about">
                <div class="about-img-holder">
                    <img src="{{ $profile->profile->image ? asset('storage/' . $profile->profile->image) : asset('meyawo/imgs/man.png') }}"
                        class="about-img" alt="Sam-IT-Services">
                </div>
                <div class="about-caption">
                    <p class="section-subtitle">Who Am I ?</p>
                    <h2 class="section-title mb-3">About Me</h2>
                    <div class="description">
                        {!! $profile->profile->description !!}
                    </div>
                    @if ($profile->profile->cv_url)
                        <button class="btn-rounded btn btn-outline-primary mt-4">Download CV</button>
                    @endif
                </div>
            </div><!-- end of about wrapper -->
        </div><!-- end of container -->
    </section> <!-- end of about section -->

    <!-- service section -->
    <section class="section" id="service">
        <div class="container text-center">
            <p class="section-subtitle">What do You need?</p>
            <h6 class="section-title mb-6">Service</h6>
            <div class="pricing-wrapper">
                @foreach ($services as $s)
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <img class="pricing-card-icon" src="{{ asset('meyawo') }}/imgs/analytics.svg"
                                alt="Sam-IT-Services">
                        </div>
                        <div class="pricing-card-body">
                            <h6 class="pricing-card-title">{{ $s->title }}</h6>
                            <div class="pricing-card-list">
                                @foreach ($s->benefits as $sb)
                                    <p><i class="ti-check"></i> {{ $sb->benefit }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="pricing-card-footer">
                            <span>{{ currencyIDR($s->price_start) . ' sd ' . currencyIDR($s->price_end) }}</span>
                        </div>
                        <a href="{{ generateWhatsAppMe($profile->profile->phone) }}"
                            class="btn btn-primary mt-3 pricing-card-btn">Contact Me</a>
                    </div>
                @endforeach

            </div><!-- end of pricing wrapper -->
        </div>
    </section><!-- end of service section -->

    <!-- portfolio section -->
    <section class="section" id="portfolio">
        <div class="container text-center">
            <p class="section-subtitle">What I Did ?</p>
            <h6 class="section-title mb-6">Portfolio</h6>
            <div class="row">
                <div class="owl-carousel owl-theme portofolio-slider">
                    @foreach ($portofolios as $p)
                        <div class="item">
                            <a href="{{ route('portofolio-detail', ['slug' => $p->slug]) }}#detail" class="portfolio-card">
                                <img src="{{ asset('storage/' . $p->thumbnail_url) }}" class="portfolio-card-img"
                                    alt="Sam-IT-Services">
                                <span class="portfolio-card-overlay">
                                    <span class="portfolio-card-caption">
                                        <h4>{{ $p->title }}</h5>
                                            <p class="font-weight-normal">{{ $p->short_body }}</p>
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- end of container -->
    </section> <!-- end of portfolio section -->

    <!-- section -->
    <section class="section-sm bg-primary">
        <!-- container -->
        <div class="container text-center text-sm-left">
            <!-- row -->
            <div class="row align-items-center">
                <div class="col-sm offset-md-1 mb-4 mb-md-0">
                    <h6 class="title text-light">Want to work with me?</h6>
                    <p class="m-0 text-light">Always feel Free to Contact me</p>
                </div>
                <div class="col-sm offset-sm-2 offset-md-3">
                    <a href="{{ generateWhatsAppMe($profile->profile->phone) }}"
                        class="btn btn-lg my-font btn-light rounded">Contact Me</a>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of section -->

    <!-- contact section -->
    <section class="section" id="contact">
        <div class="container text-center">
            <p class="section-subtitle">How can you communicate?</p>
            <h6 class="section-title mb-5">Contact Me</h6>
            <!-- contact form -->
            <div class="contact-form col-md-10 col-lg-8 m-auto">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <a href="mailto:{{ $profile->profile->email }}" class="btn btn-primary rounded"><i
                                class="ti-email pr-1"></i> Email</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ generateWhatsAppMe($profile->profile->phone) }}" class="btn btn-success rounded"><i
                                class="ti-mobile pr-1"></i> WhatsApp</a>
                    </div>
                </div>
            </div>
        </div><!-- end of container -->
    </section><!-- end of contact section -->
@endsection
