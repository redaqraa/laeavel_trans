<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Welcome') | TransCO Travel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-800">
    <header class="bg-white shadow-md relative z-20">
        <nav class="container mx-auto px-4 py-4 flex flex-wrap justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-transco-gold">TransCO</a>
            
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            
            <div id="menu" class="hidden md:flex md:items-center md:space-x-8 w-full md:w-auto">
                <a href="{{ route('home') }}" class="block py-2 md:py-0 text-gray-700 hover:text-transco-gold">Home</a>
                <a href="{{ route('destinations.index') }}" class="block py-2 md:py-0 text-gray-700 hover:text-transco-gold">Destinations</a>
                
                @guest
                    <a href="{{ route('login') }}" class="block py-2 md:py-0 text-gray-700 hover:text-transco-gold">Login</a>
                    <a href="{{ route('register') }}" class="block py-2 md:py-0 text-gray-700 hover:text-transco-gold">Register</a>
                @else
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center py-2 md:py-0 text-gray-700 hover:text-transco-gold">
                            {{ Auth::user()->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            <a href="{{ route('dashboard.bookings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Bookings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TransCO Travel</h3>
                    <p class="mb-4">We provide exceptional travel experiences for your journey around the world.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-transco-gold">Home</a></li>
                        <li><a href="{{ route('destinations.index') }}" class="hover:text-transco-gold">Destinations</a></li>
                        <li><a href="#" class="hover:text-transco-gold">About Us</a></li>
                        <li><a href="#" class="hover:text-transco-gold">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                    <address class="not-italic">
                        <p>123 Travel Street</p>
                        <p>Destination City</p>
                        <p>Email: info@transco.com</p>
                        <p>Phone: +1 234 567 890</p>
                    </address>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center">
                <p>&copy; {{ date('Y') }} TransCO Travel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>
    
    <!-- Alpine.js for dropdown menus -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>