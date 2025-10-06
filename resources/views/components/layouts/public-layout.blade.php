<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="EduConnect - Discover top universities, colleges, and courses to shape your academic future." />
    <meta name="theme-color" content="#1e40af" />
    <meta name="robots" content="index, follow" />
    <title>{{ $title ?? 'EduConnect - Your Academic Journey Starts Here' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries,typography,aspect-ratio"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#3b82f6',
                        accent: '#dbeafe',
                        'background-light': '#f9fafb',
                        'background-dark': '#111827',
                        'text-light': '#1f2937',
                        'text-dark': '#e5e7eb',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    borderRadius: {
                        DEFAULT: '0.5rem',
                        lg: '0.75rem',
                        xl: '1rem',
                    },
                    boxShadow: {
                        card: '0 4px 12px rgba(0, 0, 0, 0.1)',
                        hover: '0 6px 16px rgba(0, 0, 0, 0.15)',
                    },
                    transitionDuration: { DEFAULT: '300ms' },
                },
            },
        };
    </script>
    <link rel="icon" type="image/png" href="/favicon.ico" />
    <style>
        @keyframes slide-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-in {
            animation: slide-in 0.6s ease-out forwards;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-sans text-text-light dark:text-text-dark antialiased">
    <div class="flex min-h-screen flex-col">
        <!-- Header -->
        <header class="sticky top-0 z-50 bg-white dark:bg-background-dark border-b border-gray-200 dark:border-gray-700 shadow-sm">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <a href="{{ route('public.home') }}" class="flex items-center gap-2 transition-transform hover:scale-105 animate-slide-in">
                        <svg class="h-10 w-10 text-primary" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14a6 6 0 100 12 6 6 0 000-12zm0 10a4 4 0 110-8 4 4 0 010 8z"/>
                        </svg>
                        <span class="text-2xl font-bold text-primary">EduConnect</span>
                    </a>

                    <!-- Search Bar (Visible on Medium and Up) -->
                    <div class="hidden md:flex flex-1 mx-8 max-w-md">
                        <div class="relative w-full">
                            <input
                                type="text"
                                placeholder="Search universities, colleges, courses..."
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 py-2 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                aria-label="Search"
                            />
                            <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:text-primary">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="hidden md:flex items-center gap-6">
                        <a href="{{ route('public.home') }}" class="text-sm font-medium hover:text-primary transition-colors animate-slide-in">Home</a>
                        <a href="{{ route('public.universities.index') }}" class="text-sm font-medium hover:text-primary transition-colors animate-slide-in delay-100">Universities</a>
                        <a href="{{ route('public.colleges.index') }}" class="text-sm font-medium hover:text-primary transition-colors animate-slide-in delay-100">Colleges</a>
                        <a href="{{ route('public.courses.index') }}" class="text-sm font-medium hover:text-primary transition-colors animate-slide-in delay-100">Courses</a>
                        <a href="{{ route('public.contact.create') }}" class="text-sm font-medium hover:text-primary transition-colors animate-slide-in delay-100">Contact</a>
                        <a href="{{ route('public.enquiry.create') }}" class="rounded-lg bg-primary text-white px-4 py-2 text-sm font-medium hover:bg-secondary transition-all shadow-card hover:shadow-hover animate-slide-in delay-200">Apply Now</a>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button" class="md:hidden text-gray-600 dark:text-gray-300 hover:text-primary focus:outline-none" aria-label="Toggle menu">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-background-dark border-t border-gray-200 dark:border-gray-700">
                    <div class="container mx-auto px-4 py-4 space-y-2">
                        <a href="{{ route('public.home') }}" class="block text-sm font-medium hover:text-primary py-2 transition-colors">Home</a>
                        <a href="{{ route('public.universities.index') }}" class="block text-sm font-medium hover:text-primary py-2 transition-colors">Universities</a>
                        <a href="{{ route('public.colleges.index') }}" class="block text-sm font-medium hover:text-primary py-2 transition-colors">Colleges</a>
                        <a href="{{ route('public.courses.index') }}" class="block text-sm font-medium hover:text-primary py-2 transition-colors">Courses</a>
                        <a href="{{ route('public.contact.create') }}" class="block text-sm font-medium hover:text-primary py-2 transition-colors">Contact</a>
                        <a href="{{ route('public.enquiry.create') }}" class="block text-sm font-medium bg-primary text-white text-center rounded-lg py-2 mt-2 hover:bg-secondary transition-colors">Apply Now</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-background-dark dark:bg-gray-900 text-gray-300 dark:text-gray-200 border-t border-gray-700 dark:border-gray-600">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- About -->
                    <div class="animate-slide-in">
                        <h3 class="text-lg font-semibold text-white mb-4">About EduConnect</h3>
                        <p class="text-sm">EduConnect connects you with top universities and courses to shape your academic future.</p>
                    </div>

                    <!-- Quick Links -->
                    <div class="animate-slide-in delay-100">
                        <h3 class="text-lg font-semibold text-white mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('public.universities.index') }}" class="text-sm hover:text-primary transition-colors">Universities</a></li>
                            <li><a href="{{ route('public.colleges.index') }}" class="text-sm hover:text-primary transition-colors">Colleges</a></li>
                            <li><a href="{{ route('public.courses.index') }}" class="text-sm hover:text-primary transition-colors">Courses</a></li>
                            <li><a href="{{ route('public.contact.create') }}" class="text-sm hover:text-primary transition-colors">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="animate-slide-in delay-200">
                        <h3 class="text-lg font-semibold text-white mb-4">Stay Updated</h3>
                        <form class="flex flex-col gap-3">
                            <input
                                type="email"
                                placeholder="Enter your email"
                                class="rounded-lg border border-gray-600 bg-gray-800 text-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                                aria-label="Email for newsletter"
                            />
                            <button type="submit" class="rounded-lg bg-primary text-white py-2 text-sm font-medium hover:bg-secondary transition-transform hover:scale-105">Subscribe</button>
                        </form>
                    </div>

                    <!-- Social Media -->
                    <div class="animate-slide-in delay-300">
                        <h3 class="text-lg font-semibold text-white mb-4">Follow Us</h3>
                        <div class="flex gap-4">
                            <a href="#" class="hover:text-primary transition-transform hover:scale-110" aria-label="Facebook">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            </a>
                            <a href="#" class="hover:text-primary transition-transform hover:scale-110" aria-label="Twitter">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="hover:text-primary transition-transform hover:scale-110" aria-label="Instagram">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.33 3.608 1.305.975.975 1.243 2.242 1.305 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.33 2.633-1.305 3.608-.975.975-2.242 1.243-3.608 1.305-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.33-3.608-1.305-.975-.975-1.243-2.242-1.305-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.33-2.633 1.305-3.608.975-.975 2.242-1.243 3.608-1.305 1.266-.058 1.646-.07 4.85-.07m0-2.163c-3.259 0-3.67.014-4.947.072-1.314.064-2.554.343-3.501.831-1.002.504-1.846 1.348-2.351 2.351-.488.947-.767 2.187-.831 3.501-.058 1.277-.072 1.688-.072 4.947s.014 3.67.072 4.947c.064 1.314.343 2.554.831 3.501.504 1.002 1.348 1.846 2.351 2.351.947.488 2.187.767 3.501.831 1.277.058 1.688.072 4.947.072s3.67-.014 4.947-.072c1.314-.064 2.554-.343 3.501-.831 1.002-.504 1.846-1.348 2.351-2.351.488-.947.767-2.187.831-3.501.058-1.277.072-1.688.072-4.947s-.014-3.67-.072-4.947c-.064-1.314-.343-2.554-.831-3.501-.504-1.002-1.348-1.846-2.351-2.351-.947-.488-2.187-.767-3.501-.831-1.277-.058-1.688-.072-4.947-.072z"/><path d="M12 7.378c-2.552 0-4.622 2.07-4.622 4.622 0 2.552 2.07 4.622 4.622 4.622 2.552 0 4.622-2.07 4.622-4.622 0-2.552-2.07-4.622-4.622-4.622zm0 7.378c-1.681 0-3.045-1.364-3.045-3.045 0-1.681 1.364-3.045 3.045-3.045 1.681 0 3.045 1.364 3.045 3.045 0 1.681-1.364 3.045-3.045 3.045zm0-7.378c-2.552 0-4.622 2.07-4.622 4.622s2.07 4.622 4.622 4.622c2.552 0 4.622-2.07 4.622-4.622s-2.07-4.622-4.622-4.622z"/><circle cx="15.625" cy="8.375" r="1.125"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-700 pt-6 text-center">
                    <p class="text-sm">&copy; {{ date('Y') }} EduConnect. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('opacity-0', mobileMenu.classList.contains('hidden'));
            mobileMenu.classList.toggle('translate-y-2', mobileMenu.classList.contains('hidden'));
        });
    </script>
</body>
</html>