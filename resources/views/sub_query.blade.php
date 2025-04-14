<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Query</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-white min-h-screen flex items-center justify-center font-[Ubuntu]">
    <div class="max-w-3xl w-full bg-white shadow-lg rounded-lg px-6">
        <div class="flex items-center w-full mb-4 py-4">
            <a href="javascript:history.back()" class="bg-gray-600 text-white p-1 px-2 rounded-lg mr-4">Back</a>
            <h1 class="text-2xl font-semibold text-center text-black">Submit Your Query</h1>
        </div>
        @if (session('success'))
            <div id="successModal"
                class="fixed inset-0 bg-black/50 backdrop-blur-xs bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white mx-4 p-3 py-4 rounded-lg shadow-lg text-center max-w-md w-full relative">
                    <!-- Close X button -->
                    <button onclick="closeModal()"
                        class="absolute top-2 right-4 text-gray-500 hover:text-red-500 text-3xl cursor-pointer">
                        &times;
                    </button>

                    <i class="fa fa-check-circle text-green-500 text-4xl mb-2"></i>
                    <h2 class="text-2xl font-semibold text-green-600 mb-2">Submit Successfully!</h2>
                    <p class="text-gray-600 mb-4">Our team will reach out to you soon to assist with your
                        inquiry.
                    </p>
                    <div class="flex items-center px-4 gap-2 mt-5">

                        <div class="border-b-2 border-gray-300 flex-grow"></div>
                        <p class="text-gray-500 text-sm">Contact Us</p>
                        <div class="border-b-2 border-gray-300 flex-grow"></div>
                    </div>

                    <div class="flex justify-center px-2 items-center flex-wrap gap-4 mt-5 w-full">
                        <div class="flex items-center gap-2 text-gray-600 text-xs">
                            <i class="fa fa-phone"></i>
                            <span>(+63) 928-551-2464</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600 text-xs">
                            <i class="fa fa-envelope"></i>
                            <span>xentroestateproperties@gmail.com</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600 text-xs">
                            <a href="/">
                                <i class="fa fa-globe"></i>
                                <span>www.xentroestates.com</span>

                            </a>

                        </div>
                    </div>

                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if ($subdivision)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $subdivision->plot) }}" alt="{{ $subdivision->sub_name }}"
                    class="w-full h-auto rounded">
            </div>
        @endif

        <form action="{{ route('sub_queries.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="subdivision_id" value="{{ $subdivision->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-gray-800 font-bold">Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full border border-gray-600 rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black"
                        required>
                </div>
                <div>
                    <label for="email" class="block text-gray-800 font-bold">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full border border-gray-600 rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black"
                        required>
                </div>
                <div>
                    <label for="phone_number" class="block text-gray-800 font-bold">Contact Number</label>
                    <input type="tel" name="phone_number" id="phone_number"
                        class="w-full border-gray-600 border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black"
                        pattern="\d{10,11}" placeholder="10-11 digit phone number" required>
                </div>
                <div>
                    <label for="address" class="block text-gray-800 font-bold">Address</label>
                    <input type="text" name="address" id="address"
                        class="w-full border border-gray-600 rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black"
                        required>
                </div>
                <div class="flex gap-4 w-full">
                    <div>
                        <label for="block" class="block text-gray-800 font-bold">Interested at Block</label>
                        <input type="text" value="{{ $block }}" readonly name="block" id="block"
                            class="w-full border-gray-600 border rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black"
                            required>
                    </div>
                    <div>
                        <label for="lot" class="block text-gray-800 font-bold">Interested at Lot</label>
                        <input type="text" value="{{ $lotNo }}" readonly name="lot" id="lot"
                            class="w-full border border-gray-600 rounded py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black"
                            required>
                    </div>

                </div>

            </div>

            <div>
                <label for="purpose" class="block text-gray-800 font-bold">Subject</label>
                <textarea name="purpose" id="purpose"
                    class="w-full border rounded border-gray-600 py-2 px-3 focus:ring-2 focus:ring-blue-400 bg-white text-black"
                    placeholder="e.g. Pricing, features, etc." required></textarea>
            </div>

            <button type="submit"
                class="w-full mb-2 cursor-pointer hover:scale-105 shadow-md bg-gradient-to-r from-yellow-500 via-yellow-300 to-yellow-600 text-white py-2 px-4 rounded-lg transition duration-300">
                Submit
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
