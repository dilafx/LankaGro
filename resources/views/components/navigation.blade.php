<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .nav-link-hover {
            position: relative;
        }

        .nav-link-hover::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #65a30d, #84cc16);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link-hover:hover::after {
            width: 80%;
        }

        .gradient-text {
            background: linear-gradient(135deg, #65a30d 0%, #84cc16 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .mobile-menu-active {
            animation: slideDown 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- Navigation Bar -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <!-- Logo Section -->
            <a href="/" class="flex items-center gap-3 group transition-transform duration-300 hover:scale-105">
                <div class="w-12 h-12">
                    <img src="{{ asset('images/LOGO.jpg') }}" alt="LankaGro Logo" class="w-full h-full object-contain">
                </div>
                <div class="flex flex-col">
                    <span class="text-2xl font-black gradient-text tracking-tight leading-none">LankaGro</span>
                    <span class="text-[9px] font-medium text-gray-400 uppercase tracking-widest mt-0.5">Smart Agriculture</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="/about" class="nav-link-hover text-sm font-medium text-gray-700 hover:text-lime-600 transition-colors duration-300 pb-1">About Us</a>
                <a href="/contact" class="nav-link-hover text-sm font-medium text-gray-700 hover:text-lime-600 transition-colors duration-300 pb-1">Contact</a>
                <a href="/news" class="nav-link-hover text-sm font-medium text-gray-700 hover:text-lime-600 transition-colors duration-300 pb-1">News</a>
                <a href="/calculator" class="nav-link-hover text-sm font-medium text-gray-700 hover:text-lime-600 transition-colors duration-300 pb-1">Calculator</a>
                <a href="/tutorial" class="nav-link-hover text-sm font-medium text-gray-700 hover:text-lime-600 transition-colors duration-300 pb-1">Tutorial</a>
                <a href="/solutions" class="nav-link-hover text-sm font-medium text-gray-700 hover:text-lime-600 transition-colors duration-300 pb-1">Solutions</a>
                <a href="/events" class="px-6 py-2.5 text-sm font-semibold text-lime-700 bg-lime-50 rounded-full hover:bg-lime-100 border border-lime-200 hover:border-lime-300 transition-all duration-300 hover:shadow-md">Events</a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <svg id="menuIcon" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="closeIcon" class="w-6 h-6 text-gray-700 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden pb-5 mobile-menu-active">
            <div class="flex flex-col gap-1 pt-2">
                <a href="/about" class="px-4 py-2.5 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50 hover:text-lime-600 transition-all duration-300">About Us</a>
                <a href="/contact" class="px-4 py-2.5 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50 hover:text-lime-600 transition-all duration-300">Contact</a>
                <a href="/news" class="px-4 py-2.5 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50 hover:text-lime-600 transition-all duration-300">News</a>
                <a href="/calculator" class="px-4 py-2.5 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50 hover:text-lime-600 transition-all duration-300">Calculator</a>
                <a href="/tutorial" class="px-4 py-2.5 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50 hover:text-lime-600 transition-all duration-300">Tutorial</a>
                <a href="/solutions" class="px-4 py-2.5 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50 hover:text-lime-600 transition-all duration-300">Solutions</a>
                <a href="/events" class="mx-4 mt-2 px-4 py-2.5 text-sm font-semibold text-lime-700 bg-lime-50 rounded-full hover:bg-lime-100 border border-lime-200 hover:border-lime-300 transition-all duration-300 text-center">Events</a>
            </div>
        </div>
    </div>
</nav>

<!-- Spacer for fixed navigation -->
<div class="h-20"></div>

<script>
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // Close mobile menu on window resize to desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });
</script>

</body>
</html>