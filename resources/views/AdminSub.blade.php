<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subdivisions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="p-4">
    <a class="text-2xl font-bold mb-4 cursor-pointer mr-3" href="/admin/dashboard">< Subdivisions</a>
    <a href="/create_subdivision" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded mb-4 inline-block">
        + Create Subdivision
    </a>
    <a href="/category_sub" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded mb-4 inline-block">
        Edit Category
    </a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

        @foreach($subdivisions as $subdivision)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('storage/' . $subdivision->image) }}" alt="Subdivision Image" class="w-full h-48 object-cover">

                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $subdivision->sub_name }}</h2>
                    <div class="flex justify-between">
                        <p class="text-gray-600">
                            <span class="font-medium">Blocks:</span> {{ $subdivision->block_number }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-medium">Lots:</span> {{ $subdivision->house_number }}
                        </p>
                    </div>

                    <a href="{{ route('subdivisions.details', $subdivision) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('edit_subdivision', $subdivision->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                        <i class="fa fa-pen"></i>
                    </a>
                    <form action="{{ route('delete_subdivision', $subdivision->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this subdivision? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
