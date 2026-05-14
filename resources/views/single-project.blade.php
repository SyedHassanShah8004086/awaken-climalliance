<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ $project->title }} - Awaken ClimAlliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .project-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .image-container {
            overflow: hidden;
            position: relative;
        }
        
        .image-container:hover .project-image {
            transform: scale(1.05);
        }
        
        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .image-container:hover .image-overlay {
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .project-image {
                height: 250px;
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .animate-fadeInLeft {
            animation: fadeInLeft 0.6s ease-out forwards;
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
        
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        
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

<!-- Project Header -->
<section class="pt-24 md:pt-32 pb-8 bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 animate-fadeInUp">{{ $project->title }}</h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-4 animate-fadeInUp delay-100"></div>
        <p class="text-base md:text-xl animate-fadeInUp delay-200">{{ $project->category ?? 'Project' }}</p>
    </div>
</section>

<!-- Project Content -->
<section class="py-12 md:py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeInUp">
            <!-- Project Image - FIXED for your image path -->
            <div class="image-container">
                @if($project->image && file_exists(public_path($project->image)))
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="project-image">
                @elseif($project->image && file_exists(public_path('storage/' . $project->image)))
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="project-image">
                @else
                    <div class="bg-gradient-to-r from-green-700 to-green-600 h-64 md:h-96 flex items-center justify-center">
                        <i class="fas fa-tree text-8xl text-white opacity-30"></i>
                    </div>
                @endif
                <div class="image-overlay"></div>
            </div>
            
            <div class="p-6 md:p-8 lg:p-10">
                <!-- Category Badge -->
                <div class="mb-6">
                    @if($project->category)
                        <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-sm font-semibold">
                            <i class="fas fa-tag"></i> {{ $project->category }}
                        </span>
                    @endif
                </div>
                
                <!-- Title -->
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-4">{{ $project->title }}</h1>
                
                <!-- Description -->
                <div class="prose prose-lg max-w-none text-gray-700">
                    <div class="text-base md:text-lg leading-relaxed whitespace-pre-line">
                        {{ $project->full_description ?? $project->description }}
                    </div>
                </div>
                
                <!-- Project Meta Info -->
                <div class="mt-8 pt-6 border-t border-gray-200 flex flex-wrap justify-between items-center gap-4">
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <i class="far fa-calendar-alt text-green-600"></i>
                            <span>{{ $project->created_at ? $project->created_at->format('F d, Y') : 'Recently added' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <i class="fas fa-chart-line text-green-600"></i>
                            <span>Status: 
                                <span class="font-semibold capitalize 
                                    {{ $project->status == 'active' ? 'text-green-600' : 
                                      ($project->status == 'completed' ? 'text-blue-600' : 'text-yellow-600') }}">
                                    {{ $project->status ?? 'Active' }}
                                </span>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Share Buttons -->
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-500">Share:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-600 hover:text-white transition">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($project->title) }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-400 hover:text-white transition">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($project->title . ' - ' . url()->current()) }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-green-500 hover:text-white transition">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Back Button -->
        <div class="mt-8 text-center animate-fadeInLeft">
            <a href="/projects" class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 hover:scale-105 shadow-md group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition"></i> Back to Projects
            </a>
        </div>
    </div>
</section>

<!-- Related Projects Section (Optional) -->
<section class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Related <span class="gradient-text">Projects</span></h2>
        <div class="w-16 h-1 bg-green-600 mx-auto rounded-full mb-8"></div>
        <a href="/projects" class="inline-flex items-center gap-2 text-green-600 hover:text-green-800 transition">
            View All Projects <i class="fas fa-arrow-right"></i>
        </a>
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