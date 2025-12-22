<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #fafafa;
        }

        /* Navigation Styles */
        .main-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(16, 185, 129, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-nav.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0.75rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .logo-section:hover {
            transform: translateY(-2px);
        }

        .logo-icon {
            width: 5rem;
            height: 5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 4px 12px rgba(101, 163, 13, 0.3));
        }

        .logo-section:hover .logo-icon {
            transform: scale(1.05);
        }

        .logo-text {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(135deg, #65a30d 0%, #84cc16 50%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.02em;
        }

        .logo-subtitle {
            font-size: 0.7rem;
            color: #6b7280;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: #374151;
            border-radius: 12px;
            text-decoration: none;
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .nav-link:hover::before {
            opacity: 1;
        }

        .nav-link:hover {
            color: #059669;
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #65a30d 0%, #84cc16 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(101, 163, 13, 0.4);
        }

        .nav-link.active::before {
            display: none;
        }

        .mobile-menu-btn {
            display: none;
            padding: 0.75rem;
            border: none;
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .mobile-menu {
            display: none;
            margin-top: 1.5rem;
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            animation: slideDown 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mobile-menu.active {
            display: block;
        }

        .mobile-nav-link {
            display: block;
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: #374151;
            border-radius: 12px;
            text-decoration: none;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .mobile-nav-link:hover {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            color: #059669;
            transform: translateX(8px);
        }

        /* Footer Styles */


        /* Responsive */
        @media (max-width: 1024px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2.5rem;
            }
        }

        @media (max-width: 640px) {
            .nav-container {
                padding: 0.75rem 1.5rem;
            }

            .logo-icon {
                width: 4rem;
                height: 4rem;
            }

            .logo-text {
                font-size: 1.5rem;
            }


        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="main-nav" id="mainNav">
        <div class="nav-container">
            <div class="logo-section" onclick="window.location.href='/'">
                <div class="logo-icon">
                    <img src="{{ asset('images/LOGO.jpg') }}" alt="Logo">
                </div>
                <div>
                    <div class="logo-text">LankaGro</div>
                    <div class="logo-subtitle">Smart Agriculture</div>
                </div>
            </div>

            <div class="nav-links" id="navLinks">

                <a href="/news" class="nav-link">News</a>
                <a href="/calculator" class="nav-link">Calculator</a>
                <a href="/tutorial" class="nav-link">Tutorial</a>
                <a href="/solutions" class="nav-link">Crop Solutions</a>
                <a href="/about" class="nav-link">About Us</a>
                <a href="/contact" class="nav-link">Contact</a>
                  <a href="/events" class="nav-link active">Events</a>
            </div>

            <button class="mobile-menu-btn" id="mobileMenuBtn" onclick="toggleMobileMenu()">
                <svg style="width: 1.75rem; height: 1.75rem; color: #65a30d;" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <div class="mobile-menu" id="mobileMenu">
            <a href="/" class="mobile-nav-link">Home</a>
            <a href="/news" class="mobile-nav-link">News</a>
            <a href="/calculator" class="mobile-nav-link">Calculator</a>
            <a href="/tutorial" class="mobile-nav-link">Tutorial</a>
            <a href="/solutions" class="mobile-nav-link">Solutions</a>
            <a href="/about" class="mobile-nav-link">About Us</a>
            <a href="/contact" class="mobile-nav-link">Contact Us</a>
            <a href="/events" class="mobile-nav-link">Events</a>
        </div>
    </nav>

    <!-- Spacer -->
    <div style="height: 95px;"></div>
