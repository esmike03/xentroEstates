<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $listing->title }}</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <link
  href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
  rel="stylesheet">
</head>
<body class="bg-gray-100 font-[Ubuntu]">

  <!-- Background Image -->
  <div class="relative min-h-screen bg-cover bg-center flex items-end "
       style="background-image: url('{{ asset('storage/' . $listing->image) }}');">

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black opacity-20"></div>

    <!-- Listing Details -->
    <div class="relative z-10 p-5 md:p-4  w-full bg-gradient-to-r from-black/90 to-transparent">
        <!-- Tags (For Sale, Condominium) -->
        <div class="flex space-x-2">
          <span class="bg-gray-800 text-white text-xs px-3 py-1 rounded-full">For Sale</span>
          <span class="bg-gray-800 text-white text-xs  px-3 py-1 rounded-full">Condominium</span>
        </div>

        <!-- Title -->
        <h1 class="text-xl md:text-2xl text-white font-bold mt-1 shd">{{ $listing->title }}</h1>

        <!-- Location -->
        <p class="text-white text-sm flex items-center mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 9a2 2 0 110-4 2 2 0 010 4z" />
          </svg>
          {{ $listing->address }}, {{ $listing->city }}
        </p>

        <!-- Price (Floating Style) -->
        <div class="absolute top-4 right-8 bg-gray-800 text-white text-lg px-4 py-1 rounded-lg shadow-lg">
          PHP {{ number_format($listing->price) }}
        </div>

        <!-- CTA Buttons -->
        <div class="mt-5  md:flex-row md:space-x-2">
          <a href="{{ route('user_listings.index') }}" class="w-full md:w-auto text-white  rounded-full font-semibold text-center">Back</a>
          <a href="{{ route('inquiries.create', $listing->id) }}" class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white py-2 px-2 rounded-lg font-semibold shadow-md text-center">Inquire Now</a>
        </div>
      </div>

  </div>

</body>
</html>
