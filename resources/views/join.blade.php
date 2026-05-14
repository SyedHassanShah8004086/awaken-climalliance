<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Join Us - Awaken ClimAlliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
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
            50% { transform: translateY(-10px); }
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
        
        .gradient-text {
            background: linear-gradient(135deg, #15803d 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        
        .hover-scale:hover {
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
            border-color: #22c55e;
            outline: none;
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- Navbar -->
@include('components.navbar')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-yellow-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-green-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6 animate-fadeInUp">🤝 Join the Movement</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 animate-fadeInUp delay-100">Become a <span class="text-yellow-300">Changemaker</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6 animate-fadeInUp delay-200"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto animate-fadeInUp delay-300 leading-relaxed">
            Join our global network of climate activists and make a <span class="font-semibold text-yellow-300">real difference</span>
        </p>
    </div>
    
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full">
            <path fill="#f3f4f6" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,96C960,107,1056,117,1152,112C1248,107,1344,85,1392,74.7L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 md:py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Left Column - Benefits -->
            <div class="animate-fadeInUp">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Why Join Us?</h2>
                    </div>
                    
                    <div class="space-y-5">
                        <div class="flex gap-4 group hover:translate-x-2 transition duration-300">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check-circle text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-lg">Make an Impact</h3>
                                <p class="text-gray-600">Contribute to meaningful climate action projects that create real change.</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4 group hover:translate-x-2 transition duration-300">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-users text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-lg">Connect with Leaders</h3>
                                <p class="text-gray-600">Network with climate activists, experts, and organizations worldwide.</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4 group hover:translate-x-2 transition duration-300">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-graduation-cap text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-lg">Learn & Grow</h3>
                                <p class="text-gray-600">Access training, resources, and workshops to enhance your skills.</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4 group hover:translate-x-2 transition duration-300">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-globe text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-lg">Global Community</h3>
                                <p class="text-gray-600">Be part of a worldwide movement dedicated to climate action.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-green-600">300+</div>
                        <div class="text-xs text-gray-600">Members</div>
                    </div>
                    <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-green-600">50+</div>
                        <div class="text-xs text-gray-600">Events</div>
                    </div>
                    <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold text-green-600">10+</div>
                        <div class="text-xs text-gray-600">Partners</div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Join Form -->
            <div class="animate-fadeInUp delay-200">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-pen-alt text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Join Application</h2>
                    </div>
                    
                    @if(session('success'))
                        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg mb-6">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-6">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('join.submit') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-user mr-2 text-green-600"></i> Full Name *
                            </label>
                            <input type="text" name="name" required 
                                   class="input-focus w-full border border-gray-300 rounded-xl px-4 py-3 transition-all">
                        </div>
                        
                        <div class="mb-5">
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-envelope mr-2 text-green-600"></i> Email Address *
                            </label>
                            <input type="email" name="email" required 
                                   class="input-focus w-full border border-gray-300 rounded-xl px-4 py-3 transition-all">
                        </div>
                        
                        <div class="mb-5">
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-phone-alt mr-2 text-green-600"></i> Phone Number
                            </label>
                            <input type="tel" name="phone" 
                                   class="input-focus w-full border border-gray-300 rounded-xl px-4 py-3 transition-all">
                        </div>
                        
                        <div class="mb-5">
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-comment mr-2 text-green-600"></i> Why do you want to join?
                            </label>
                            <textarea name="message" rows="4" 
                                      class="input-focus w-full border border-gray-300 rounded-xl px-4 py-3 transition-all resize-none"></textarea>
                        </div>
                        
                        <button type="submit" class="group w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition-all duration-300 hover:scale-105 shadow-md flex items-center justify-center gap-2">
                            Submit Application <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </form>
                    
                    <div class="mt-6 pt-6 border-t border-gray-100 text-center">
                        <p class="text-sm text-gray-500">Or contact us directly:</p>
                        <a href="mailto:info@awakenclimalliance.org" class="text-green-600 font-semibold hover:text-green-700">info@awakenclimalliance.org</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">What Our <span class="gradient-text">Members Say</span></h2>
        <div class="w-20 h-1 bg-green-600 mx-auto rounded-full mb-10"></div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <i class="fas fa-quote-left text-3xl text-green-400 mb-4"></i>
                <p class="text-gray-600 mb-4">"Joining Awaken ClimAlliance has been life-changing. I've connected with amazing people and made a real impact."</p>
                <div class="font-semibold text-gray-800">- Sarah Khan</div>
                <div class="text-sm text-gray-500">Climate Activist</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <i class="fas fa-quote-left text-3xl text-green-400 mb-4"></i>
                <p class="text-gray-600 mb-4">"The resources and network provided have helped me launch my own climate initiative in my community."</p>
                <div class="font-semibold text-gray-800">- Ahmed Raza</div>
                <div class="text-sm text-gray-500">Youth Leader</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <i class="fas fa-quote-left text-3xl text-green-400 mb-4"></i>
                <p class="text-gray-600 mb-4">"A wonderful community dedicated to making our planet better. Proud to be part of this movement!"</p>
                <div class="font-semibold text-gray-800">- Fatima Ali</div>
                <div class="text-sm text-gray-500">Environmentalist</div>
            </div>
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