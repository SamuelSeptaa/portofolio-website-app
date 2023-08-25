<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Bimbingan belajar Teknik Informatika Universitas Palangka Raya bersama {{ $profile ? $profile->name : '' }}">
    <meta name="author" content="Devcrud">
    <title>Bimbel IT</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('meyawo') }}/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="{{ asset('meyawo') }}/css/meyawo.css">
    <link rel="stylesheet" href="{{ asset('meyawo') }}/vendors/owlcarousel/css/owl.carousel.min.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    @include('layout.navbar')

    <!-- page header -->
    <header id="home" class="header" style="background-image: url({{ asset('meyawo/imgs/header.jpg') }})">
        <div class="overlay"></div>
        <div class="header-content container">
            <h1 class="header-title">
                <span class="up">HI!</span>
                <span class="down">I am {{ $profile ? $profile->name : '' }}</span>
            </h1>
            <p class="header-subtitle">{{ $profile ? $profile->profile->role : '' }}</p>

            <a class="btn btn-primary" href="{{ route('home') }}#portfolio">Visit My Works</a>
        </div>
    </header><!-- end of page header -->

    @yield('section')

    <!-- footer -->
    <div class="container">
        <footer class="footer">
            <p class="mb-0">Copyright
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy; <a href="http://www.devcrud.com">DevCRUD</a> Distribution <a
                    href="https://themewagon.com">ThemeWagon</a>
            </p>
            @if ($profile)
                @if ($profile->profile)
                    <div class="social-links text-right m-auto ml-sm-auto">
                        <a href="mailto:{{ $profile->profile->email }}" class="link"><i class="ti-google"></i></a>
                    </div>
                @endif

            @endif
        </footer>
    </div> <!-- end of page footer -->

    <!-- core  -->
    <script src="{{ asset('meyawo') }}/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="{{ asset('meyawo') }}/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="{{ asset('meyawo') }}/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Meyawo js -->
    <script src="{{ asset('meyawo') }}/js/meyawo.js"></script>

    <script src="{{ asset('meyawo') }}/vendors/owlcarousel/js/owl.carousel.min.js"></script>

</body>
<script>
    $('.portofolio-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            768: {
                items: 2
            },
        }
    })
</script>

</html>
