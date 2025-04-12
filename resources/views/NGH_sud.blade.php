<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGH Subdivision</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-50 text-gray-900 font-[Ubuntu]">

    @if ($subdivision)
        <!-- Hero Section with Overlayed Details -->
        <!-- Hero Section with Overlayed Details -->
        <section
            class="relative h-screen md:h-screen lg:h-screen bg-cover bg-center flex items-center justify-center text-white"
            style="background-image: url('{{ asset('storage/' . $subdivision->image) }}');">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div>

                <div class="relative top-0 left-0 w-full px-6 pt-6 z-10 mb-4">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
                        @foreach ($gallery_images as $image)
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Gallery Image"
                                class="w-full h-32 md:h-40 object-cover rounded-lg shadow-xl">
                        @endforeach
                    </div>
                </div>
                <!-- Content Overlay -->
                <div class="relative text-center px-6">
                    <!-- Gallery Top Row -->

                    <h1 class="text-4xl  md:text-3xl font-bold uppercase">{{ $subdivision->sub_name }}</h1>
                    <p class="mt-1 text-lg md:text-sm max-w-3xl mx-auto">
                        {{ $subdivision->description }}
                    </p>

                    <div
                        class="mt-6 grid grid-cols-2 gap-6 max-w-md mx-auto border-white border-1 bg-opacity-80 p-2 rounded-lg text-gray-900 shadow-lg">
                        <div class="p-3 text-center">
                            <h3 class="text-lg font-semibold text-white">Blocks</h3>
                            <p
                                class="text-4xl font-bold bg-gradient-to-r from-yellow-500 via-yellow-300 to-yellow-600 text-transparent bg-clip-text">
                                {{ $subdivision->block_number }}</p>
                        </div>
                        <div class="p-3 text-center">
                            <h3 class="text-lg font-semibold text-white">Lots</h3>
                            <p
                                class="text-4xl font-bold bg-gradient-to-r from-yellow-500 via-yellow-300 to-yellow-600 text-transparent bg-clip-text">
                                {{ $subdivision->house_number }}
                            </p>

                        </div>
                    </div>

                    <!-- Inquire Button -->
                    <div class="mt-6">
                        <div class="">
                            <a href="#second"
                                class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition shadow-md">
                                INQUIRE NOW!
                            </a>
                            <div class="mt-4">
                                <a href="/user/subdivisions" class="cursor-pointer hover:text-gray-500">Back</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </section>
        <section id="second" class="transition-transform">

            <div id="blocks-container" class="mb-4">
                <!-- Existing Blocks -->
                @foreach ($subdivisions->blocks as $block)
                    <div class="bg-white rounded-lg p-6 mb-6">
                        <h3
                            class="text-xl font-semibold bg-gradient-to-r from-yellow-500 via-yellow-300 to-yellow-600 text-transparent bg-clip-text mb-4">
                            Block {{ $loop->iteration }}</h3>
                        <p class="text-gray-700 mb-2"><strong>Block Area:</strong> {{ $block->block_area }} sq meters
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($block->houses as $house)
                                <a
                                    href="{{ route('sub_queries.create', [
                                        'subdivision_id' => $subdivision->id,
                                        'block_id' => $block->id,
                                        'house_id' => $house->id,
                                        'block_number' => $loop->iteration,
                                        'lot_no' => $house->assigned_house_number,
                                        'area' => $house->house_area,
                                        'cat' => $house->category,
                                        'status' => $house->house_status,
                                    ]) }}">

                                    <div
                                        class="bg-gray-100 p-4 rounded shadow-sm hover:scale-105 cursor-pointer transition-transform">
                                        <div class="flex justify-between items-center mb-2">
                                            <p><strong>Lot No:</strong> {{ $house->assigned_house_number }}</p>

                                            <div class="gap-2 flex">
                                                <span
                                                    class="{{ $house->category == 'Available' ? 'text-white bg-green-500 p-1 rounded-lg px-2 shadow-md' : 'text-white bg-gray-500 p-1 rounded-lg px-2 shadow-md' }}">
                                                    {{ $house->category }}
                                                </span>
                                                <span
                                                    class="{{ $house->house_status == 'Available' ? 'text-white bg-green-500 p-1 rounded-lg px-2 shadow-md' : 'text-white bg-red-500 p-1 rounded-lg px-2 shadow-md' }}">
                                                    {{ $house->house_status }}
                                                </span>

                                            </div>


                                        </div>
                                        <p><strong>Lot Area:</strong> {{ $house->house_area }} m²</p>

                                        @php
                                            $catPrice = $categorys->firstWhere('cat_name', $house->category)
                                                ?->cat_price;
                                            $totalPrice =
                                                $catPrice && $house->house_area ? $catPrice * $house->house_area : null;
                                        @endphp
                                        <p><strong>Price per sqm:</strong>
                                            @if ($catPrice)
                                                <span class="text-gray-500">(₱{{ number_format($catPrice, 2) }} per
                                                    sqm)</span>
                                            @else
                                                Not available
                                            @endif
                                        </p>
                                        <p class="text-right ">
                                            @if ($totalPrice)
                                                <span
                                                    class="bg-gradient-to-r from-yellow-500 via-yellow-300 to-yellow-600 shadow-lg text-white px-2 py-1 rounded-md font-bold text-lg">₱
                                                    {{ number_format($totalPrice, 2) }}</span>
                                            @else
                                                Not available
                                            @endif
                                        </p>



                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach


            </div>
        </section>
    @else
        <p class="text-center text-red-500 font-semibold mt-16">Subdivision not found.</p>
    @endif


</body>

</html>
