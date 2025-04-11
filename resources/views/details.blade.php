<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subdivision->sub_name }} - Details</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-800 p-6 font-sans">
    <div class="flex gap-2 item-center">

        <a href="{{ route('subdivisions.index') }}"
            class="inline-block bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md mb-6 transition duration-200">
            Back
        </a>

        <h1 class="text-4xl font-bold text-gray-900 mb-6">{{ $subdivision->sub_name }}</h1>
    </div>


    <div class="flex flex-col md:flex-row gap-6 mb-6">
        <div class="w-full md:w-1/2 bg-white rounded-lg shadow-lg overflow-hidden">
            @if ($subdivision->image)
                <img src="{{ asset('storage/' . $subdivision->image) }}" alt="{{ $subdivision->sub_name }} Image"
                    class="w-full h-64 object-cover">
            @else
                <p class="text-center text-gray-500 italic py-6">No image available</p>
            @endif
        </div>
        <div class="w-full md:w-1/2 bg-white rounded-lg shadow-lg overflow-hidden">
            @if ($subdivision->plot)
                <img src="{{ asset('storage/' . $subdivision->plot) }}" alt="Subdivision Plot"
                    class="w-full h-64 object-cover">
            @else
                <p class="text-center text-gray-500 italic py-6">No plot image available</p>
            @endif
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Blocks & Houses</h2>

        @if ($blocks->isNotEmpty())
            @php $blockNumber = 1; @endphp
            @foreach ($blocks as $block)
                <div class="mb-6 border-b pb-6">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Block {{ $blockNumber++ }} ({{ $block->block_area }} sq meters)
                    </h3>
                    @if ($block->houses->isNotEmpty())
                        <ul class="mt-4 space-y-4">
                            @foreach ($block->houses as $house)
                                <li class="flex flex-col md:flex-row items-start justify-between">
                                    <div>
                                        <span class="font-medium text-gray-700">House
                                            {{ $house->assigned_house_number }}:</span>
                                        <span class="text-gray-600 capitalize">{{ $house->house_status }}</span>
                                    </div>
                                    <div>
                                        <span class="text-green-600 font-bold">
                                            PHP {{ number_format($house->house_price, 2) }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="font-medium text-gray-700">House Area:</span>
                                        {{ $house->house_area }} sq meters
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No houses available in this block.</p>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-gray-500">No blocks found in this subdivision.</p>
        @endif
    </div>

    {{-- Optional JavaScript --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let blockNumbers = document.querySelectorAll(".block-number");
            blockNumbers.forEach((block, index) => {
                console.log(`Block ${index + 1}:`, block.textContent);
            });
        });
    </script>
</body>

</html>
