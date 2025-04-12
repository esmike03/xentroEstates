<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Queries</title>
    <!-- Add Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="flex mb-6 item-center gap-3">
            <a href="/admin/dashboard" class="bg-gray-600 text-white p-1 px-2 rounded-md">Back</a>
            <h1 class="text-3xl font-semibold  text-gray-800">Subdivision Inqueries</h1>
        </div>


        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 overflow-x-auto" x-data="{ selected: null }">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($queries as $query)
                        <tr class="cursor-pointer hover:bg-gray-100" @click="selected = {{ $query->toJson() }}">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $query->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $query->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $query->phone_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div x-show="selected" x-cloak
                class="fixed inset-0 bg-black/80 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-black" @click="selected = null">
                        <i class="fas fa-times"></i>
                    </button>

                    <h2 class="text-2xl font-semibold mb-4 text-center">Inquiry Details</h2>
                    <div class="space-y-2">
                        <p><strong>Name:</strong> <span x-text="selected.name"></span></p>
                        <p><strong>Email:</strong> <span x-text="selected.email"></span></p>
                        <p><strong>Phone:</strong> <span x-text="selected.phone_number"></span></p>
                        <p><strong>Address:</strong> <span x-text="selected.address"></span></p>
                        <p><strong>Subdivision:</strong> <span x-text="selected.subdivision?.sub_name || 'N/A'"></span>
                        </p>
                        <p><strong>Subject:</strong> <span x-text="selected.purpose"></span></p>
                        <p><strong>Lot:</strong> <span x-text="selected.lot"></span></p>
                        <p><strong>Block:</strong> <span x-text="selected.block"></span></p>
                    </div>

                    <!-- Delete button -->
                    <form :action="'/admin/queries/' + selected.id" method="POST" class="mt-6 text-center"
                        @submit.stop>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md mt-3"
                            onclick="return confirm('Are you sure you want to delete this query?')">
                            <i class="fas fa-trash-alt mr-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
