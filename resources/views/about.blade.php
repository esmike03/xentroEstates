<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100 font-[Ubuntu]">
    <header class="bg-zinc-800/90 shadow fixed w-full z-50 top-0 backdrop-filter backdrop-blur-xl bg-opacity-30">

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
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Home</a>
                <a href="/user/subdivisions"
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Subdivisions</a>
                {{-- <a href="user-listings1"
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Properties</a> --}}
                <a href="/about"
                    class="text-white border-b-yellow-500 border-b-2 hover:text-yellow-500 hover:scale-105 transition duration-300">About
                    Us</a>
                <a href="/contact"
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Contact</a>

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
            <a href="/user/subdivisions"
                class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">Subdivisions</a>
            {{-- <a href="user-listings1"
                class="block py-3 px-4 hover:text-yellow-500 text-white hover:bg-gray-100">Properties</a> --}}
            <a href="/about" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">About Us</a>
            <a href="/contact" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">Contact</a>

        </div>
    </header>
    <div class="container mx-auto p-8 max-w-5xl mt-20">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800">Xentro Estates Property Corp</h1>
            <p class="mt-2 text-lg text-gray-600">A real estate development company in the Visayas. That aims to
                establish itself as a trusted developer, strive to shape the future of real estate development, and
                become a trusted partner for those seeking quality properties in the region.</p>
        </div>

        <div class="flex justify-center items-center">
            <iframe width="640" height="360" src="https://www.youtube.com/embed/V3B95jE0Z9U"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>



        <div class="flex gap-4 mt-6">
            <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
                <h2 class="text-2xl font-semibold text-gray-700">Our Mission</h2>
                <p class="text-gray-600 mt-2">
                    Committed to creating sustainable communities that enhance the quality of life for residents while
                    contributing positively to the country's development.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
                <h2 class="text-2xl font-semibold text-gray-700">Our Vision</h2>
                <p class="text-gray-600 mt-2">
                    To be a leading developer that creates communities known for innovative design, quality projects,
                    and excellent service.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg mb-8 pr-20 pl-8">
                <h2 class="text-2xl font-semibold text-gray-700  pb-2">Core Values</h2>
                <ul class="text-gray-600 mt-4 space-y-2">
                    <li class="flex items-center">
                        <span class="text-blue-500 font-bold text-lg mr-2">✓</span> Integrity
                    </li>
                    <li class="flex items-center">
                        <span class="text-blue-500 font-bold text-lg mr-2">✓</span> Quality
                    </li>
                    <li class="flex items-center">
                        <span class="text-blue-500 font-bold text-lg mr-2">✓</span> Service
                    </li>
                </ul>
            </div>

        </div>

        <!-- CEO Section (Hardcoded) -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8 text-center">
            <h2 class="text-2xl font-semibold text-gray-700">Our CEO</h2>
            <div class="mt-4">
                <img src="{{ asset('images/ceo.jpg') }}" alt="CEO Image"
                    class="w-40 h-40 mx-auto rounded-full object-cover shadow-lg">
                <h3 class="font-semibold text-xl text-gray-800 mt-4">Efren "Renz" Adlaon </h3>
                <p class="text-sm text-gray-600">President & Chief Executive Officer</p>
                <p class="italic text-gray-700 mt-2">"Plan, Work and Execute."</p>
            </div>
        </div>

        <!-- Our Team Section -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700">Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                @foreach ($teamMembers as $member)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-md text-center">
                        <a href="{{ route('team.show', $member->id) }}" class="block">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}"
                                class="w-32 h-32 mx-auto rounded-full object-cover mb-3 transition-transform transform hover:scale-105">
                        </a>
                        <h3 class="font-semibold text-lg text-gray-800">{{ $member->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $member->position }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Gallery Section (Hardcoded) -->
        {{-- <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 text-center">Gallery</h2>
            <div class="relative overflow-hidden mt-4">
                <div id="gallery" class="flex space-x-4 overflow-x-auto scrollbar-hide p-2 cursor-grab">
                    <img src="{{ asset('images/28.png') }}" alt="Gallery Image 1"
                        class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
                    <img src="{{ asset('images/28.png') }}" alt="Gallery Image 2"
                        class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
                    <img src="{{ asset('images/28.png') }}" alt="Gallery Image 3"
                        class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
                    <img src="{{ asset('images/28.png') }}" alt="Gallery Image 4"
                        class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
                    <img src="{{ asset('images/28.png') }}" alt="Gallery Image 5"
                        class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
                    <img src="{{ asset('images/28.png') }}" alt="Gallery Image 6"
                        class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
                </div>
            </div>
        </div> --}}


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const menuToggle = document.getElementById('menu-toggle');
                const mobileMenu = document.getElementById('mobile-menu');

                if (menuToggle && mobileMenu) {
                    menuToggle.addEventListener('click', function() {
                        mobileMenu.classList.toggle('hidden');
                    });
                } else {
                    console.error('Menu toggle button or mobile menu not found');
                }
            });
        </script>
</body>

</html>
