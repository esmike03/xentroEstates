    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NGH Subdivision</title>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
            href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
            rel="stylesheet">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="bg-gray-50 text-gray-900 font-[Ubuntu]" x-data="{ showModal: false, showVideoModal: false }">

        @if ($subdivision)
            <!-- Hero Section with Overlayed Details -->
            <!-- Hero Section with Overlayed Details -->
            <section
                class="relative h-screen md:h-screen lg:h-screen bg-cover bg-center flex items-center justify-center text-white"
                style="background-image: url('{{ asset('storage/' . $subdivision->image) }}');">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div>

                    <div class="relative top-0 left-0 w-full px-6 pt-6 z-10 mb-4">
                        <div class="justify-center gridz md:grid-cols-4 gap-4 max-w-6xl mx-auto">
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
                        @if($subdivision->video)

                        <button @click="showVideoModal = true"
                            class="text-yellow-400 underline hover:text-yellow-600 cursor-pointer font-medium">
                            <i class="fa fa-video"> </i> Walkthrough video
                        </button>
                        @endif

                        <div x-show="showVideoModal"
                            class="fixed inset-0 flex items-center justify-center bg-black/70 z-50"
                            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                            <!-- Modal Content -->
                            <div @click.away="showVideoModal = false"
                                class="bg-white rounded-lg overflow-hidden shadow-lg w-full max-w-2xl p-4">
                                @if ($subdivision->video)
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-xl font-semibold text-gray-700">Walkthrough Video</h2>
                                    <button @click="showVideoModal = false"
                                        class="text-gray-500 hover:text-gray-800 text-3xl leading-none">&times;</button>
                                </div>
                            @endif


                                <div>
                                    <video controls class="w-full rounded">
                                        <source src="{{ asset('storage/' . $subdivision->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>


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
                                <a @click="showModal = true"
                                    class="bg-green-600 cursor-pointer text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition shadow-md">
                                    INQUIRE NOW!
                                </a>
                                <div class="mt-4">
                                    <a href="/user/subdivisions" class="cursor-pointer hover:text-gray-500">Back</a>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>
                <p class="absolute bottom-3 text-center text-gray-400">Scroll to see plot area</p>

            </section>
            <section class="relative h-screen md:h-screen lg:h-screen bg-cover pb-4 bg-center px-8 pt-6 justify-center">
                <h1 class="font-semibold text-2xl text-center mb-6">Plot Area</h1>
                @if ($subdivision)
                    <div class="mb-4 pb-10">
                        <img src="{{ asset('storage/' . $subdivision->plot) }}" alt="{{ $subdivision->sub_name }}"
                            class="w-full h-auto rounded mb-4">
                    </div>
                @endif
            </section>
            <a href="#"
                class="transition-transform bg-amber-400 p-2 px-3 bottom-4 fixed rounded-lg text-white right-4 ">
                <i class="fas fa-arrow-up "></i>
            </a>

            <!-- Modal -->
            <div x-init="$watch('showModal', value => {
                if (value) document.body.classList.add('overflow-hidden');
                else document.body.classList.remove('overflow-hidden');
            })">
                <!-- Trigger Button -->


                <!-- Modal Overlay -->
                <div x-show="showModal"
                    class="fixed inset-0 bg-black/60 bg-opacity-50 flex items-center justify-center z-50"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <!-- Modal Content -->
                    <div @click.away="showModal = false"
                        class="bg-white mx-4 rounded-lg shadow-xl max-h-[90vh] overflow-y-auto w-full max-w-5xl px-1">
                        <div class="flex justify-between items-center mb-1">
                            <h2 class=" text-gray-700"></h2>
                            <button @click="showModal = false"
                                class="text-gray-500 hover:text-gray-800 text-5xl mr-3 cursor-pointer">&times;</button>
                        </div>

                        <!-- Existing Blocks (from your original section) -->
                        <div id="blocks-container" class="mb-4">
                            @foreach ($subdivisions->blocks as $block)
                                <div class="bg-white rounded-lg px-6 mb-6">
                                    <h3
                                        class="text-xl font-semibold bg-gradient-to-r from-yellow-500 via-yellow-300 to-yellow-600 text-transparent bg-clip-text mb-4">
                                        Block {{ $loop->iteration }}</h3>
                                    <p class="text-gray-700 mb-2"><strong>Block Area:</strong> {{ $block->block_area }}
                                        sq
                                        meters</p>

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
                                                        <p><strong>Lot No:</strong> {{ $house->assigned_house_number }}
                                                        </p>
                                                        <div class="gap-2 flex text-xs">
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
                                                    <p class="text-sm"><strong>Lot Area:</strong>
                                                        {{ $house->house_area }} m²</p>

                                                    @php
                                                        $catPrice = $categorys->firstWhere('cat_name', $house->category)
                                                            ?->cat_price;
                                                        $totalPrice =
                                                            $catPrice && $house->house_area
                                                                ? $catPrice * $house->house_area
                                                                : null;
                                                    @endphp

                                                    <p class="text-sm"><strong>Price per sqm:</strong>
                                                        @if ($catPrice)
                                                            <span
                                                                class="text-gray-500">(₱{{ number_format($catPrice, 2) }}
                                                                per sqm)</span>
                                                        @else
                                                            Not available
                                                        @endif
                                                    </p>
                                                    <p class="text-right">
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
                    </div>
                </div>
            </div>
        @else
            <p class="text-center text-red-500 font-semibold mt-16">Subdivision not found.</p>
        @endif


    </body>

    </html>
