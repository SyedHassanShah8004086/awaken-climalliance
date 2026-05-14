<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>About Us - Awaken ClimAlliance</title>
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
        .delay-500 { animation-delay: 0.5s; }
        
        /* Hover Effects */
        .hover-card {
            transition: all 0.3s ease;
        }
        
        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
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
        
        /* Value Card Styles */
        .value-card {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .value-card:hover {
            border-left-color: #22c55e;
            transform: translateX(5px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
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
<body class="bg-white">

<!-- Navbar -->
@include('components.navbar')

<!-- About Header with Parallax Effect -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-yellow-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-green-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6 animate-fadeInUp">🌟 Who We Are</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 animate-fadeInUp delay-100">About <span class="gradient-text">Us</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6 animate-fadeInUp delay-200"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto animate-fadeInUp delay-300 leading-relaxed">
            Empowering youth and indigenous communities for climate action in <span class="font-semibold text-yellow-300">Gilgit-Baltistan</span> and beyond.
        </p>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full">
            <path fill="#ffffff" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,96C960,107,1056,117,1152,112C1248,107,1344,85,1392,74.7L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Mission Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="animate-fadeInLeft">
                <span class="text-green-600 font-semibold text-sm uppercase tracking-wide">Our Mission</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">Awakening Climate <span class="gradient-text">Leadership</span></h2>
                <div class="w-16 h-1 bg-green-600 rounded-full mb-6"></div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Awaken ClimAlliance is a <span class="font-semibold text-green-700">youth-led climate initiative</span> dedicated to awakening climate leadership from the mountains of Gilgit-Baltistan.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    We work with local communities, indigenous groups, and youth to build resilience, promote sustainable practices, and drive climate action at the grassroots level.
                </p>
                
                <div class="mt-6 flex gap-4">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        <span class="text-gray-700">Community First</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        <span class="text-gray-700">Youth Powered</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        <span class="text-gray-700">Action Driven</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 md:p-10 rounded-2xl text-center animate-fadeInRight hover-card">
                <div class="inline-block p-4 bg-white rounded-full shadow-lg mb-6 animate-float">
                    <i class="fas fa-mountain text-4xl md:text-5xl text-green-600"></i>
                </div>
                <i class="fas fa-quote-left text-3xl text-green-400 mb-4 opacity-50"></i>
                <p class="text-gray-700 italic text-lg md:text-xl font-medium">"From the mountains, we rise for climate justice"</p>
                <p class="text-gray-500 mt-4 text-sm"> Asif Ali —— Founder AWAKEN CLIMALLIANCE</p>
            </div>
        </div>
    </div>
</section>

<!-- Vision Section -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-green-600 font-semibold text-sm uppercase tracking-wide">Our Vision</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">Looking <span class="gradient-text">Ahead</span></h2>
            <div class="w-20 h-1 bg-green-600 mx-auto rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">We envision a world where communities thrive in harmony with nature</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover-card">
                <div class="w-20 h-20 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-5 shadow-md">
                    <i class="fas fa-tree text-3xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Sustainable Future</h3>
                <p class="text-gray-600">A future where communities live in harmony with nature, respecting ecological boundaries.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover-card">
                <div class="w-20 h-20 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-5 shadow-md">
                    <i class="fas fa-users text-3xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Youth Empowerment</h3>
                <p class="text-gray-600">Empowering young leaders to drive climate change and shape their own destiny.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover-card">
                <div class="w-20 h-20 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-5 shadow-md">
                    <i class="fas fa-globe-asia text-3xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Global Impact</h3>
                <p class="text-gray-600">Creating ripples of change from the mountains to communities worldwide.</p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-green-600 font-semibold text-sm uppercase tracking-wide">Core Values</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">What We <span class="gradient-text">Stand For</span></h2>
            <div class="w-20 h-1 bg-green-600 mx-auto rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">Our guiding principles that shape everything we do</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-6">
            <div class="value-card bg-gradient-to-r from-gray-50 to-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all">
                <div class="flex gap-5">
                    <div class="text-4xl">🌱</div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Environmental Stewardship</h3>
                        <p class="text-gray-600">Protecting and preserving our natural resources for future generations through sustainable practices.</p>
                    </div>
                </div>
            </div>
            
            <div class="value-card bg-gradient-to-r from-gray-50 to-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all">
                <div class="flex gap-5">
                    <div class="text-4xl">🤝</div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Community Collaboration</h3>
                        <p class="text-gray-600">Working together with local communities for lasting change that respects cultural values.</p>
                    </div>
                </div>
            </div>
            
            <div class="value-card bg-gradient-to-r from-gray-50 to-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all">
                <div class="flex gap-5">
                    <div class="text-4xl">💡</div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Indigenous Wisdom</h3>
                        <p class="text-gray-600">Respecting and integrating traditional ecological knowledge into modern climate solutions.</p>
                    </div>
                </div>
            </div>
            
            <div class="value-card bg-gradient-to-r from-gray-50 to-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all">
                <div class="flex gap-5">
                    <div class="text-4xl">⚡</div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Youth Leadership</h3>
                        <p class="text-gray-600">Empowering young people to lead climate action initiatives and drive meaningful change.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-4">Meet Our Team</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Our <span class="gradient-text">Leadership</span></h2>
            <div class="w-20 h-1 bg-green-600 mx-auto rounded-full mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Dedicated individuals working tirelessly for climate action</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($teamMembers as $member)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <div class="relative">
                    <div class="h-64 bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                        @if($member->image && file_exists(public_path($member->image)))
                            <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user-circle text-8xl text-white opacity-70"></i>
                        @endif
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4">
                        <h3 class="text-xl font-bold text-white">{{ $member->name }}</h3>
                        <p class="text-sm text-white/80">{{ $member->position }}</p>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($member->bio, 100) }}</p>
                    <div class="flex justify-center gap-3">
                        @if($member->linkedin)
                            <a href="{{ $member->linkedin }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-600 hover:text-white transition">
                                <i class="fab fa-linkedin-in text-sm"></i>
                            </a>
                        @endif
                        @if($member->twitter)
                            <a href="{{ $member->twitter }}" target="_blank" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-400 hover:text-white transition">
                                <i class="fab fa-twitter text-sm"></i>
                            </a>
                        @endif
                        @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-green-600 hover:text-white transition">
                                <i class="fas fa-envelope text-sm"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500 py-10">
                <i class="fas fa-users text-5xl mb-3 opacity-30"></i>
                <p>Team members coming soon.</p>
            </div>
            @endforelse
        </div>
        
        <!-- View All Team Button -->
        @if($totalTeamMembers > 3)
        <div class="text-center mt-12">
            <a href="/team" class="inline-flex items-center gap-2 bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 hover:scale-105 shadow-md group">
                View All Team ({{ $totalTeamMembers }}) 
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition"></i>
            </a>
        </div>
        @endif
    </div>
</section>


<!-- Impact Numbers Section -->
<section class="py-16 md:py-20 bg-gradient-to-r from-green-800 to-green-700 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <i class="fas fa-chart-line text-8xl absolute top-20 left-10"></i>
        <i class="fas fa-users text-8xl absolute bottom-20 right-10"></i>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6">Our Impact So Far</span>
        <h2 class="text-3xl md:text-4xl font-bold mb-12">Making a <span class="text-yellow-300">Difference</span></h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center animate-fadeInUp">
                <div class="text-4xl md:text-5xl font-bold text-yellow-400 mb-2">300+</div>
                <p class="text-sm uppercase tracking-wide opacity-90">Youth Trained</p>
            </div>
            <div class="text-center animate-fadeInUp delay-100">
                <div class="text-4xl md:text-5xl font-bold text-yellow-400 mb-2">50+</div>
                <p class="text-sm uppercase tracking-wide opacity-90">Awareness Sessions</p>
            </div>
            <div class="text-center animate-fadeInUp delay-200">
                <div class="text-4xl md:text-5xl font-bold text-yellow-400 mb-2">10+</div>
                <p class="text-sm uppercase tracking-wide opacity-90">Global Partners</p>
            </div>
            <div class="text-center animate-fadeInUp delay-300">
                <div class="text-4xl md:text-5xl font-bold text-yellow-400 mb-2">5+</div>
                <p class="text-sm uppercase tracking-wide opacity-90">Active Projects</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-3xl p-8 md:p-12 shadow-xl">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Join Our <span class="gradient-text">Movement</span></h2>
            <p class="text-gray-600 text-lg mb-6">Be part of the change. Together, we can make a difference for our planet.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/join" class="group bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">
                    Get Involved <i class="fas fa-arrow-right group-hover:translate-x-1 transition"></i>
                </a>
                <a href="/contact" class="bg-transparent border-2 border-green-600 text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-green-600 hover:text-white transition-all duration-300 inline-flex items-center gap-2">
                    Contact Us <i class="fas fa-envelope"></i>
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
</script>

</body>
</html>