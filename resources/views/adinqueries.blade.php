<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Xentro Estates</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet" />
    <!-- Include your Tailwind CSS build here -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        /* Optional: A little styling for the toast */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: rgba(255, 55, 55, 0.894);
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            z-index: 1000;
            opacity: 0.9;
        }
    </style>
</head>

<body class="font-[Nunito_Sans]">
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <!-- Wrap all form elements inside a form tag with an id -->
        <div class="bg-white px-6 pb-6 rounded-lg shadow-md w-full max-w-lg">


            <form id="myForm" action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <a href="/">
                    <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3)), url('{{ asset('images/33052.png') }}'); background-size: cover; background-position: center; border-radius: 0px;"
                        class="w-full flex justify-center">
                        <img src="{{ asset('images/XENTROESTATES2.png') }}" class="w-40 p-2"
                            alt="Xentro Estates Logo" />
                    </div>
                </a>



                <h1 class="text-2xl font-bold mb-6 mt-4   ">
                    <span class="border-b-2">
                        <i class="fa-solid fa-calendar-days"></i> Bo</span>ok a Viewing
                </h1>

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
                            <h2 class="text-2xl font-semibold text-green-600 mb-2">Booked Successfully!</h2>
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

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div id="successMessage"
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-5000">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-2 gap-3">
                    <!-- First Name -->
                    <div class="mb-4">
                        <label for="fname" class="block text-gray-900 font-medium mb-1">First Name</label>
                        <input type="text" value="{{ old('fname') }}" id="fname" name="fname" placeholder="First Name"
                            class="w-full border-b-2 border-gray-900 p-2 focus:outline-none bg-gray-100" />
                    </div>

                    <!-- Last Name -->
                    <div class="mb-4">
                        <label for="lname" class="block text-gray-900 font-medium mb-1">Last Name</label>
                        <input type="text" id="lname" value="{{ old('lname') }}" name="lname" placeholder="Last Name"
                            class="w-full border-b-2 border-gray-900 p-2 focus:outline-none bg-gray-100" />
                    </div>
                </div>
                <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-x-3">
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-900 font-medium mb-1">Email</label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email" placeholder="Email"
                            class="w-full border-b-2 border-gray-900 p-2 focus:outline-none bg-gray-100" />
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-900 font-medium mb-1">Phone Number</label>
                        <input type="tel" id="phone" value="{{ old('phone') }}" name="phone" placeholder="Phone Number"
                            class="w-full border-b-2 border-gray-900 p-2 focus:outline-none bg-gray-100"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="11" />
                    </div>


                    <!-- Property to Visit -->
                    <div class="mb-4">
                        <label for="property" class="block text-gray-900 font-medium mb-1">Property to Visit</label>
                        <input type="text" value="{{ old('property') }}" id="property" name="property" placeholder="Property to Visit"
                            class="w-full border-b-2 border-gray-900 p-2 focus:outline-none bg-gray-100" />
                    </div>

                    <!-- Inquiring for Whom -->
                    <div class="mb-4">
                        <label for="inquiring" class="block text-gray-900 font-medium mb-1">Inquiring for Whom</label>
                        <select id="inquiring" name="inquiring"
                            class="w-full border-b-2 border-gray-900 p-2 focus:outline-none bg-gray-100">
                            <option value="">Select an option</option>
                            <option value="self">Inquiring for Self</option>
                            <option value="parents">Inquiring for Parents</option>
                            <option value="realtor">Inquiring for Realtor</option>
                        </select>
                    </div>
                </div>

                <!-- Preferred Communication Platform -->
                <div class="mb-4">
                    <label class="block text-gray-900 font-medium mb-2">Preferred Communication Platform</label>
                    <div class="flex flex-wrap gap-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="communication[]" value="email" class="accent-blue-500">
                            <span>Email</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="communication[]" value="whatsapp" class="accent-green-500">
                            <span>Whatsapp</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="communication[]" value="viber" class="accent-purple-500">
                            <span>Viber</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="communication[]" value="messenger" class="accent-blue-400">
                            <span>Messenger</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="communication[]" value="wechat" class="accent-green-400">
                            <span>WeChat</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="communication[]" value="sms" class="accent-gray-500">
                            <span>SMS</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="communication[]" value="call" class="accent-red-500">
                            <span>Call</span>
                        </label>
                    </div>
                </div>

                <!-- Additional Notes -->
                <div class="mb-4">
                    <label for="notes" class="block text-gray-900 font-medium mb-1">Additional Notes</label>
                    <textarea name="notes" value="{{ old('notes') }}" placeholder="Write any notes here..."
                        class="w-full border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center w-full flex items-center gap-2">
                    {{-- <a href="/" >
                    <i class="fa fa-globe bg-gray-500 text-white px-3 py-3 rounded-md"></i>
                </a> --}}
                    <button type="submit"
                        class="bg-gray-600 text-white px-6 py-2 w-full rounded-sm hover:bg-gray-700 cursor-pointer transition-all duration-200">
                        Submit
                    </button>
                </div>
            </form>
            <div class="flex items-center gap-2 mt-8">

                <div class="border-b-2 border-gray-400 flex-grow"></div>
                <p class="text-gray-700">Contact Us</p>
                <div class="border-b-2 border-gray-400 flex-grow"></div>
            </div>

            <div class="flex justify-center items-center flex-wrap gap-4 mt-5 w-full">
                <div class="flex items-center gap-2 text-gray-800 text-sm">
                    <i class="fa fa-phone"></i>
                    <span>(+63) 928-551-2464</span>
                </div>
                <div class="flex items-center gap-2 text-gray-800 text-sm">
                    <i class="fa fa-envelope"></i>
                    <span>xentroestateproperties@gmail.com</span>
                </div>
                <div class="flex items-center gap-2 text-gray-800 text-sm">
                    <a href="/">
                        <i class="fa fa-globe"></i>
                        <span>www.xentroestates.com</span>

                    </a>

                </div>
            </div>


        </div>


    </div>

    <!-- Toast container (optional if you want to reuse the same element) -->
    <div id="toastContainer"></div>

    <script>
        // Listen to form submission event
        document.getElementById('myForm').addEventListener('submit', function(e) {
            // Prevent the default form submission behavior
            e.preventDefault();

            // Flag to check if any field is empty
            let formIsIncomplete = false;

            // Grab all required inputs, selects and textarea elements
            const fields = this.querySelectorAll(
                'input[type="text"], input[type="email"], input[type="tel"], select');

            fields.forEach(field => {
                // Trim the value and check if empty
                if (field.value.trim() === '') {
                    field.style.borderColor = '#EF4444'; // Change background to red if empty
                    formIsIncomplete = true;
                } else {
                    // Reset to the original background color (using Tailwind background class as a reference)
                    field.style.backgroundColor =
                        'rgb(243 244 246)'; // corresponds approximately to bg-gray-100
                }
            });

            // If the form is incomplete, show a toast message
            if (formIsIncomplete) {
                showToast("Please fill up the form completely!");
            } else {
                // Otherwise, you may submit the form here (e.g., an AJAX request or call this.submit())
                // For demonstration, we'll log success to console:
                console.log("Form submitted successfully!");
                // You can uncomment the next line to allow form submission:
                this.submit();
            }
        });

        // Function to create and show a toast message
        function showToast(message) {
            // Create a new toast div
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.innerText = message;
            document.body.appendChild(toast);

            // Automatically remove the toast after 3 seconds
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        setTimeout(() => {
            const message = document.getElementById('successMessage');
            if (message) {
                message.style.opacity = '0';
            }
        }, 5000);

        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }
    </script>
</body>

</html>
