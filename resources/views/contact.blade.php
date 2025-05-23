<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
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
                {{-- <a href="/user-listings1"
                    class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">Properties</a> --}}
                <a href="/about" class="text-white hover:text-yellow-500 hover:scale-105 transition duration-300">About
                    Us</a>
                <a href="/contact"
                    class="text-white border-b-yellow-500 border-b-2 hover:text-yellow-500 hover:scale-105 transition duration-300">Contact</a>

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
            <a href="/user-listings1"
                class="block py-3 px-4 hover:text-yellow-500 text-white hover:bg-gray-100">Properties</a>
            <a href="/about" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">About Us</a>
            <a href="/contact" class="block py-3 px-4 text-white hover:text-yellow-500 hover:bg-gray-100">Contact</a>

        </div>
    </header>
    <div class="max-w-2xl mx-auto bg-white p-6 sm:p-8 rounded-lg shadow-md mt-20">
        <h2 class="text-2xl sm:text-3xl font-semibold mb-6 text-center text-gray-800">Contact Us</h2>

        <div class="mb-4">
          <span class="block text-center text-gray-700">
            <span class="block font-medium text-center"><i class="fas fa-map-marker-alt text-gray-600 mr-3"></i>Main Office:</span>
            WPI Bldg., St. Peter St. Doña Maria Village 1, Punta Princesa, Cebu City
          </span>
        </div>

        <div class="flex items-center my-6">
          <div class="flex-grow border-t border-gray-300"></div>
          <span class="mx-4 text-lg sm:text-xl font-semibold text-gray-700 whitespace-nowrap">General Contact</span>
          <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <!-- Contacts -->
          <div>
            <div class="flex items-center mb-2">
              <i class="fas fa-phone-alt text-gray-600 mr-3"></i>
              <strong class="block font-medium">Phone:</strong>
            </div>
            <span class="block text-gray-700">(+63) 928-551-2464</span>
          </div>
          <div>
            <div class="flex items-center mb-2">
              <i class="fas fa-envelope text-gray-600 mr-3"></i>
              <strong class="block font-medium">Email:</strong>
            </div>
            <span class="block text-gray-700">xentroestateproperties@gmail.com</span>
          </div>
        </div>

        <div class="flex items-center my-6">
          <div class="flex-grow border-t border-gray-300"></div>
          <span class="mx-4 text-lg sm:text-xl font-semibold text-gray-700 whitespace-nowrap">Customer Inquiries</span>
          <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <div class="flex items-center mb-2">
              <i class="fas fa-phone-alt text-gray-600 mr-3"></i>
              <strong class="block font-medium">Phone:</strong>
            </div>
            <span class="block text-gray-700">(+63) 968-346-1315</span>
          </div>
          <div>
            <div class="flex items-center mb-2">
              <i class="fas fa-envelope text-gray-600 mr-3"></i>
              <strong class="block font-medium">Email:</strong>
            </div>
            <span class="block text-gray-700">xentroestatemktg@gmail.com</span>
          </div>
        </div>

        <div class="col-span-2 mt-6 w-full flex justify-center">
          <div>
            <div class="flex items-center my-6">
              <div class="flex-grow border-t border-gray-300"></div>
              <span class="mx-4 text-lg sm:text-xl font-semibold text-gray-700 whitespace-nowrap">Social Media</span>
              <div class="flex-grow border-t border-gray-300"></div>
            </div>
            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
              <a href="https://www.facebook.com/profile.php?id=61560303077270"
                class="text-blue-500 text-xl hover:underline"><i class="fab fa-facebook-f"></i> Facebook</a>
              <a href="https://www.youtube.com/@LandDeals-m9o" class="text-red-500 text-xl hover:underline"><i
                  class="fab fa-youtube"></i> YouTube</a>
            </div>
          </div>
        </div>
      </div>



</body>

</html>
