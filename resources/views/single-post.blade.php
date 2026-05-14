<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ $post->title }} - Awaken ClimAlliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .featured-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }
        
        @media (max-width: 768px) {
            .featured-image {
                height: 250px;
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
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
        
        .gradient-text {
            background: linear-gradient(135deg, #15803d 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50">

@include('components.navbar')

<!-- Blog Post Header -->
<section class="pt-24 md:pt-32 pb-8 bg-gradient-to-r from-green-700 to-green-600 text-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-4">Blog Post</span>
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 animate-fadeInUp">{{ $post->title }}</h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full"></div>
    </div>
</section>

<!-- Blog Post Content -->
<section class="py-12 md:py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeInUp">
            <!-- Featured Image -->
            @php
                $imagePath = $post->featured_image;
                $imageUrl = null;
                
                if ($imagePath) {
                    if (file_exists(public_path($imagePath))) {
                        $imageUrl = asset($imagePath);
                    } elseif (file_exists(public_path('blog-images/' . basename($imagePath)))) {
                        $imageUrl = asset('blog-images/' . basename($imagePath));
                    } elseif (file_exists(public_path('storage/' . $imagePath))) {
                        $imageUrl = asset('storage/' . $imagePath);
                    }
                }
            @endphp
            
            @if($imageUrl)
                <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="featured-image">
            @else
                <div class="bg-gradient-to-r from-green-700 to-green-600 h-64 md:h-96 flex items-center justify-center">
                    <i class="fas fa-leaf text-8xl text-white opacity-30"></i>
                </div>
            @endif
            
            <div class="p-6 md:p-8 lg:p-10">
                <!-- Meta Info -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6 pb-4 border-b">
                    <div class="flex flex-wrap items-center gap-3">
                        @if($post->category)
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-tag"></i> {{ $post->category }}
                            </span>
                        @endif
                        <span class="text-gray-500 text-sm flex items-center gap-1">
                            <i class="far fa-calendar-alt text-green-600"></i>
                            {{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}
                        </span>
                        <span class="text-gray-500 text-sm flex items-center gap-1">
                            <i class="far fa-clock text-green-600"></i>
                            {{ ceil(str_word_count($post->content) / 200) }} min read
                        </span>
                    </div>
                </div>
                
                <!-- Author Info -->
                <div class="flex items-center gap-4 mb-8 p-4 bg-gray-50 rounded-xl">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-full w-12 h-12 flex items-center justify-center text-white">
                        <i class="fas fa-user text-xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ $post->author ?? 'Admin' }}</p>
                        <p class="text-sm text-gray-500">Climate Activist & Writer</p>
                    </div>
                </div>
                
                <!-- Post Content -->
                <div class="prose prose-lg max-w-none text-gray-700">
                    <div class="text-base md:text-lg leading-relaxed whitespace-pre-line">
                        {{ $post->content }}
                    </div>
                </div>
                
                <!-- Share Section -->
                <div class="mt-8 pt-6 border-t border-gray-200 flex flex-wrap justify-between items-center gap-4">
                    <div class="flex items-center gap-3">
                        <span class="text-gray-500 text-sm">Share this post:</span>
                        <div class="flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-600 hover:text-white transition">
                                <i class="fab fa-facebook-f text-sm"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-400 hover:text-white transition">
                                <i class="fab fa-twitter text-sm"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-green-500 hover:text-white transition">
                                <i class="fab fa-whatsapp text-sm"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-700 hover:text-white transition">
                                <i class="fab fa-linkedin-in text-sm"></i>
                            </a>
                        </div>
                    </div>
                    
                    <a href="/blog" class="inline-flex items-center gap-2 text-green-600 hover:text-green-800 transition group">
                        <i class="fas fa-arrow-left group-hover:-translate-x-1 transition"></i> Back to Blog
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Navigation between posts -->
        <div class="mt-8 flex justify-between">
            @if($previousPost = \App\Models\Post::where('id', '<', $post->id)->where('status', 'published')->orderBy('id', 'desc')->first())
                <a href="/blog/{{ $previousPost->slug }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-green-600 transition group">
                    <i class="fas fa-chevron-left group-hover:-translate-x-1 transition"></i> Previous Post
                </a>
            @else
                <div></div>
            @endif
            
            @if($nextPost = \App\Models\Post::where('id', '>', $post->id)->where('status', 'published')->orderBy('id', 'asc')->first())
                <a href="/blog/{{ $nextPost->slug }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-green-600 transition group">
                    Next Post <i class="fas fa-chevron-right group-hover:translate-x-1 transition"></i>
                </a>
            @endif
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