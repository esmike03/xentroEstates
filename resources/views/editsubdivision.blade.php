<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subdivision</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <div class="container mx-auto p-4">
        <div class="flex gap-3 mb-4 items-center">

            <a href="/subdivisions" class="bg-gray-600 p-1 rounded-md text-white px-2">
                Back
            </a>
            <h1 class="text-2xl font-semibold ">Edit Subdivision</h1>
        </div>

        <!-- Main Update Form -->
        <form action="{{ route('update_subdivision', $subdivision->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-100 text-green-600 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <label class="text-gray-700 font-bold mb-2">Subdivision Name</label>
                <input type="text" name="sub_name" class="w-full border rounded py-2 px-3"
                    value="{{ $subdivision->sub_name }}" required>
            </div>

            <div class="mb-4">
                <label class="text-gray-700 font-bold mb-2">Location</label>
                <input type="text" name="location" class="w-full border rounded py-2 px-3"
                    value="{{ $subdivision->location }}" required>
            </div>

            <div class="mb-4">
                <label class="text-gray-700 font-bold mb-2">Description</label>
                <input type="text" name="description" class="w-full border rounded py-2 px-3"
                    value="{{ $subdivision->description }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Subdivision Image</label>
                <input type="file" name="sub_image" class="w-full border rounded py-2 px-3" accept="image/*">
                @if ($subdivision->image)
                    <img src="{{ asset('storage/' . $subdivision->image) }}" alt="Current Subdivision Image"
                        class="mt-2 max-w-xs">
                @endif
            </div>

            <!-- Plot Image Field -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Plot Image</label>
                <input type="file" name="plot" class="w-full border rounded py-2 px-3" accept="image/*">
                @if ($subdivision->plot)
                    <img src="{{ asset('storage/' . $subdivision->plot) }}" alt="Current Plot Image"
                        class="mt-2 max-w-xs">
                @endif
            </div>
            <h2 class="text-2xl font-bold mb-4 ">Upload a Video</h2>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="video">Choose Video File</label>
                <input type="file" name="video" accept="video/*" required class="w-full border rounded px-3 py-2">
                @error('video')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            @if ($subdivision->video)
                <div class="mt-4">
                    <video controls class="w-full max-w-md rounded">
                        <source src="{{ asset('storage/' . $subdivision->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endif




            <!-- Blocks Section -->
            <div id="blocks-container" class="mb-4">
                <h2 class="text-xl font-semibold">Blocks</h2>
                <!-- Existing Blocks -->
                @foreach ($subdivision->blocks as $block)
                    <div class="block p-4 border mb-4" data-block-id="{{ $block->id }}">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold">Block {{ $loop->iteration }}</h3>
                            <!-- Delete Block Button (calls JS function) -->
                            <button type="button" class="bg-red-500 text-white px-3 py-1 rounded"
                                onclick="deleteBlock({{ $block->id }})">
                                Delete Block
                            </button>
                        </div>

                        <input type="hidden" name="blocks[{{ $block->id }}][block_number]"
                            value="{{ $loop->iteration }}">
                        <label class="block text-gray-700 font-bold mt-2">Block Area (sq meters)</label>
                        <input type="number" name="blocks[{{ $block->id }}][block_area]"
                            class="w-full border rounded py-2 px-3 mb-2" value="{{ $block->block_area }}"
                            step="any" required>

                        <div class="houses-container mb-2">
                            @foreach ($block->houses as $house)
                                <div class="mb-2 border p-2 rounded">
                                    <div class="flex justify-between items-center">
                                        <div class=" flex justify-between">
                                            <label>Lot Number</label>
                                            <label class="ml-28">Lot Area</label>
                                        </div>

                                        <!-- Delete House Button (calls JS function) -->
                                        <button type="button" class="bg-red-500 text-white px-2 py-1 rounded"
                                            onclick="deleteHouse({{ $house->id }})">
                                            Delete House
                                        </button>
                                    </div>
                                    <input type="text"
                                        name="blocks[{{ $block->id }}][houses][{{ $house->id }}][assigned_house_number]"
                                        class="border rounded px-2 py-1" value="{{ $house->assigned_house_number }}"
                                        required>
                                    <input type="text"
                                        name="blocks[{{ $block->id }}][houses][{{ $house->id }}][house_area]"
                                        class="border rounded px-2 py-1" value="{{ $house->house_area }}" required>

                                    <input type="hidden"
                                        name="blocks[{{ $block->id }}][houses][{{ $house->id }}][block_id]"
                                        value="{{ $block->id }}">
                                    <label class="block text-gray-700 font-bold mt-2">Category</label>
                                    <select name="blocks[{{ $block->id }}][houses][{{ $house->id }}][category]"
                                        class="w-full border rounded py-2 px-3" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categorys as $cat)
                                            <option value="{{ $cat->cat_name }}"
                                                {{ isset($house->category) && $house->category == $cat->cat_name ? 'selected' : '' }}>
                                                {{ $cat->cat_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label class="block text-gray-700 font-bold mt-2">TCP</label>
                                    <p class="p-2 border rounded-md">
                                        @php
                                            $catPrice = $categorys->firstWhere('cat_name', $house->category)
                                                ?->cat_price;
                                            $totalPrice =
                                                $catPrice && $house->house_area ? $catPrice * $house->house_area : null;
                                        @endphp

                                        @if ($totalPrice)
                                            <strong>₱{{ number_format($totalPrice, 2) }}</strong>
                                        @else
                                            Not available
                                        @endif
                                    </p>



                                    <label class="block text-gray-700 font-bold mt-2">Lot Status</label>
                                    <select
                                        name="blocks[{{ $block->id }}][houses][{{ $house->id }}][house_status]"
                                        class="w-full border rounded py-2 px-3" required>
                                        <option value="Available"
                                            {{ $house->house_status == 'Available' ? 'selected' : '' }}>Available
                                        </option>
                                        <option value="Reserved"
                                            {{ $house->house_status == 'Reserved' ? 'selected' : '' }}>Reserved
                                        </option>
                                    </select>
                                </div>
                            @endforeach
                        </div>
                        <button type="button"
                            class="add-house-existing bg-gray-500 text-white px-3 py-1 rounded mt-2">Add Lot</button>
                    </div>
                @endforeach

                <!-- Button to add new block -->
                <button type="button" id="add-block" class="bg-blue-500 text-white px-4 py-2 rounded">Add
                    Block</button>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded mt-4">Update</button>
        </form>

        <!-- Hidden forms for deletion (placed outside the main update form) -->
        <form id="delete-block-form" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <form id="delete-house-form" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

    </div>
    <div class="mx-auto px-20 mt-6">

        <div class="mx-auto px-20 mt-6 max-w-3xl">
            <h1 class="text-2xl font-bold mb-4">Add Gallery Image</h1>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                    <ul class="list-disc ml-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white p-6 rounded-lg shadow-md space-y-4">
                @csrf

                <input type="hidden" name="subdivision_id" value="{{ $subdivision->id }}">

                <div>
                    <label for="image" class="block font-medium mb-1">Select Image</label>
                    <input type="file" name="image" id="image"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                        required>
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                        Upload
                    </button>
                </div>
            </form>

            <!-- Gallery Images Display with Delete Function -->
            <div class="relative top-0 left-0 w-full px-6 pt-6 z-10 mb-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
                    @foreach ($gallery_images as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Gallery Image"
                                class="w-full h-32 md:h-40 object-cover rounded-lg shadow-xl">
                            <!-- Delete button overlay (visible on hover) -->
                            <form action="{{ route('gallery.destroy', $image->id) }}" method="POST"
                                class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this image?')"
                                    class="bg-red-500 text-white rounded-full p-2">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize blockCount to the number of existing blocks
            let blockCount = {{ $subdivision->blocks->count() }};

            // Add event listener for adding houses in existing blocks
            document.querySelectorAll('.block[data-block-id]').forEach(blockDiv => {
                blockDiv.querySelector('.add-house-existing').addEventListener('click', function() {
                    const houseContainer = blockDiv.querySelector('.houses-container');
                    // Calculate new house index based on current houses
                    const houseIndex = houseContainer.children.length + 1;
                    // Get the existing block id from data attribute
                    const blockId = blockDiv.getAttribute('data-block-id');

                    const houseDiv = document.createElement('div');
                    houseDiv.classList.add('mb-2');
                    houseDiv.innerHTML = `
            <label>Lot Number</label>
            <input type="text" name="blocks[${blockId}][houses][new_${houseIndex}][assigned_house_number]" class="border rounded px-2 py-1" required>
            <input type="hidden" name="blocks[${blockId}][houses][new_${houseIndex}][block_id]" value="${blockId}">
            <label class="block text-gray-700 font-bold mt-2">Lot Area (sq meters)</label>
            <input type="number" name="blocks[${blockId}][houses][new_${houseIndex}][house_area]" class="w-full border rounded py-2 px-3" step="any" min="0" required>
            <label class="block text-gray-700 font-bold mt-2">Category</label>
            <select name="blocks[${blockId}][houses][new_${houseIndex}][category]"
                                        class="w-full border mt-1 rounded py-2 px-3" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categorys as $cat)
                                            <option value="{{ $cat->cat_name }}"
                                                {{ isset($house->category) && $house->category == $cat->cat_name ? 'selected' : '' }}>
                                                {{ $cat->cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
            <label class="block text-gray-700 font-bold mt-2">Lot Status</label>
            <select name="blocks[${blockId}][houses][new_${houseIndex}][house_status]" class="w-full border rounded py-2 px-3" required>
              <option value="Available">Available</option>
              <option value="Reserved">Reserved</option>
            </select>
          `;
                    houseContainer.appendChild(houseDiv);
                });
            });

            // Add event listener for adding new blocks
            document.getElementById('add-block').addEventListener('click', function() {
                const blockContainer = document.getElementById('blocks-container');

                blockCount++; // Increment the counter for the new block
                console.log("New block index:", blockCount);

                const blockDiv = document.createElement('div');
                blockDiv.classList.add('block', 'p-4', 'border', 'mb-4');
                // For new blocks, we use a naming convention with "new_" prefix.
                blockDiv.innerHTML = `
          <h3 class="text-lg font-bold">Block ${blockCount}</h3>
          <input type="hidden" name="blocks[new_${blockCount}][block_number]" value="${blockCount}">
          <label class="block text-gray-700 font-bold mt-2">Block Area (sq meters)</label>
          <input type="number" name="blocks[new_${blockCount}][block_area]" class="w-full border rounded py-2 px-3 mb-2" step="any" required>
          <div class="houses-container mb-2"></div>
          <button type="button" class="add-house-new bg-gray-500 text-white px-3 py-1 rounded mt-2">Add Lot</button>
        `;
                // Insert the new block before the "Add Block" button
                blockContainer.insertBefore(blockDiv, document.getElementById('add-block'));

                // Attach event listener for the add house button in this new block
                blockDiv.querySelector('.add-house-new').addEventListener('click', function() {
                    const houseContainer = blockDiv.querySelector('.houses-container');
                    const houseIndex = houseContainer.children.length + 1;
                    const houseDiv = document.createElement('div');
                    houseDiv.classList.add('mb-2');
                    houseDiv.innerHTML = `
            <label>Lot Number</label>
            <input type="text" name="blocks[new_${blockCount}][houses][new_${houseIndex}][assigned_house_number]" class="border rounded px-2 py-1" required>
            <input type="hidden" name="blocks[new_${blockCount}][houses][new_${houseIndex}][block_id]" value="${blockCount}">
            <label class="block text-gray-700 font-bold mt-2">Lot Area (sq meters)</label>
            <input type="number" name="blocks[new_${blockCount}][houses][new_${houseIndex}][house_area]" class="w-full border rounded py-2 px-3" step="any" min="0" required>
            <label class="block text-gray-700 font-bold mt-2">Lot Price (PHP)</label>
            <input type="number" name="blocks[new_${blockCount}][houses][new_${houseIndex}][house_price]" class="w-full border rounded py-2 px-3" step="any" min="0" required>
            <label class="block text-gray-700 font-bold mt-2">Lot Status</label>
            <select name="blocks[new_${blockCount}][houses][new_${houseIndex}][house_status]" class="w-full border rounded py-2 px-3" required>
              <option value="Available">Available</option>
              <option value="Reserved">Reserved</option>
            </select>
          `;
                    houseContainer.appendChild(houseDiv);
                });
            });
        });

        // Extra safeguard to prevent negative values for house price
        document.addEventListener('input', function(event) {
            if (event.target.classList.contains('house-price') && event.target.value < 0) {
                event.target.value = 0;
            }
        });

        function deleteBlock(blockId) {
            if (confirm('Are you sure you want to delete this block? This will delete all its houses as well.')) {
                var form = document.getElementById('delete-block-form');
                form.action = "{{ url('') }}" + "/block/" + blockId;
                form.submit();
            }
        }

        // Function to handle house deletion using the hidden form
        function deleteHouse(houseId) {
            if (confirm('Are you sure you want to delete this house?')) {
                var form = document.getElementById('delete-house-form');
                form.action = "{{ url('') }}" + "/house/" + houseId;
                form.submit();
            }
        }
    </script>
</body>

</html>
