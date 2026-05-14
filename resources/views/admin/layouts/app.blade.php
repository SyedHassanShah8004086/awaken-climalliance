<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Admin - Awaken ClimAlliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Mobile menu styles */
        .sidebar {
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
            position: fixed;
            z-index: 50;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar.active {
            transform: translateX(0);
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 40;
        }
        .overlay.active {
            display: block;
        }
        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0);
                position: relative;
                width: 280px;
            }
            .mobile-menu-btn {
                display: none;
            }
            .overlay {
                display: none !important;
            }
        }
        @media (max-width: 767px) {
            .main-content {
                width: 100%;
            }
            .desktop-only {
                display: none;
            }
        }
        /* Table responsive */
        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        table {
            min-width: 600px;
        }
        /* Card responsive */
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }
        @media (min-width: 640px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }
        }
        @media (min-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Overlay -->
    <div id="overlay" class="overlay" onclick="closeSidebar()"></div>
    
    <div class="flex min-h-screen">
        <!-- Sidebar - Only visible for Admin users -->
        @auth
            @if(auth()->user()->is_admin)
            <div id="sidebar" class="sidebar bg-green-800 text-white flex flex-col w-72 fixed md:relative z-50">
                <div class="p-4 text-xl font-bold border-b border-green-700 flex justify-between items-center">
                    <span>🌍 ClimAlliance Admin</span>
                    <button id="closeSidebarBtn" class="md:hidden text-white hover:text-gray-300" onclick="closeSidebar()">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <nav class="mt-4 flex-1 overflow-y-auto pb-20">
                    <a href="/admin" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-chart-line mr-2 w-5"></i> Dashboard
                    </a>
                    <a href="/admin/posts" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-newspaper mr-2 w-5"></i> Posts
                    </a>
                    <a href="/admin/projects" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-project-diagram mr-2 w-5"></i> Projects
                    </a>
                    <a href="/admin/events" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-calendar-alt mr-2 w-5"></i> Events
                    </a>
                    <a href="/admin/partners" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-handshake mr-2 w-5"></i> Partners
                    </a>
                    <a href="/admin/contacts" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-envelope mr-2 w-5"></i> Contacts
                    </a>
                    <a href="/admin/subscribers" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-users mr-2 w-5"></i> Subscribers
                    </a>
                    <a href="/admin/team" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-user-friends mr-2 w-5"></i> Team Members
                    </a>
                    <a href="/admin/donations" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-dollar-sign mr-2 w-5"></i> Donations
                    </a>
                    <a href="/volunteers" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-hands-helping mr-2 w-5"></i> Volunteers
                    </a>

                    <hr class="my-2 border-green-700">
                    
                    <a href="/" class="block py-2.5 px-4 hover:bg-green-700 transition">
                        <i class="fas fa-globe mr-2 w-5"></i> View Site
                    </a>

<a href="/admin/users" class="block py-2.5 px-4 hover:bg-green-700 transition">
    <i class="fas fa-user-shield mr-2 w-5"></i> Admin Users
</a>
                    <form method="POST" action="/logout" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left block py-2.5 px-4 hover:bg-green-700 transition">
                            <i class="fas fa-sign-out-alt mr-2 w-5"></i> Logout
                        </button>
                    </form>
                </nav>
            </div>
            @endif
        @endauth
        
        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Mobile Header -->
            <div class="bg-green-700 text-white p-3 md:hidden flex justify-between items-center sticky top-0 z-30">
                <button id="openSidebarBtn" class="text-white" onclick="openSidebar()">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h1 class="text-lg font-bold">Admin Panel</h1>
                <div class="w-8"></div>
            </div>
            
            <!-- Desktop Header -->
            <div class="hidden md:block bg-white shadow p-4">
                <h1 class="text-2xl font-bold text-gray-800">@yield('title')</h1>
            </div>
            
            <!-- Content -->
            <div class="p-3 sm:p-4 md:p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4 flex items-center justify-between text-sm">
                        <span>{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-green-700">&times;</button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-4 flex items-center justify-between text-sm">
                        <span>{{ session('error') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-red-700">&times;</button>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.add('active');
            document.getElementById('overlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');
            document.body.style.overflow = '';
        }
        
        // Close sidebar when clicking overlay
        document.getElementById('overlay').addEventListener('click', closeSidebar);
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                document.getElementById('sidebar').classList.remove('active');
                document.getElementById('overlay').classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>