@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center overflow-hidden bg-transco-darkteal">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-60" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');"></div>
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/20"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 text-shadow-lg max-w-4xl mx-auto text-center">
                A Journey to Explore the World
            </h1>
            
            <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto text-center mb-10 text-shadow-sm">
                Discover amazing tourist destinations and enjoy unforgettable travel experiences with our exceptional services
            </p>
            
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#destinations" class="bg-transco-gold hover:bg-transco-gold-dark text-white transition-all duration-300 text-base px-8 py-3 rounded">
                    Explore Destinations
                </a>
                <a href="#about" class="border border-white text-white hover:bg-white/10 transition-all duration-300 text-base px-8 py-3 rounded">
                    About Us
                </a>
            </div>
        </div>
    </section>
    
    <!-- Search Section -->
    <section id="search" class="relative">
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow-md p-6 grid grid-cols-1 md:grid-cols-5 gap-4 relative -mt-16 mx-4 z-10">
                <form action="{{ route('destinations.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 w-full">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-gray-700">Where would you like to go?</label>
                        <input
                            type="text"
                            name="search"
                            placeholder="Enter destination"
                            class="w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-transco-gold"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-700">When do you want to travel?</label>
                        <input
                            type="date"
                            name="date"
                            class="w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-transco-gold"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-700">Number of travelers</label>
                        <select
                            name="people"
                            class="w-full px-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-transco-gold"
                        >
                            @for($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'traveler' : 'travelers' }}</option>
                            @endfor
                        </select>
                    </div>
                    
                    <div class="flex items-end">
                        <button 
                            type="submit"
                            class="w-full bg-transco-gold hover:bg-transco-gold-dark text-white transition-all duration-300 px-4 py-3 rounded"
                        >
                            Search Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Popular Destinations -->
    <section id="destinations" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-2">Popular Destinations</h2>
                <p class="text-gray-600">Discover the most visited cities and landmarks around the world</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredDestinations as $destination)
                    <div class="rounded-lg overflow-hidden shadow-md bg-white">
                        <img src="{{ asset($destination->image_path) }}" alt="{{ $destination->name }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $destination->name }}</h3>
                            <p class="text-gray-600 mb-2">{{ $destination->location }}</p>
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($destination->rating))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @elseif($i == ceil($destination->rating) && $destination->rating != floor($destination->rating))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-600 ml-2">{{ $destination->rating }}/5</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-transco-gold font-bold text-xl">${{ number_format($destination->price, 2) }}</span>
                                <a href="{{ route('destinations.show', $destination->slug) }}" class="inline-block bg-transco-gold text-white px-4 py-2 rounded hover:bg-transco-gold-dark transition duration-300">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-12 text-center">
                <a href="{{ route('destinations.index') }}" class="inline-block bg-white border border-transco-gold text-transco-gold px-6 py-3 rounded hover:bg-transco-gold hover:text-white transition duration-300">
                    View All Destinations
                </a>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-2">About Us</h2>
                <p class="text-gray-600">Learn more about our travel company and our mission</p>
            </div>
            
            <div class="max-w-3xl mx-auto text-center">
                <p class="text-gray-600 mb-6">
                    TransCO is a premier travel agency dedicated to providing exceptional travel experiences. 
                    With years of experience in the tourism industry, we specialize in creating unique and 
                    memorable journeys for our clients around the world.
                </p>
                <p class="text-gray-600 mb-6">
                    Our team of expert travel consultants is passionate about travel and committed to 
                    ensuring that every aspect of your trip is perfect, from accommodation and transportation 
                    to activities and dining experiences.
                </p>
            </div>
        </div>
    </section>
@endsection