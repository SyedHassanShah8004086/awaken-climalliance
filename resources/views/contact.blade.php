<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Contact Us - Awaken ClimAlliance</title>
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
        .contact-card, .form-card {
            transition: all 0.3s ease;
        }
        
        .contact-card:hover, .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }
        
        .social-icon {
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            transform: translateY(-3px) scale(1.1);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #15803d 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Input Focus Effects */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
            border-color: #22c55e;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
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

@include('components.navbar')

<!-- Contact Header with Parallax Effect -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-yellow-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-green-400 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6 animate-fadeInUp">📞 Get in Touch</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 animate-fadeInUp delay-100">Contact <span class="gradient-text">Us</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6 animate-fadeInUp delay-200"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto animate-fadeInUp delay-300 leading-relaxed">
            Get in touch with us for <span class="font-semibold text-yellow-300">partnerships, inquiries, or support</span>
        </p>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full">
            <path fill="#ffffff" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,96C960,107,1056,117,1152,112C1248,107,1344,85,1392,74.7L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-8 md:gap-12">
            <!-- Contact Info Card -->
            <div class="contact-card bg-white rounded-2xl shadow-lg p-6 md:p-8 animate-fadeInLeft">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-info-circle text-green-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Get in Touch</h2>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4 group">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-600 transition-colors duration-300">
                            <i class="fas fa-map-marker-alt text-green-600 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Address</h3>
                            <p class="text-gray-600">Gilgit-Baltistan, Pakistan</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 group">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-600 transition-colors duration-300">
                            <i class="fas fa-envelope text-green-600 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600">info@awakenclimalliance.org</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 group">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-600 transition-colors duration-300">
                            <i class="fas fa-phone text-green-600 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Phone</h3>
                            <p class="text-gray-600">+92 300 1234567</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-share-alt text-green-600"></i> Follow Us
                    </h3>
                    <div class="flex space-x-3">
                        <a href="#" class="social-icon w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 hover:bg-green-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 hover:bg-green-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 hover:bg-green-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 hover:bg-green-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Working Hours -->
                <div class="mt-6 p-4 bg-green-50 rounded-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-clock text-green-600"></i>
                        <span class="font-semibold text-gray-800">Working Hours</span>
                    </div>
                    <p class="text-sm text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                    <p class="text-sm text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                    <p class="text-sm text-gray-600">Sunday: Closed</p>
                </div>
            </div>

            <!-- Contact Form Card -->
            <div class="form-card bg-white rounded-2xl shadow-lg p-6 md:p-8 animate-fadeInRight">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-paper-plane text-green-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Send us a Message</h2>
                </div>
                
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg mb-6 animate-fadeInUp">
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

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-green-600"></i> Your Name *
                        </label>
                        <input type="text" name="name" required 
                               class="input-focus w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-envelope mr-2 text-green-600"></i> Email Address *
                        </label>
                        <input type="email" name="email" required 
                               class="input-focus w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-tag mr-2 text-green-600"></i> Subject
                        </label>
                        <input type="text" name="subject" 
                               class="input-focus w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-comment mr-2 text-green-600"></i> Message *
                        </label>
                        <textarea name="message" rows="5" required 
                               class="input-focus w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition resize-none"></textarea>
                    </div>
                    
                    <button type="submit" class="group w-full bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-xl hover:from-green-700 hover:to-green-800 transition-all duration-300 font-semibold shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                        Send Message 
                        <i class="fas fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-8 md:py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="relative overflow-hidden rounded-2xl shadow-xl">
            <div class="bg-gradient-to-r from-green-700 to-green-600 h-64 md:h-96 flex flex-col items-center justify-center text-white relative">
                <div class="absolute inset-0 bg-black opacity-20"></div>
                <div class="relative z-10 text-center">
                    <i class="fas fa-map-marker-alt text-5xl mb-4 animate-float"></i>
                    <h3 class="text-2xl font-bold mb-2">Our Location</h3>
                    <p class="text-lg">Gilgit-Baltistan, Pakistan</p>
                    <p class="text-sm opacity-80 mt-4">📍 Interactive map coming soon</p>
                </div>
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