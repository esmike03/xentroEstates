<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <div class="flex gap-3 items-center mb-7">
            <a href="/admin/dashboard" class="p-1 bg-gray-500 text-white rounded-md px-5">Back</a>
            <h1 class="text-3xl font-bold ">Booking List</h1>
        </div>
        <a href="{{ route('bookings.export') }}"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4 inline-block">
            <i class="fas fa-file-excel"></i> Export to Excel
        </a>


        @if ($bookings->isEmpty())
            <p>No bookings available.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300">
                @if (session('success'))
                    <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Customer Name</th>
                        <th class="py-2 px-4 border-b text-left">Email</th>
                        <th class="py-2 px-4 border-b text-left">Phone Number</th>
                        <th class="py-2 px-4 border-b text-left">Property</th>
                        <th class="py-2 px-4 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $booking->fname }} {{ $booking->lname }}</td>
                            <td class="py-2 px-4 border-b">{{ $booking->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $booking->phone }}</td>
                            <td class="py-2 px-4 border-b">{{ $booking->property }}</td>

                            <td class="py-2 px-4 border-b">
                                <button class="text-blue-500" onclick="openModal({{ json_encode($booking) }})">
                                    <i class="fa fa-eye"></i> View Details
                                </button>
                            </td>
                            <td class="py-2 px-4 border-b flex gap-2">


                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        <i class="fa fa-trash"></i> Delete
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
    <div id="bookingModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg w-1/3">
            <h2 class="text-2xl font-semibold mb-4" id="modalTitle">Booking Details</h2>

            <div class="mb-4">
                <strong>Name:</strong> <span id="modalName"></span>
            </div>
            <div class="mb-4">
                <strong>Email:</strong> <span id="modalEmail"></span>
            </div>
            <div class="mb-4">
                <strong>Phone Number:</strong> <span id="modalPhone"></span>
            </div>
            <div class="mb-4">
                <strong>Property:</strong> <span id="modalProperty"></span>
            </div>

            <div class="mb-4">
                <strong>Inquiring:</strong> <span id="modalInquiring"></span>
            </div>
            <div class="mb-4">
                <strong>Modes of Communication:</strong> <span id="modalCommunication"></span>
            </div>
            <div class="mb-4">
                <strong>Additional Notes:</strong> <span id="modalNotes"></span>
            </div>
            <div class="mb-4">
                <strong>Date:</strong> <span id="modalDate"></span>
            </div>

            <div class="text-right">
                <button class="bg-blue-600 text-white py-2 px-4 rounded" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>

    <script>
        // Function to open the modal and populate it with the selected booking data
        function openModal(booking) {
            // Populate the modal with the booking details
            document.getElementById('modalName').innerText = booking.fname + ' ' + booking.lname;
            document.getElementById('modalEmail').innerText = booking.email;
            document.getElementById('modalPhone').innerText = booking.phone;
            document.getElementById('modalProperty').innerText = booking.property;
            // Format date
            const date = new Date(booking.created_at);
            const formattedDate = date.toLocaleString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric',
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });
            document.getElementById('modalDate').innerText = formattedDate;
            document.getElementById('modalInquiring').innerText = booking.inquiring;
            let communicationModes = booking.communication;

            try {
                // If it's a stringified array (e.g. '["email","viber"]'), parse it
                if (typeof communicationModes === 'string') {
                    communicationModes = JSON.parse(communicationModes);
                }

                // Convert array to a readable string
                document.getElementById('modalCommunication').innerText = communicationModes.join(', ');
            } catch (e) {
                // If parsing fails, just display raw value
                document.getElementById('modalCommunication').innerText = booking.communication;
            }
            document.getElementById('modalNotes').innerText = booking.notes;
            document.getElementById('modalProperty').innerText = booking.property;

            // Show the modal
            document.getElementById('bookingModal').classList.remove('hidden');
        }

        // Function to close the modal
        function closeModal() {
            // Hide the modal
            document.getElementById('bookingModal').classList.add('hidden');
        }
    </script>

</body>

</html>
