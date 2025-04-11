<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Your Query</title>
  <link
  href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
  rel="stylesheet">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>
<body class="bg-white min-h-screen flex items-center justify-center font-[Ubuntu]">
    <div class="max-w-3xl w-full bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-4 text-center text-black">Submit Your Query</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if($subdivision)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $subdivision->plot) }}" alt="{{ $subdivision->sub_name }}" class="w-full h-auto rounded">
            </div>
        @endif

        <form action="{{ route('sub_queries.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="subdivision_id" value="{{ $subdivision->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-black font-bold">Name</label>
                    <input type="text" name="name" id="name" class="w-full border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black" required>
                </div>
                <div>
                    <label for="email" class="block text-black font-bold">Email</label>
                    <input type="email" name="email" id="email" class="w-full border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black" required>
                </div>
                <div>
                    <label for="phone_number" class="block text-black font-bold">Contact Number</label>
                    <input type="tel" name="phone_number" id="phone_number" class="w-full border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black"
                        pattern="\d{10,11}" placeholder="Enter 10-11 digit phone number" required>
                </div>
                <div>
                    <label for="address" class="block text-black font-bold">Address</label>
                    <input type="text" name="address" id="address" class="w-full border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black" required>
                </div>
                <div>
                    <label for="block" class="block text-black font-bold">Interested at Block</label>
                    <input type="text" value="{{$block}}" name="block" id="block" class="w-full border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black" required>
                </div>
                <div>
                    <label for="lot" class="block text-black font-bold">Interested at Lot</label>
                    <input type="text" value="{{$lotNo}}" name="lot" id="lot" class="w-full border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black" required>
                </div>
            </div>

            <div>
                <label for="purpose" class="block text-black font-bold">Subject</label>
                <textarea name="purpose" id="purpose" class="w-full border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black" placeholder="e.g. Pricing, features, etc." required></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition duration-300">
                Submit Query
            </button>
        </form>
    </div>


    <script>
        document.getElementById('phone_number').addEventListener('input', function(event) {
            let inputValue = event.target.value.replace(/\D/g, '');
            if (inputValue.length > 11) inputValue = inputValue.slice(0, 11);
            event.target.value = inputValue;
        });
    </script>
</body>
</html>
