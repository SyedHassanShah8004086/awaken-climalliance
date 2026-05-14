<!-- Modern Attractive Navbar Component -->
<nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full z-50 top-0 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2 md:space-x-3 group">
                <div class="relative">
                    <i class="fas fa-leaf text-xl md:text-2xl text-green-600 group-hover:scale-110 transition-transform duration-300"></i>
                    <div class="absolute -inset-1 bg-green-400 rounded-full opacity-0 group-hover:opacity-30 blur-md transition-all duration-300"></div>
                </div>
                <div>
                    <div class="text-lg md:text-xl font-bold bg-gradient-to-r from-green-700 to-green-500 bg-clip-text text-transparent leading-tight">AWAKEN</div>
                    <div class="text-[10px] md:text-xs text-gray-500 -mt-1 tracking-wide">CLIMALLIANCE</div>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-1 lg:space-x-2">
                <a href="/" class="relative px-4 py-2 text-gray-700 hover:text-green-600 transition-all duration-300 group">
                    <span>Home</span>
                    <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-green-500 to-green-600 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                </a>
                <a href="/about" class="relative px-4 py-2 text-gray-700 hover:text-green-600 transition-all duration-300 group">
                    <span>About Us</span>
                    <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-green-500 to-green-600 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                </a>
                <a href="/projects" class="relative px-4 py-2 text-gray-700 hover:text-green-600 transition-all duration-300 group">
                    <span>Projects</span>
                    <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-green-500 to-green-600 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                </a>
                <a href="/events" class="relative px-4 py-2 text-gray-700 hover:text-green-600 transition-all duration-300 group">
                    <span>Events</span>
                    <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-green-500 to-green-600 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                </a>
                <a href="/blog" class="relative px-4 py-2 text-gray-700 hover:text-green-600 transition-all duration-300 group">
                    <span>Blog</span>
                    <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-green-500 to-green-600 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                </a>
                <a href="/contact" class="relative px-4 py-2 text-gray-700 hover:text-green-600 transition-all duration-300 group">
                    <span>Contact</span>
                    <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-green-500 to-green-600 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                </a>
            </div>

            <!-- Auth Buttons - Only visible when logged in -->
            <div class="hidden md:flex space-x-3">
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="/admin/dashboard" class="px-5 py-2 rounded-full font-semibold text-sm bg-blue-600 text-white hover:bg-blue-700 transition-all duration-300 hover:scale-105 shadow-md">
                            <i class="fas fa-tachometer-alt mr-1"></i> Admin Panel
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-5 py-2 rounded-full font-semibold text-sm border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 hover:scale-105 shadow-sm">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden relative w-10 h-10 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-all duration-300">
                <div class="absolute w-6 h-6">
                    <span class="bar1 absolute top-0 left-0 w-full h-0.5 bg-gray-700 transition-all duration-300"></span>
                    <span class="bar2 absolute top-2 left-0 w-full h-0.5 bg-gray-700 transition-all duration-300"></span>
                    <span class="bar3 absolute top-4 left-0 w-full h-0.5 bg-gray-700 transition-all duration-300"></span>
                </div>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed top-16 right-0 w-72 bg-white/95 backdrop-blur-md shadow-2xl rounded-l-2xl z-40 md:hidden hidden">
        <div class="flex flex-col py-4">
            <a href="/" class="px-6 py-3 mx-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Home</a>
            <a href="/about" class="px-6 py-3 mx-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition">About Us</a>
            <a href="/projects" class="px-6 py-3 mx-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Projects</a>
            <a href="/events" class="px-6 py-3 mx-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Events</a>
            <a href="/blog" class="px-6 py-3 mx-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Blog</a>
            <a href="/contact" class="px-6 py-3 mx-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Contact</a>
            <hr class="my-2 mx-4 border-gray-100">
            @auth
                @if(auth()->user()->is_admin)
                    <a href="/admin/dashboard" class="px-6 py-3 mx-2 rounded-lg bg-blue-600 text-white text-center hover:bg-blue-700 transition">
                        <i class="fas fa-tachometer-alt mr-2"></i> Admin Panel
                    </a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="mx-2">
                    @csrf
                    <button type="submit" class="w-full px-6 py-3 rounded-lg text-red-600 border border-red-600 text-center hover:bg-red-600 hover:text-white transition">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const bar1 = document.querySelector('.bar1');
        const bar2 = document.querySelector('.bar2');
        const bar3 = document.querySelector('.bar3');

        if (menuButton) {
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                if (!mobileMenu.classList.contains('hidden')) {
                    bar1.style.transform = 'rotate(45deg)';
                    bar1.style.top = '8px';
                    bar2.style.opacity = '0';
                    bar3.style.transform = 'rotate(-45deg)';
                    bar3.style.top = '8px';
                } else {
                    bar1.style.transform = 'rotate(0deg)';
                    bar1.style.top = '0px';
                    bar2.style.opacity = '1';
                    bar3.style.transform = 'rotate(0deg)';
                    bar3.style.top = '16px';
                }
            });
        }

        document.querySelectorAll('#mobile-menu a, #mobile-menu button').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                if (bar1 && bar2 && bar3) {
                    bar1.style.transform = 'rotate(0deg)';
                    bar1.style.top = '0px';
                    bar2.style.opacity = '1';
                    bar3.style.transform = 'rotate(0deg)';
                    bar3.style.top = '16px';
                }
            });
        });

        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-xl', 'bg-white/95');
            } else {
                navbar.classList.remove('shadow-xl');
                navbar.classList.add('shadow-lg');
            }
        });
    });
</script>

<style>
    nav { transition: all 0.3s ease; }
    #mobile-menu { transform-origin: top; animation: slideDown 0.3s ease-out; }
    @keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
    a, button { transition: all 0.3s ease; }
</style>