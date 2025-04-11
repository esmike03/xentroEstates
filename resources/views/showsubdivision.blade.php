<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subdivisions</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/palm-tree.png') }}" type="image/x-icon">
</head>
<body class="font-[Ubuntu] bg-cover bg-center" style="background-image: url('{{ asset("images/Green.jpg") }}');">

    <!-- Header -->
    <header class="bg-zinc-800 bg-opacity-80 backdrop-blur-md shadow-md fixed w-full z-50 top-0">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ asset('images/XENTROESTATES2.png') }}" alt="Xentro Estates Logo" class="w-20 object-cover">
                <p class="text-white font-bold">Xentro Estates Property Corp.</p>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="nav-link">Home</a>
                <a href="/user-listings1" class="nav-link">Properties</a>
                <a href="/about" class="nav-link">About Us</a>
                <a href="/contact" class="nav-link">Contact</a>
                <a href="/user/subdivisions" class="nav-link border-b-yellow-500 border-b-2">Subdivisions</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden flex flex-col bg-zinc-900 shadow-md absolute w-full left-0 top-full z-50">
            <a href="/" class="mobile-link">Home</a>
            <a href="/user-listings1" class="mobile-link">Properties</a>
            <a href="/about" class="mobile-link">About Us</a>
            <a href="/contact" class="mobile-link">Contact</a>
            <a href="/user/subdivisions" class="mobile-link">Subdivisions</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="mt-24 px-6">
        <h1 class="text-3xl font-bold text-zinc-900  text-center uppercase italic mb-10">Subdivisions</h1>

        <!-- Subdivision Grid -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
            @foreach ($subdivisions as $subdivision)
                <a href="{{ route('subdivision.show', ['subdivision_id' => $subdivision->id]) }}"
                   class="group relative overflow-hidden rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black opacity-30 group-hover:bg-opacity-60 transition duration-300"></div>
                    <img src="{{ asset('storage/' . $subdivision->image) }}" alt="{{ $subdivision->sub_name }}"
                         class="w-full h-64 object-cover">
                    <div class="absolute bottom-0 w-full bg-gradient-to-t from-black to-transparent p-4">
                        <h3 class="text-lg font-semibold text-white">{{ $subdivision->sub_name }}</h3>
                        <p class="text-gray-300 text-sm">
                            <strong>Blocks:</strong> {{ $subdivision->block_number }} |
                            <strong>Houses:</strong> {{ $subdivision->house_number }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </main>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    <style>
        .nav-link {
            color: white;

            transition: 0.3s;
        }
        .nav-link:hover {
            color: #facc15;
            transform: scale(1.05);
        }
        .mobile-link {
            padding: 15px;
            color: white;
            text-align: center;
            transition: 0.3s;
        }
        .mobile-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #facc15;
        }
    </style>
</body>
</html>
