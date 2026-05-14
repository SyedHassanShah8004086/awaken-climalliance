<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Blog - Awaken ClimAlliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Custom Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.1); opacity: 0.5; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-pulse-slow {
            animation: pulse 3s ease-in-out infinite;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        
        /* Hover Effects */
        .blog-card {
            transition: all 0.3s ease;
        }
        
        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }
        
        .blog-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .blog-card:hover .blog-image {
            transform: scale(1.05);
        }
        
        .image-container {
            overflow: hidden;
            height: 220px;
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #15803d 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .blog-image, .image-container {
                height: 180px;
            }
        }
        
        button, a {
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
        }
        
        @media (max-width: 768px) {
            button, .btn {
                min-height: 44px;
                min-width: 44px;
            }
        }
    </style>
</head>
<body class="bg-gray-50">

@include('components.navbar')

<!-- Blog Header with Parallax Effect -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-yellow-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-green-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6 animate-fadeInUp">📝 Latest Updates</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 animate-fadeInUp delay-100">Our <span class="gradient-text">Blog</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6 animate-fadeInUp delay-200"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto animate-fadeInUp delay-300 leading-relaxed">
            Insights, stories, and updates from the <span class="font-semibold text-yellow-300">climate action movement</span>
        </p>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full">
            <path fill="#f3f4f6" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,96C960,107,1056,117,1152,112C1248,107,1344,85,1392,74.7L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Search Bar -->
<section class="py-8 bg-gray-100">
    <div class="max-w-3xl mx-auto px-4">
        <form action="{{ route('blog') }}" method="GET" class="flex flex-wrap gap-3">
            <div class="flex-1 min-w-[200px]">
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search blog posts by title, content, or category..." 
                           class="search-input w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                </div>
            </div>
            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition-all duration-300 hover:scale-105 flex items-center gap-2 shadow-md">
                <i class="fas fa-search"></i> Search
            </button>
            @if(request('search'))
                <a href="{{ route('blog') }}" class="bg-gray-500 text-white px-6 py-3 rounded-xl hover:bg-gray-600 transition-all duration-300 flex items-center gap-2">
                    <i class="fas fa-times"></i> Clear
                </a>
            @endif
        </form>
    </div>
</section>

<!-- Search Results Info -->
@if(request('search'))
    <div class="max-w-7xl mx-auto px-4 mt-4">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-l-4 border-blue-500 text-blue-700 px-5 py-3 rounded-lg shadow-sm">
            <i class="fas fa-info-circle mr-2"></i>
            Showing results for: <strong>"{{ request('search') }}"</strong>
            <span class="ml-2 px-2 py-0.5 bg-blue-200 rounded-full text-xs font-semibold">{{ $posts->total() }} results found</span>
        </div>
    </div>
@endif

<!-- Blog Posts -->
<section class="py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4">
        @if($posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <div class="blog-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                    <!-- Featured Image -->
                    <div class="image-container">
                        @php
                            $imagePath = $post->featured_image;
                            $imageUrl = null;
                            
                            if ($imagePath) {
                                if (file_exists(public_path($imagePath))) {
                                    $imageUrl = asset($imagePath);
                                } elseif (file_exists(public_path('blog-images/' . basename($imagePath)))) {
                                    $imageUrl = asset('blog-images/' . basename($imagePath));
                                }
                            }
                        @endphp
                        
                        @if($imageUrl)
                            <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="blog-image">
                        @else
                            <div class="w-full h-full bg-gradient-to-r from-green-600 to-green-800 flex items-center justify-center">
                                <i class="fas fa-newspaper text-6xl text-white opacity-70"></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-6">
                        <div class="flex flex-wrap items-center gap-2 text-sm text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-calendar-alt text-green-600"></i>
                                <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                            </span>
                            @if($post->category)
                                <span class="text-green-300">•</span>
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-tag text-green-600"></i>
                                    <span class="text-green-600 font-medium">{{ $post->category }}</span>
                                </span>
                            @endif
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-green-600 transition">
                            {{ $post->title }}
                        </h2>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}
                        </p>
                        
                        <a href="/blog/{{ $post->slug }}" class="inline-flex items-center text-green-600 font-semibold hover:text-green-800 transition-all duration-300 group/link">
                            Read More 
                            <i class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination with styling -->
            <div class="mt-12">
                {{ $posts->appends(['search' => request('search')])->links() }}
            </div>
        @else
            <div class="text-center text-gray-500 py-16 bg-white rounded-2xl shadow-sm">
                <i class="fas fa-search text-6xl mb-4 opacity-30 animate-float"></i>
                <p class="text-xl font-medium">No blog posts found</p>
                @if(request('search'))
                    <p class="mt-2">No results found for <strong>"{{ request('search') }}"</strong></p>
                    <p class="mt-1">Try different keywords or browse all posts.</p>
                    <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 mt-6 bg-green-600 text-white px-6 py-2.5 rounded-xl hover:bg-green-700 transition-all duration-300 hover:scale-105 shadow-md">
                        <i class="fas fa-eye"></i> View All Posts
                    </a>
                @else
                    <p class="mt-2">Check back soon for updates!</p>
                @endif
            </div>
        @endif
    </div>
</section>

<!-- Newsletter CTA Section -->
<section class="py-16 bg-gradient-to-r from-green-50 to-green-100">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl">
            <i class="fas fa-envelope-open-text text-5xl text-green-600 mb-4 animate-float"></i>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">Never Miss an Update</h2>
            <p class="text-gray-600 mb-6">Subscribe to our newsletter and get the latest posts delivered to your inbox.</p>
            <form action="/subscribe" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                @csrf
                <input type="email" name="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition-all duration-300 hover:scale-105 shadow-md whitespace-nowrap">
                    Subscribe Now <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white pt-12 md:pt-16 pb-6 md:pb-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="footer-grid grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
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
                <h4 class="text-lg font-bold mb-4">Contact Info</h4>
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