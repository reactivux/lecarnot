<!DOCTYPE html>
<html lang="fr">

<head>
    @if (isset($token))
        <script>
            var apiToken = @json($token); // Retrieve the token from the view data
            localStorage.setItem('auth', JSON.stringify(apiToken));
            if (@json($redirectTo) == 'checkout')
                window.location.href = "{{ route('checkout') }}";
            else
                window.location.href = "{{ route('produits') }}";
        </script>
    @endif
    <meta charset="UTF-8">
    <meta name="theme-color" content="#bd0d66">
    <link rel="manifest" href="{{ asset('mix-manifest.json') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    {{ Html::style('css/app.css') }}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    @yield('style')
</head>

<body id="app">
    <div class="loader-content" id="loader">
        <div class="loader-container">
            <div class="lds-ellipsis">
                <x-lazyimage :id="'logo-loder'" width="75" height="75" :src="asset('img/logo-le-cinq-5-black.webp')" :placeholder="asset('img/logo-le-cinq-5-black.webp')"
                    alt="Le Carnot - Street Food Croustillante et Savoureuse" :class="''" />
            </div>
        </div>
    </div>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <toast-component></toast-component>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script>
        // Function to show the loader
        function showLoader() {
            const loader = document.getElementById('loader');
            if (loader) {
                loader.style.display = 'flex'; // Shows the loader
                loader.style.opacity = '1'; // Ensure the loader is fully visible
            }
        }

        // Function to hide the loader after a 3-second delay
        function hideLoader() {
            const loader = document.getElementById('loader');
            if (loader) {
                // Wait 3 seconds before hiding the loader
                setTimeout(function() {
                    loader.style.opacity = '0'; // Fade out loader
                    setTimeout(function() {
                        loader.style.display = 'none'; // Hide loader after fade-out
                    }, 500); // Match the fade-out duration (500ms)
                }, 1000); // 3-second delay
            }
        }

        // Wait for the entire page (including images, styles, etc.) to fully load
        window.addEventListener('load', function() {
            showLoader(); // Show the loader when page starts loading

            // When all page content has been loaded (including images, scripts, etc.),
            // keep the loader visible for 3 more seconds and then hide it
            setTimeout(function() {
                hideLoader(); // Hide loader after 3-second delay
            }, 1000); // Keep loader for 3 seconds
        });
        /*** End loader */

        const swiper = new Swiper('.promotions-swiper', {
            // Default parameters
            slidesPerView: 1,
            spaceBetween: 10,
            // // If we need pagination
            pagination: {
                el: '.swiper-pagination-promotion',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next-promotion',
                prevEl: '.swiper-button-prev-promotion',
            },

            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 20px
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // // when window width is >= 320px
                // 320: {
                //     slidesPerView: 1,
                //     spaceBetween: 20
                // },
                // // when window width is >= 570px
                // 570: {
                //     slidesPerView: 1,
                //     spaceBetween: 30
                // },
                // // when window width is >= 768px 
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 992px 
                992: {
                    slidesPerView: 3,
                    spaceBetween: 35
                },
                // when window width is >= 1900
                1900: {
                    slidesPerView: 3,
                    spaceBetween: 40
                }
            }
        })



        const categoriesSwiper = new Swiper('.categories-swiper', {
            // Default parameters
            slidesPerView: 1,
            spaceBetween: 10,

            // // If we need pagination
            pagination: {
                el: '.swiper-pagination-categories',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next-categories',
                prevEl: '.swiper-button-prev-categories',
            },

            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 20px
                20: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 570px
                570: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 768px 
                768: {
                    slidesPerView: 3,
                    spaceBetween: 35
                },
                // when window width is >= 992px 
                992: {
                    slidesPerView: 3,
                    spaceBetween: 35
                },
                // when window width is >= 1200
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 40
                },
                // when window width is >= 1900
                1900: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }
        })
    </script>
    @yield('script')

    <script>
        // Reveal animation using IntersectionObserver
        const leftToRight = document.querySelectorAll('.left-right');
        const observerLeftToRight = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    observerLeftToRight.unobserve(entry.target); // animate once
                }
            });
        }, {
            threshold: 0.2
        });

        leftToRight.forEach(col => observerLeftToRight.observe(col));

        // right to left
        // Simple reveal animation using IntersectionObserver
        const rightToLeft = document.querySelectorAll('.right-left');
        const observerRightToLeft = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    entry.target.style.transitionDelay = `${i * 0.15}s`; // small stagger effect
                    entry.target.classList.add('show');
                    observerRightToLeft.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2
        });

        rightToLeft.forEach(col => observerRightToLeft.observe(col));
    </script>

    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.2/dist/simpleParallax.min.js"></script>
    <script>
        const images = document.querySelectorAll('.parallax');
        if (images) {
            new simpleParallax(images, {
                scale: 1.3,
                delay: 2.5,
                transition: 'cubic-bezier(0,0,0,1)'
            });
        }
    </script>


</body>

</html>
