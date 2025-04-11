<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link
    href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-100 font-[Ubuntu]">
    <header class="bg-zinc-800 shadow fixed w-full z-50 top-0 backdrop-filter backdrop-blur-xl bg-opacity-30">

        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2">
                <!-- Image (JFIF format) -->
                <img src="{{ asset('images/XENTROESTATES2.png') }}" alt="Xentro Estates Logo"
                    class="w-20 object-cover">
                <p class="text-white font-bold">Xentro Estates Property Corp.</p>
            </a>

            <!-- Navigation Menu (Desktop) -->
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Home</a>
                <a href="/user-listings1"
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Properties</a>
                <a href="/about" class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">About Us</a>
                <a href="/contact" class="text-white border-b-yellow-500 border-b-2 hover:text-yellow-500 hover:scale-105 transition duration-300">Contact</a>
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
            <a href="/user-listings1" class="block py-3 px-4 hover:text-yellow-500 text-white hover:bg-gray-100">Properties</a>
            <a href="/about" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">About Us</a>
            <a href="/contact" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">Contact</a>
            <a href="/user/subdivisions" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">Subdivisions</a>
        </div>
    </header>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-26">
        <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Contact Information</h2>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="flex items-center mb-2">
                    <i class="fas fa-map-marker-alt text-gray-600 mr-3"></i>
                    <strong class="block font-medium">Address:</strong>
                </div>
                <span class="block text-gray-700">WPI Bldg., St. Peter St. Doña Maria Village 1, Punta Princesa, Cebu City</span>
            </div>

            <div>
                <div class="flex items-center mb-2">
                    <i class="fas fa-phone-alt text-gray-600 mr-3"></i>
                    <strong class="block font-medium">Phone:</strong>
                </div>
                <span class="block text-gray-700">(+63) 9XX-XXX-XXXX</span>
            </div>

            <div>
                <div class="flex items-center mb-2">
                    <i class="fas fa-envelope text-gray-600 mr-3"></i>
                    <strong class="block font-medium">Email:</strong>
                </div>
                <span class="block text-gray-700">xentrostateproperties@gmail.com</span>
            </div>

            {{-- <div>
                <div class="flex items-center mb-2">
                    <i class="fas fa-globe text-gray-600 mr-3"></i>
                    <strong class="block font-medium">Website:</strong>
                </div>
                <a href="https://www.example.com" class="text-blue-500 hover:underline">www.example.com</a>
            </div> --}}

            <div class="col-span-2">
                <div class="flex items-center mb-2">
                    <strong class="block font-medium">Social Media:</strong>
                </div>
                <div class="flex space-x-4">
                    <a href="" class="text-blue-500 hover:underline"><i class="fab fa-facebook-f"></i> Facebook</a>

                </div>
            </div>
        </div>
    </div>


</body>
</html>
