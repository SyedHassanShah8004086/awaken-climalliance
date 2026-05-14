<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Events - Awaken ClimAlliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">

@include('components.navbar')

<!-- Events Header -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6">📅 Join Us</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4">Upcoming <span class="text-yellow-300">Events</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto">Join us in making a difference for <span class="font-semibold text-yellow-300">our planet</span></p>
    </div>
</section>

<!-- Events List -->
<section class="py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4">
        @if($events->count() > 0)
            <div class="space-y-8">
                @foreach($events as $event)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="md:flex">
                        <!-- Image Section -->
                        <div class="md:w-1/3">
                            @php
                                $imagePath = $event->featured_image;
                                $imageUrl = null;
                                
                                if ($imagePath) {
                                    if (file_exists(public_path($imagePath))) {
                                        $imageUrl = asset($imagePath);
                                    } elseif (file_exists(public_path('event-images/' . basename($imagePath)))) {
                                        $imageUrl = asset('event-images/' . basename($imagePath));
                                    }
                                }
                            @endphp
                            
                            @if($imageUrl)
                                <img src="{{ $imageUrl }}" alt="{{ $event->title }}" class="w-full h-48 md:h-full object-cover">
                            @else
                                <div class="bg-gradient-to-br from-green-600 to-green-800 h-48 md:h-full flex items-center justify-center p-6">
                                    <div class="text-center text-white">
                                        <div class="text-5xl md:text-6xl font-bold">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
                                        <div class="text-xl md:text-2xl">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</div>
                                        <div class="text-sm">{{ \Carbon\Carbon::parse($event->event_date)->format('Y') }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Content Section -->
                        <div class="md:w-2/3 p-6 md:p-8">
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                                <span class="px-3 py-1 text-xs rounded-full font-semibold 
                                    @if($event->status == 'upcoming') bg-blue-100 text-blue-700
                                    @elseif($event->status == 'ongoing') bg-green-100 text-green-700
                                    @else bg-gray-100 text-gray-700 @endif">
                                    <i class="fas 
                                        @if($event->status == 'upcoming') fa-clock
                                        @elseif($event->status == 'ongoing') fa-play
                                        @else fa-check-circle @endif mr-1"></i>
                                    {{ ucfirst($event->status) }}
                                </span>
                            </div>
                            
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 hover:text-green-600 transition">
                                {{ $event->title }}
                            </h2>
                            
                            <div class="flex flex-wrap gap-4 mb-4">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-map-marker-alt mr-2 text-green-600"></i>
                                    <span class="text-sm">{{ $event->location }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-calendar-alt mr-2 text-green-600"></i>
                                    <span class="text-sm">{{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y - h:i A') }}</span>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 leading-relaxed mb-5">
                                {{ Str::limit($event->description, 150) }}
                            </p>
                            
                            @if($event->registration_link)
                                <a href="{{ $event->registration_link }}" target="_blank" class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-2.5 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 hover:scale-105 shadow-md">
                                    Register Now <i class="fas fa-arrow-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-12">
                {{ $events->links() }}
            </div>
        @else
            <div class="text-center text-gray-500 py-16 bg-white rounded-2xl shadow-sm">
                <i class="fas fa-calendar-times text-6xl mb-4 opacity-30"></i>
                <p class="text-xl font-medium">No upcoming events at the moment.</p>
                <p class="mt-2">Check back soon for updates!</p>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-green-50 to-green-100">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl">
            <i class="fas fa-calendar-plus text-5xl text-green-600 mb-4"></i>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">Want to Host an Event?</h2>
            <p class="text-gray-600 mb-6">Partner with us to organize climate action events in your community</p>
            <a href="/contact" class="inline-flex items-center gap-2 bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 hover:scale-105 shadow-md">
                Contact Us <i class="fas fa-envelope"></i>
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white pt-12 md:pt-16 pb-6 md:pb-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div class="text-center md:text-left">
                <div class="flex justify-center md:justify-start items-center space-x-3 mb-4">
                    <i class="fas fa-leaf text-2xl text-green-500"></i>
                    <div>
                        <div class="text-xl font-bold">AWAKEN</div>
                        <div class="text-xs text-gray-400">CLIMALLIANCE</div>
                    </div>
                </div>
                <p class="text-gray-400 text-sm">A youth-led climate initiative working with communities for a just, resilient, and sustainable future.</p>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="/" class="hover:text-green-400 transition">Home</a></li>
                    <li><a href="/about" class="hover:text-green-400 transition">About Us</a></li>
                    <li><a href="/projects" class="hover:text-green-400 transition">Projects</a></li>
                    <li><a href="/events" class="hover:text-green-400 transition">Events</a></li>
                    <li><a href="/blog" class="hover:text-green-400 transition">Blog</a></li>
                </ul>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-lg font-bold mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><i class="fas fa-envelope mr-2"></i> info@awakenclimalliance.org</li>
                    <li><i class="fas fa-phone mr-2"></i> +92 300 1234567</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i> Gilgit-Baltistan, Pakistan</li>
                </ul>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-lg font-bold mb-4">Newsletter</h4>
                <p class="text-gray-400 text-sm mb-3">Stay updated with our latest news.</p>
                <form action="/subscribe" method="POST" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" placeholder="Your email" class="px-4 py-2 rounded-lg w-full text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <button type="submit" class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm whitespace-nowrap">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-6 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Awaken ClimAlliance. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>