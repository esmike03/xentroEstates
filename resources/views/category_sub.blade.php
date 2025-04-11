<!DOCTYPE html>
<html lang="en" x-data="{ showModal: false, selectedCategory: {}, actionUrl: '' }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50">

    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <a class="text-gray-600 hover:text-gray-900" href="/subdivisions">Back</a>
        <h2 class="text-2xl font-bold mb-6 text-center">Add Category</h2>

        <form action="/category/store" method="POST">
            @csrf
            <div class="mb-4">
                <label for="cat_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="cat_name" id="cat_name"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none" required>
            </div>

            <div class="mb-4">
                <label for="cat_price" class="block text-sm font-medium text-gray-700">Price per sqm</label>
                <input type="number" name="cat_price" id="cat_price"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            </div>
        </form>

        @if ($category->isEmpty())
            <p class="text-center text-gray-500 mt-5">No categories found.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200 mt-5">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Category Name</th>
                        <th class="py-2 px-4 border-b text-left">Price per sqm</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr class="cursor-pointer hover:bg-gray-50"
                            @click="
                                showModal = true;
                                selectedCategory = {
                                    id: {{ $cat->id }},
                                    cat_name: '{{ $cat->cat_name }}',
                                    cat_price: {{ $cat->cat_price }}
                                };
                                actionUrl = '/category/update/' + {{ $cat->id }};
                            ">
                            <td class="py-2 px-4 border-b">{{ $cat->cat_name }}</td>
                            <td class="py-2 px-4 border-b">₱{{ number_format($cat->cat_price, 2) }}</td>
                            <td>
                                <form action="/category/delete/{{ $cat->id }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black/70 bg-opacity-50 z-50"
        x-transition>
        <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
            <h2 class="text-xl font-bold mb-4">Edit Category</h2>
            <form :action="actionUrl" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" name="cat_name" x-model="selectedCategory.cat_name"
                        class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Price per sqm</label>
                    <input type="number" name="cat_price" x-model="selectedCategory.cat_price"
                        class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="showModal = false"
                        class="px-4 py-2 border rounded text-gray-700">Cancel</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
