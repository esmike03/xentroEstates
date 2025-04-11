<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquire About {{ $listing->title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-white flex items-center justify-center min-h-screen">

    <div class="max-w-lg w-full bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-black mb-4 text-center">Inquire about {{ $listing->title }}</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
                <strong class="font-bold">Success!</strong>
                <span class="block">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('inquiries.store', $listing->id) }}" method="POST" class="grid grid-cols-2 gap-4">
            @csrf

            <div>
                <label for="name" class="block text-black font-medium">Name</label>
                <input type="text" name="name" id="name" class="w-full text-gray-900 border border-gray-300 rounded-md py-2 px-3 focus:ring focus:ring-blue-300 focus:outline-none" required>
            </div>

            <div>
                <label for="email" class="block text-black font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full text-gray-900 border border-gray-300 rounded-md py-2 px-3 focus:ring focus:ring-blue-300 focus:outline-none" required>
            </div>

            <div>
                <label for="phone_number" class="block text-black font-medium">Contact Info</label>
                <input type="text" name="phone_number" id="phone_number" class="w-full text-gray-900 border border-gray-300 rounded-md py-2 px-3 focus:ring focus:ring-blue-300 focus:outline-none" required>
            </div>

            <div>
                <label for="address" class="block text-black font-medium">Address</label>
                <input type="text" name="address" id="address" class="w-full border text-gray-900 border-gray-300 rounded-md py-2 px-3 focus:ring focus:ring-blue-300 focus:outline-none" required>
            </div>

            <div class="col-span-2">
                <label for="message" class="block text-black font-medium">Message</label>
                <textarea name="message" id="message" class="w-full text-gray-900 border border-gray-300 rounded-md py-2 px-3 focus:ring focus:ring-blue-300 focus:outline-none" rows="4" required></textarea>
            </div>

            <div class="col-span-2">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-md transition duration-200">
                    Submit Inquiry
                </button>
            </div>
        </form>

    </div>

    <script>
        // Restrict contact number input to 11 digits
        document.getElementById('phone_number').addEventListener('input', function(event) {
            let numericValue = event.target.value.replace(/\D/g, '').slice(0, 11);
            event.target.value = numericValue;
        });
    </script>

</body>
</html>
