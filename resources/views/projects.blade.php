<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Projects - Awaken ClimAlliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .project-card {
            transition: all 0.3s ease;
        }
        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }
        .project-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .project-card:hover .project-image {
            transform: scale(1.05);
        }
        .image-container {
            overflow: hidden;
            height: 220px;
            position: relative;
            background-color: #f3f4f6;
        }
        .gradient-text {
            background: linear-gradient(135deg, #15803d 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        @media (max-width: 768px) {
            .project-image, .image-container {
                height: 180px;
            }
        }
    </style>
</head>
<body class="bg-gray-50">

@include('components.navbar')

<!-- Projects Header -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6">🚀 Our Work</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4">Our <span class="gradient-text">Projects</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto">Discover how we're making a difference in <span class="font-semibold text-yellow-300">climate action</span></p>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        @if($projects->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="project-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <!-- Image Section - FIXED: Removed file_exists check -->
                    <div class="image-container">
                       @if($project->image)
    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="w-full h-56 object-cover">
@else
    <div class="w-full h-56 bg-green-100 flex items-center justify-center">
        <i class="fas fa-tree text-6xl text-green-600"></i>
    </div>
@endif
                    </div>
                    
                    <!-- Content Section -->
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold text-gray-800">{{ $project->title }}</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs rounded-full font-semibold">
                                {{ $project->category ?? 'Initiative' }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed mb-4">
                            {{ \Illuminate\Support\Str::limit($project->description, 100) }}
                        </p>
                        
                        <a href="/projects/{{ $project->slug }}" class="inline-flex items-center text-green-600 font-semibold hover:text-green-800 transition group">
                            Learn More 
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-12">
                {{ $projects->links() }}
            </div>
        @else
            <div class="text-center text-gray-500 py-16 bg-white rounded-2xl shadow-sm">
                <i class="fas fa-project-diagram text-6xl mb-4 opacity-30"></i>
                <p class="text-xl font-medium">No projects yet.</p>
                <p class="mt-2">Check back soon for updates!</p>
            </div>
        @endif
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