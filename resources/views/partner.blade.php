<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Partner With Us - Awaken ClimAlliance</title>
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
        
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-pulse-slow {
            animation: pulse 3s ease-in-out infinite;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        
        .gradient-text {
            background: linear-gradient(135deg, #15803d 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
            border-color: #22c55e;
            outline: none;
        }
        
        .benefit-card {
            transition: all 0.3s ease;
        }
        
        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">

@include('components.navbar')

<!-- Partner Header -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-yellow-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-green-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6 animate-fadeInUp">🤝 Collaborate With Us</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 animate-fadeInUp delay-100">Partner <span class="text-yellow-300">With Us</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6 animate-fadeInUp delay-200"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto animate-fadeInUp delay-300 leading-relaxed">
            Join forces with us to create a <span class="font-semibold text-yellow-300">sustainable future for all</span>
        </p>
    </div>
    
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full">
            <path fill="#f3f4f6" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,96C960,107,1056,117,1152,112C1248,107,1344,85,1392,74.7L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Partner Content -->
<section class="py-16 md:py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Left Column - Benefits -->
            <div class="space-y-6 animate-fadeInUp delay-100">
                <div class="bg-white rounded-2xl shadow-lg p-6 benefit-card">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chart-line text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Amplify Impact</h3>
                            <p class="text-gray-600">Reach wider audiences and create bigger change together.</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6 benefit-card">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-bullhorn text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Increase Visibility</h3>
                            <p class="text-gray-600">Showcase your commitment to climate action globally.</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6 benefit-card">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-handshake text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Network & Collaborate</h3>
                            <p class="text-gray-600">Connect with like-minded organizations worldwide.</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6 benefit-card">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-seedling text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Sustainable Growth</h3>
                            <p class="text-gray-600">Grow together for a better, greener future.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Partner Form -->
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 animate-fadeInUp delay-200">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-2xl text-green-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Become a Partner</h2>
                    <p class="text-gray-600 mt-2">Fill out the form below and our team will get back to you.</p>
                </div>
                
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg mb-6">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
                
                <form action="{{ route('partner.submit') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-building mr-2 text-green-600"></i> Organization Name *
                        </label>
                        <input type="text" name="organization" required 
                               class="form-input w-full border border-gray-300 rounded-xl px-4 py-3 transition-all">
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-green-600"></i> Contact Person *
                        </label>
                        <input type="text" name="contact_person" required 
                               class="form-input w-full border border-gray-300 rounded-xl px-4 py-3 transition-all">
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-envelope mr-2 text-green-600"></i> Email Address *
                        </label>
                        <input type="email" name="email" required 
                               class="form-input w-full border border-gray-300 rounded-xl px-4 py-3 transition-all">
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-phone-alt mr-2 text-green-600"></i> Phone Number
                        </label>
                        <input type="tel" name="phone" 
                               class="form-input w-full border border-gray-300 rounded-xl px-4 py-3 transition-all">
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-comment mr-2 text-green-600"></i> Message
                        </label>
                        <textarea name="message" rows="4" 
                                  class="form-input w-full border border-gray-300 rounded-xl px-4 py-3 transition-all resize-none"></textarea>
                    </div>
                    
                    <button type="submit" class="group w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition-all duration-300 hover:scale-105 shadow-md flex items-center justify-center gap-2">
                        Send Partnership Request 
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </form>
                
                <div class="mt-6 pt-6 border-t border-gray-100 text-center">
                    <p class="text-sm text-gray-500">Or contact us directly:</p>
                    <a href="mailto:partners@awakenclimalliance.org" class="text-green-600 font-semibold hover:text-green-700">
                        partners@awakenclimalliance.org
                    </a>
                </div>
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