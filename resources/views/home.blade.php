<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Awaken ClimAlliance - Climate Action from the Mountains</title>
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
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.1); opacity: 0.5; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-fadeInLeft {
            animation: fadeInLeft 0.8s ease-out forwards;
        }
        
        .animate-fadeInRight {
            animation: fadeInRight 0.8s ease-out forwards;
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
        .delay-400 { animation-delay: 0.4s; }
        
        /* Hover Effects */
        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(34, 197, 94, 0.3);
            transform: translateY(-5px);
        }
        
        .hover-scale {
            transition: all 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.05);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #15803d 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Card Styles */
        .project-card, .blog-card, .partner-card {
            transition: all 0.3s ease;
        }
        
        .project-card:hover, .blog-card:hover, .partner-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }
        
        /* Stats Counter */
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #15803d, #22c55e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        @media (min-width: 768px) {
            .stat-number { font-size: 3rem; }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title { font-size: 2rem; }
            .hero-subtitle { font-size: 1.25rem; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 1rem; }
            .projects-grid, .blog-grid, .partners-grid { grid-template-columns: 1fr; }
            .cta-grid { grid-template-columns: 1fr; gap: 1.5rem; }
            .footer-grid { grid-template-columns: 1fr; text-align: center; }
        }
        
        @media (min-width: 769px) and (max-width: 1024px) {
            .projects-grid, .blog-grid { grid-template-columns: repeat(2, 1fr); }
            .partners-grid { grid-template-columns: repeat(3, 1fr); }
        }
        
        button, a { cursor: pointer; -webkit-tap-highlight-color: transparent; }
        @media (max-width: 768px) { button, .btn { min-height: 44px; min-width: 44px; } }
        
        /* Mountain SVG Background */
        .mountain-bg {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='rgba(255,255,255,0.05)' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
        }
        /* Fix button clickability */
.hero-buttons a, 
.flex.justify-center.gap-4 a {
    pointer-events: auto !important;
    cursor: pointer !important;
    position: relative;
    z-index: 100;
}

/* Ensure navbar doesn't block clicks */
nav {
    pointer-events: auto;
}

/* Hero section clickable area */
section.relative {
    pointer-events: auto;
}

/* Project Card Styles */
.project-card {
    transition: all 0.3s ease;
}

.project-card:hover {
    transform: translateY(-5px);
}

.project-card img {
    transition: transform 0.5s ease;
}

.project-card:hover img {
    transform: scale(1.1);
}

/* Image container */
.project-card .h-48 {
    position: relative;
    overflow: hidden;
}

    </style>
</head>
<body class="bg-white">

<!-- Navbar -->
@include('components.navbar')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-20 md:pt-32 pb-12 md:pb-20 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-yellow-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-green-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 text-center z-10">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6 animate-fadeInUp">🌍 Youth-Led Initiative</span>
        <h1 class="text-4xl md:text-6xl lg:text-8xl font-bold mb-4 animate-fadeInUp delay-100">AWAKENING</h1>
        <h2 class="text-3xl md:text-5xl lg:text-7xl font-bold mb-6 animate-fadeInUp delay-200 gradient-text">CLIMATE LEADERSHIP</h2>
        <p class="text-xl md:text-2xl lg:text-3xl mb-4 animate-fadeInUp delay-300">FROM THE MOUNTAINS</p>
        <p class="text-base md:text-xl mb-8 max-w-3xl mx-auto animate-fadeInUp delay-400">“Empowering youth and indigenous communities to drive climate action and build a sustainable future in Gilgit-Baltistan and beyond.”</p>
        
        <!-- Buttons with proper pointer events -->
        <div class="flex flex-wrap justify-center gap-4 animate-fadeInUp delay-400 relative z-30">
            <a href="/join" class="group bg-yellow-500 text-green-900 px-6 md:px-8 py-3 rounded-full font-semibold hover:bg-yellow-400 transition-all duration-300 hover:scale-105 inline-flex items-center gap-2 cursor-pointer shadow-lg hover:shadow-xl">
                JOIN US <i class="fas fa-arrow-right group-hover:translate-x-1 transition"></i>
            </a>
            <a href="/projects" class="group bg-transparent border-2 border-white text-white px-6 md:px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-green-800 transition-all duration-300 hover:scale-105 inline-flex items-center gap-2 cursor-pointer">
                OUR IMPACT <i class="fas fa-chart-line group-hover:translate-x-1 transition"></i>
            </a>
            <a href="/partner" class="group bg-transparent border-2 border-white text-white px-6 md:px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-green-800 transition-all duration-300 hover:scale-105 inline-flex items-center gap-2 cursor-pointer">
                PARTNER WITH US <i class="fas fa-handshake group-hover:translate-x-1 transition"></i>
            </a>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0 z-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full">
            <path fill="#f3f4f6" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,96C960,107,1056,117,1152,112C1248,107,1344,85,1392,74.7L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Impact Stats Section -->
<section class="py-12 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Our Impact <span class="gradient-text">in Numbers</span></h2>
            <div class="w-20 h-1 bg-green-600 mx-auto rounded-full"></div>
        </div>
        
        <div class="stats-grid grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <i class="fas fa-users text-4xl text-green-600 mb-3"></i>
                <div class="stat-number text-4xl md:text-5xl font-bold text-green-600 mb-2">300+</div>
                <div class="text-gray-700 font-semibold">Students Trained</div>
                <div class="text-sm text-gray-500">in Climate Literacy</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <i class="fas fa-chalkboard text-4xl text-green-600 mb-3"></i>
                <div class="stat-number text-4xl md:text-5xl font-bold text-green-600 mb-2">50+</div>
                <div class="text-gray-700 font-semibold">Climate Awareness</div>
                <div class="text-sm text-gray-500">Sessions Conducted</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <i class="fas fa-globe text-4xl text-green-600 mb-3"></i>
                <div class="stat-number text-4xl md:text-5xl font-bold text-green-600 mb-2">10+</div>
                <div class="text-gray-700 font-semibold">National & International</div>
                <div class="text-sm text-gray-500">Collaborations</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <i class="fas fa-leaf text-4xl text-green-600 mb-3"></i>
                <div class="stat-number text-4xl md:text-5xl font-bold text-green-600 mb-2">{{ \App\Models\Project::count() }}+</div>
                <div class="text-gray-700 font-semibold">Climate Projects</div>
                <div class="text-sm text-gray-500">Successfully Completed</div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="py-12 md:py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-2">WHAT <span class="gradient-text">WE DO</span></h2>
        <div class="w-20 h-1 bg-green-600 mx-auto rounded-full mb-4"></div>
        <p class="text-center text-gray-600 mb-12">Our Projects & Initiatives making a real difference</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($projects as $project)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <!-- Project Image -->
                <div class="h-48 overflow-hidden bg-gray-100">
                    @if($project->image && file_exists(public_path($project->image)))
                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-green-100 to-green-50 flex items-center justify-center">
                            <i class="fas fa-tree text-5xl text-green-600"></i>
                        </div>
                    @endif
                </div>
                
                <!-- Project Content -->
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-bold text-gray-800">{{ $project->title }}</h3>
                        <span class="px-2 py-1 bg-green-100 text-green-600 text-xs rounded-full font-semibold">
                            {{ $project->category ?? 'Initiative' }}
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm mb-3">{{ \Illuminate\Support\Str::limit($project->description, 80) }}</p>
                    <a href="/projects/{{ $project->slug }}" class="inline-flex items-center text-green-600 font-semibold hover:text-green-800 transition gap-1 group/link text-sm">
                        Learn More <i class="fas fa-arrow-right group-hover/link:translate-x-1 transition"></i>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10">
                    No projects added yet. Please add projects from admin panel.
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="/projects" class="inline-flex items-center gap-2 bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 hover:scale-105">
                View All Projects <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Quote Section -->
<section class="bg-gradient-to-r from-green-800 to-green-700 text-white py-16 md:py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <i class="fas fa-quote-left text-9xl absolute top-10 left-10"></i>
        <i class="fas fa-quote-right text-9xl absolute bottom-10 right-10"></i>
    </div>
    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <i class="fas fa-quote-left text-4xl md:text-5xl mb-6 opacity-50"></i>
        <p class="text-2xl md:text-3xl lg:text-4xl italic mb-6 font-light leading-relaxed">
            "{{ $dailyQuote->quote ?? 'We don\'t inherit the Earth from our ancestors, we borrow it from our children.' }}"
        </p>
        <p class="text-lg md:text-xl font-semibold">- {{ $dailyQuote->author ?? 'Indigenous Proverb' }}</p>
        
        <!-- Refresh Icon to manually change quote -->
        <button onclick="location.reload()" class="mt-6 text-white/50 hover:text-white transition">
            <i class="fas fa-sync-alt"></i> New Quote
        </button>
    </div>
</section>

<!-- Blog Section -->
<section class="py-12 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Latest <span class="gradient-text">Stories</span></h2>
            <div class="w-20 h-1 bg-green-600 mx-auto rounded-full mb-4"></div>
            <p class="text-gray-600">Insights & updates from our climate action journey</p>
        </div>
        
        <div class="blog-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <div class="blog-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                <!-- Featured Image Section -->
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
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                @else
                    <div class="bg-gradient-to-r from-green-600 to-green-800 h-48 flex items-center justify-center relative overflow-hidden">
                        <i class="fas fa-newspaper text-6xl text-white opacity-50 absolute"></i>
                        <div class="absolute inset-0 bg-black opacity-20"></div>
                    </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                        <i class="fas fa-calendar-alt text-green-600"></i>
                        <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                        @if($post->category)
                            <span class="text-green-600">•</span>
                            <span class="text-green-600">{{ $post->category }}</span>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}</p>
                    <a href="/blog/{{ $post->slug }}" class="inline-flex items-center text-green-600 font-semibold hover:text-green-800 transition gap-2 group">
                        Read More <i class="fas fa-arrow-right group-hover:translate-x-1 transition"></i>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10">
                    No blog posts yet. Please add posts from admin panel.
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="/blog" class="inline-flex items-center gap-2 bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 hover:scale-105">
                View All Blogs <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="py-16 md:py-24 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12 md:mb-16">
            <span class="inline-block px-4 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-4">Our Global Network</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4">Partners & <span class="gradient-text">Collaborators</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-green-700 mx-auto rounded-full mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Working together with leading organizations for a sustainable future</p>
        </div>
        
        @php
            $partnersList = \App\Models\Partner::where('is_active', true)->orderBy('order', 'asc')->get();
        @endphp
        
        @if($partnersList->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach($partnersList as $partner)
                <div class="group relative bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-500 p-6 text-center hover:-translate-y-2">
                    <!-- Glow effect on hover -->
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl opacity-0 group-hover:opacity-10 transition-opacity duration-500"></div>
                    
                    <!-- Logo Container -->
                    <div class="relative">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-500 shadow-sm">
                            @php
                                $imagePath = $partner->logo;
                                $imageUrl = null;
                                
                                if ($imagePath) {
                                    if (file_exists(public_path($imagePath))) {
                                        $imageUrl = asset($imagePath);
                                    } elseif (file_exists(public_path('project-images/' . basename($imagePath)))) {
                                        $imageUrl = asset('project-images/' . basename($imagePath));
                                    } elseif (file_exists(public_path('storage/' . $imagePath))) {
                                        $imageUrl = asset('storage/' . $imagePath);
                                    }
                                }
                            @endphp
                            
                            @if($imageUrl)
                                <img src="{{ $imageUrl }}" alt="{{ $partner->name }}" class="w-16 h-16 object-contain">
                            @else
                                <i class="fas fa-handshake text-4xl text-green-600"></i>
                            @endif
                        </div>
                        
                        <!-- Decorative dot -->
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <!-- Partner Name -->
                    <h3 class="font-bold text-gray-800 text-lg mb-2 group-hover:text-green-600 transition-colors duration-300">{{ $partner->name }}</h3>
                    
                    <!-- Website Link -->
                    @if($partner->website)
                        <a href="{{ $partner->website }}" target="_blank" class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-green-600 transition-colors duration-300 group/link">
                            <span>Visit Website</span>
                            <i class="fas fa-external-link-alt text-xs group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    @endif
                </div>
                @endforeach
            </div>
            
        @else
            <div class="text-center text-gray-500 py-16">
                <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-handshake text-4xl text-gray-400"></i>
                </div>
                <p class="text-xl font-medium">Partners coming soon</p>
                <p class="text-sm mt-2">Check back later for updates!</p>
            </div>
        @endif
    </div>
</div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-green-800 to-green-700 text-white py-16 md:py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <i class="fas fa-seedling text-8xl absolute top-20 left-20"></i>
        <i class="fas fa-globe-asia text-8xl absolute bottom-20 right-20"></i>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <div class="cta-grid grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 rounded-2xl hover:bg-white/10 transition-all duration-300">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hands-helping text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-2">Volunteer With Us</h3>
                <p class="mb-4">Be a changemaker in your community</p>
                <a href="/join" class="inline-block bg-yellow-500 text-green-900 px-6 py-2 rounded-full font-semibold hover:bg-yellow-400 transition-all duration-300">Join Now</a>
            </div>
            <div class="p-6 rounded-2xl hover:bg-white/10 transition-all duration-300">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-2">Collaborate</h3>
                <p class="mb-4">Partner with us for greater impact</p>
                <a href="/partner" class="inline-block bg-yellow-500 text-green-900 px-6 py-2 rounded-full font-semibold hover:bg-yellow-400 transition-all duration-300">Partner With Us</a>
            </div>
            <div class="p-6 rounded-2xl hover:bg-white/10 transition-all duration-300">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-donate text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-2">Support Our Work</h3>
                <p class="mb-4">Help us empower youth and protect our planet</p>
                <a href="{{ route('donate') }}" class="inline-block mt-3 md:mt-4 bg-yellow-500 text-green-900 px-4 md:px-6 py-2 rounded-full text-sm md:text-base hover:bg-yellow-400 transition">
    Donate Now
</a>
            </div>
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

<!-- Mobile Menu JavaScript -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            
            const svg = menuBtn.querySelector('svg');
            if (!mobileMenu.classList.contains('hidden')) {
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            } else {
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            }
        });
    }

    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            if (menuBtn) {
                const svg = menuBtn.querySelector('svg');
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            }
        });
    });

    // Amount selection
    const amountBtns = document.querySelectorAll('.amount-btn');
    const customAmount = document.getElementById('custom_amount');
    
    amountBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            amountBtns.forEach(b => b.classList.remove('active', 'bg-green-600', 'text-white', 'border-green-600'));
            // Add active class to clicked button
            this.classList.add('active', 'bg-green-600', 'text-white', 'border-green-600');
            // Set custom amount value
            customAmount.value = this.getAttribute('data-amount');
        });
    });
</script>

</body>
</html>