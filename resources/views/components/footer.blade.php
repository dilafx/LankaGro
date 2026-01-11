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
            background: #f9fafb;
        }

        /* Premium Footer */
        .premium-footer {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            border-top: 1px solid #e5e7eb;
            position: relative;
            overflow: hidden;
        }

        /* Newsletter Section */
        .newsletter-section {
            background: linear-gradient(135deg, #65a30d 0%, #84cc16 50%, #10b981 100%);
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }

        .newsletter-pattern {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .newsletter-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        .newsletter-content {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 3rem;
            align-items: center;
        }

        .newsletter-text h2 {
            color: white;
            font-size: 2.25rem;
            font-weight: 800;
            margin-bottom: 0.75rem;
            line-height: 1.2;
        }

        .newsletter-text p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.5rem;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .newsletter-input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            background: white;
            color: #1f2937;
            outline: none;
            transition: all 0.3s ease;
        }

        .newsletter-input:focus {
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        }

        .newsletter-input::placeholder {
            color: #9ca3af;
        }

        .newsletter-btn {
            padding: 1rem 2.5rem;
            background: white;
            color: #65a30d;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            white-space: nowrap;
        }

        .newsletter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .newsletter-btn:active {
            transform: translateY(0);
        }

        /* Main Footer Content */
        .footer-main {
            padding: 4rem 0 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        /* Footer Brand */
        .footer-brand {
            max-width: 350px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .footer-logo:hover {
            transform: translateX(5px);
        }

        .footer-logo-icon {
            width: 3.5rem;
            height: 3.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 4px 12px rgba(101, 163, 13, 0.3));
        }

        .footer-logo-text {
            font-size: 1.75rem;
            font-weight: 900;
            background: linear-gradient(135deg, #65a30d 0%, #84cc16 50%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-description {
            color: #6b7280;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .social-link {
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            text-decoration: none;
        }

        .social-link:hover {
            background: linear-gradient(135deg, #65a30d 0%, #84cc16 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(101, 163, 13, 0.3);
        }

        .social-link svg {
            width: 1.15rem;
            height: 1.15rem;
            color: #65a30d;
            transition: color 0.3s ease;
        }

        .social-link:hover svg {
            color: white;
        }

        /* Footer Links */
        .footer-section h3 {
            font-size: 1rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.25rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 2rem;
            height: 2px;
            background: linear-gradient(90deg, #84cc16, transparent);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-link {
            color: #6b7280;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
        }

        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #84cc16;
            transition: width 0.3s ease;
        }

        .footer-link:hover {
            color: #65a30d;
            transform: translateX(5px);
        }

        .footer-link:hover::after {
            width: 100%;
        }

        /* Contact Info */
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1rem;
            color: #6b7280;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .contact-item:hover {
            color: #65a30d;
            transform: translateX(3px);
        }

        .contact-icon {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .contact-item:hover .contact-icon {
            background: linear-gradient(135deg, #84cc16 0%, #65a30d 100%);
        }

        .contact-icon svg {
            width: 1rem;
            height: 1rem;
            color: #65a30d;
            transition: color 0.3s ease;
        }

        .contact-item:hover .contact-icon svg {
            color: white;
        }

        .contact-link {
            color: inherit;
            text-decoration: none;
        }

        /* Footer Bottom */
        .footer-bottom {
            border-top: 1px solid #e5e7eb;
            padding: 1.75rem 0;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .copyright {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .copyright strong {
            color: #65a30d;
            font-weight: 600;
        }

        .footer-bottom-links {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-bottom-link {
            color: #6b7280;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .footer-bottom-link:hover {
            color: #65a30d;
        }

        /* Payment Methods */
        .payment-methods {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            background: #f9fafb;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .payment-methods span {
            font-size: 0.8rem;
            color: #9ca3af;
            font-weight: 600;
        }

        .payment-icon {
            width: 2rem;
            height: 1.5rem;
            background: white;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, #65a30d 0%, #84cc16 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(101, 163, 13, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(101, 163, 13, 0.4);
        }

        .back-to-top svg {
            width: 1.5rem;
            height: 1.5rem;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .newsletter-content {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2.5rem;
            }
        }

        @media (max-width: 640px) {
            .newsletter-section {
                padding: 3rem 0;
            }

            .newsletter-text h2 {
                font-size: 1.75rem;
            }

            .newsletter-form {
                flex-direction: column;
                gap: 0.75rem;
            }

            .newsletter-btn {
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-brand {
                max-width: 100%;
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .footer-bottom-links {
                justify-content: center;
            }

            .payment-methods {
                justify-content: center;
                width: 100%;
            }

            .back-to-top {
                bottom: 1.5rem;
                right: 1.5rem;
                width: 2.75rem;
                height: 2.75rem;
            }
        }
    </style>
</head>
<body>

    <!-- Premium Footer -->
    <footer class="premium-footer">
        
        <!-- Newsletter Section -->
        <div class="newsletter-section">
            <div class="newsletter-pattern"></div>
            <div class="newsletter-container">
                <div class="newsletter-content">
                    <div class="newsletter-text">
                        <h2>Stay Updated with LankaGro</h2>
                        <p>Get the latest agricultural tips, market insights, and exclusive offers delivered to your inbox.</p>
                    </div>
                    <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing!');">
                        <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
                        <button type="submit" class="newsletter-btn">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="footer-main">
            <div class="footer-container">
                <div class="footer-grid">
                    
                    <!-- Brand Section -->
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <div class="footer-logo-icon">
                                <img src="{{ asset('images/LOGO.jpg') }}" alt="LankaGro Logo" class="w-full h-full object-contain">
                            </div>
                            <span class="footer-logo-text">LankaGro</span>
                        </div>
                        <p class="footer-description">
                            Empowering Sri Lankan farmers with innovative solutions, expert guidance, and a thriving community for sustainable agricultural excellence.
                        </p>
                        <div class="social-links">
                            <a href="#" class="social-link" aria-label="Facebook">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="LinkedIn">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="YouTube">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-section">
                        <h3>Quick Links</h3>
                        <ul class="footer-links">
                            <li><a href="/" class="footer-link">Home</a></li>
                            <li><a href="/about" class="footer-link">About Us</a></li>
                            <li><a href="/news" class="footer-link">Latest News</a></li>
                            <li><a href="/events" class="footer-link">Events</a></li>
                            <li><a href="/calculator" class="footer-link">Calculator</a></li>
                        </ul>
                    </div>

                    <!-- Resources -->
                    <div class="footer-section">
                        <h3>Resources</h3>
                        <ul class="footer-links">
                            <li><a href="/tutorial" class="footer-link">Video Tutorials</a></li>
                            <li><a href="/solutions" class="footer-link">Crop Solutions</a></li>
                            <li><a href="/support" class="footer-link">Help Center</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="footer-section">
                        <h3>Contact Us</h3>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span>Colombo, Sri Lanka