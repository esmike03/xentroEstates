<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xentro - Find Your Dream Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/home (1).png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow - style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<!-- Header -->

<body class=" font-[Ubuntu]">
    <header class="bg-zinc-800 shadow fixed w-full z-50 top-0 backdrop-filter backdrop-blur-xl bg-opacity-30">

        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2">
                <!-- Image (JFIF format) -->
                <img src="{{ asset('images/XENTROESTATES2.png') }}" alt="Xentro Estates Logo" class="w-20 object-cover">
                <p class="text-white font-bold">Xentro Estates Property Corp.</p>
            </a>

            <!-- Navigation Menu (Desktop) -->
            <nav class="hidden md:flex space-x-6">
                <a href="/"
                    class="text-white hover:text-yellow-500 border-b-yellow-500 border-b-2 hover:scale-105 transition duration-300">Home</a>
                <a href="user-listings1"
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Properties</a>
                <a href="/about" class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">About
                    Us</a>
                <a href="/contact"
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Contact</a>
                <a href="/user/subdivisions"
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Subdivisions</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden flex flex-col bg-zinc-800 shadow-md absolute w-full left-0 top-full z-50">
            <a href="#" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">Home</a>
            <a href="user-listings1"
                class="block py-3 px-4 hover:text-yellow-500 text-white hover:bg-gray-100">Properties</a>
            <a href="/about" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">About Us</a>
            <a href="/contact" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">Contact</a>
            <a href="/user/subdivisions"
                class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">Subdivisions</a>
        </div>
    </header>
    <section class="relative h-[600px] bg-cover bg-center "
        style="background-image: url({{ asset('images/33052.png') }});">

        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-center text-white flex flex-col justify-center items-center h-full">
            <h1 class="text-2xl md:text-6xl mx-5 font-bold mb-2 ">Building Sustainable Communities, Shaping the Future
            </h1>
            <p class="text-sm mb-8 mx-3 md:mx-56">Xentro Estates Properties Corp. is committed to creating
                master-planned communities with innovative design, quality developments, and excellent service. Discover
                residential spaces designed for a better way of living.</p>
            <div class=" flex-col ">
                <a href="/user/subdivisions"
                    class="bg-transparent border m-2 border-white text-white hover:bg-zinc-900 font-semibold py-3 px-8 rounded-full transition duration-300">
                    Subdivisions</a>
                <a href="user-listings1"
                    class="bg-transparent border m-2 border-white text-white hover:bg-zinc-900 font-semibold py-3 px-8 rounded-full transition duration-300">
                    Properties</a>
            </div>

        </div>
    </section>

    <section class="py-16 relative h-[600px] bg-contain bg-center"
        style="background-image: url({{ asset('images/herooverlay3.png') }});">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold text-center mb-8 italic">Featured Properties</h2>

            @if ($featuredListings->isEmpty())
                <p class="text-center text-gray-500">No featured properties available at the moment.</p>
            @else
                <div x-data="{ scrollLeft() { this.$refs.slider.scrollBy({ left: -300, behavior: 'smooth' }) }, scrollRight() { this.$refs.slider.scrollBy({ left: 300, behavior: 'smooth' }) } }" class="relative">

                    <!-- Left Button -->
                    <button @click="scrollLeft"
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow-lg hidden md:block">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <!-- Scrollable Container -->
                    <div x-ref="slider"
                        class="flex space-x-6 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-hide">
                        @foreach ($featuredListings as $listing)
                            <div
                                class="min-w-[320px] md:min-w-[380px] lg:min-w-[400px] snap-start bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                <a>
                                    @if ($listing->image)
                                        <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}"
                                            class="w-full h-64 object-cover">
                                    @else
                                        <img src="{{ asset('images/default-property.jpg') }}" alt="Default Property"
                                            class="w-full h-64 object-cover">
                                    @endif
                                </a>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">{{ $listing->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($listing->description, 100) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span
                                            class="text-lg font-bold text-gray-700">PHP {{ number_format($listing->price) }}</span>
                                        <a href="{{ route('user_listings.show', $listing->id) }}"
                                            class="text-gray-500 hover:text-gray-600">
                                            <i class="fas fa-eye text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Right Button -->
                    <button @click="scrollRight"
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow-lg hidden md:block">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            @endif
        </div>
    </section>


    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-semibold mb-4">About Us</h2>
                    <p class="text-gray-700 mb-6">We are a leading real estate agency dedicated to helping you find
                        your
                        dream home. With years of experience and a wide range of properties, we are committed to
                        providing exceptional service and making your real estate journey seamless.</p>
                    <a href="/about"
                        class="  text-gray-800 font-semibold  rounded-full transition duration-300">Learn
                        More</a>
                </div>
                <div>
                    <img src="{{ asset('images/Xentro.png') }}" alt="About Us" class="w-full rounded-lg">
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-white lg:grid lg:grid-cols-5">
        <div class="relative block h-32 lg:col-span-2 lg:h-full">
            <img src="https://images.unsplash.com/photo-1642370324100-324b21fab3a9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1548&q=80"
                alt="" class="absolute inset-0 h-full w-full object-cover" />
        </div>

        <div class="px-4 py-16 sm:px-6 lg:col-span-3 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                <div>
                    <p>
                        <span class="text-xs uppercase tracking-wide text-gray-500"> Call us </span>

                        <a href="#"
                            class="block text-xl font-medium text-gray-900 hover:opacity-75 sm:text-2xl">
                            (+63) 9XX-XXX-XXXX
                        </a>
                    </p>

                    <ul class="mt-8 space-y-1 text-sm text-gray-700">
                        <li>Monday to Friday: 10am - 5pm</li>
                        <li>Weekend: 10am - 3pm</li>
                    </ul>

                    <ul class="mt-8 flex gap-6">
                        <li>
                            <a href="#" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75">
                                <span class="sr-only">Facebook</span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="#" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75">
                                <span class="sr-only">Instagram</span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>


                    </ul>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">


                    <div>
                        <p class="font-medium text-gray-900">Company</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="/about" class="text-gray-700 transition hover:opacity-75"> About </a>
                            </li>

                            <li>
                                <a href="/about" class="text-gray-700 transition hover:opacity-75"> Meet the Team
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-12 border-t border-gray-100 pt-12">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <ul class="flex flex-wrap gap-4 text-xs">
                        <li>
                            <a href="#" class="text-gray-500 transition hover:opacity-75"> Terms & Conditions
                            </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-500 transition hover:opacity-75"> Privacy Policy </a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-500 transition hover:opacity-75"> Cookies </a>
                        </li>
                    </ul>

                    <p class="mt-8 text-xs text-gray-500 sm:mt-0">
                        &copy; 2025. Xentro Estates Property Corp. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', function() {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.classList.add('flex');
                } else {
                    mobileMenu.classList.remove('flex');
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>

</body>

</html>
