 
<x-layouts.public-layout title="EduConnect - Find Your Perfect Academic Path">
    <!-- Hero Section with Enhanced Slider -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-ivory">
        <div class="relative w-full h-[60vh] overflow-hidden">
            <div class="slider-container flex w-full h-full transition-transform duration-700 ease-in-out">
                @foreach ($sliders as $index => $slider)
                    <div class="slider-item flex-shrink-0 w-full h-full bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.4)), url('{{ $slider['image'] }}');" data-index="{{ $index }}" role="region" aria-label="Hero slider">
                        <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-center text-center">
                            <div class="animate-on-scroll">
                                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-jade">{{ $slider['caption'] }}</h1>
                                <p class="mx-auto mt-3 max-w-xl text-sm sm:text-base text-sakura">{{ $slider['sub_caption'] }}</p>
                                <a href="{{ route('public.enquiry.create') }}" class="mt-5 inline-flex h-10 items-center justify-center rounded-lg bg-jade px-5 text-sm font-semibold text-ivory hover:bg-jade-dark hover:scale-105 transition-all shadow-md" aria-label="Get started with {{ $slider['caption'] }}">Get Started</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Slider Navigation -->
            <div class="absolute bottom-3 left-0 right-0 flex justify-center gap-2">
                @foreach ($sliders as $index => $slider)
                    <button class="slider-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-sakura transition {{ $index === 0 ? 'bg-sakura scale-125' : '' }}" data-index="{{ $index }}" aria-label="Go to slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-10 bg-gradient-to-b from-ivory dark:from-gray-800 to-transparent">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
            <div class="relative animate-on-scroll">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-500 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input
                    type="search"
                    placeholder="Search universities, colleges, or courses..."
                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-jade transition-all text-gray-800 dark:text-gray-200 placeholder-gray-500 dark:placeholder-gray-400"
                    aria-label="Search for universities, colleges, or courses"
                />
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-10 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
            <div class="text-center animate-on-scroll">
                <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-jade-dark dark:text-jade">About EduConnect</h2>
                <p class="mt-3 max-w-2xl mx-auto text-sm sm:text-base text-gray-600 dark:text-gray-300">EduConnect empowers students to find their ideal academic path by connecting them with top universities and courses worldwide. Our platform simplifies the journey with curated resources and personalized guidance.</p>
            </div>
        </div>
    </section>

    <!-- Featured Universities -->
    <section class="py-10 bg-gradient-to-b from-ivory dark:from-gray-800 to-transparent">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-jade-dark dark:text-jade text-center mb-6 animate-on-scroll">Featured Universities</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($universities as $university)
                    <a href="{{ route('public.universities.show', ['slug' => $university->slug]) }}" class="group flex flex-col rounded-lg bg-white dark:bg-gray-900 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 animate-on-scroll">
                        <div class="aspect-w-16 aspect-h-9 overflow-hidden rounded-t-lg">
                            <img alt="{{ $university->name }}" class="w-full h-full object-cover object-center transition-transform group-hover:scale-105" src="{{ $university->logo_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                        </div>
                        <div class="p-3">
                            <h3 class="text-base font-semibold text-jade-dark dark:text-jade line-clamp-1">{{ $university->name }}</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">{{ $university->location ?? 'Location not available' }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Top Colleges -->
    <section class="py-10 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-jade-dark dark:text-jade text-center mb-6 animate-on-scroll">Top Colleges</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($colleges as $college)
                    <div class="group flex flex-col rounded-lg bg-white dark:bg-gray-900 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 animate-on-scroll">
                        <div class="aspect-w-16 aspect-h-9 overflow-hidden rounded-t-lg">
                            <img alt="{{ $college->name }}" class="w-full h-full object-cover object-center transition-transform group-hover:scale-105" src="{{ $college->logo_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                        </div>
                        <div class="p-3">
                            <h3 class="text-base font-semibold text-jade-dark dark:text-jade line-clamp-1">{{ $college->name }}</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">{{ $college->university_id ? \App\Models\University::find($college->university_id)->name ?? 'N/A' : 'Independent' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Courses -->
    <section class="py-10 bg-gradient-to-b from-ivory dark:from-gray-800 to-transparent">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-jade-dark dark:text-jade text-center mb-6 animate-on-scroll">Popular Courses</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($courses as $course)
                    <div class="group flex flex-col rounded-lg bg-white dark:bg-gray-900 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 animate-on-scroll">
                        <div class="aspect-w-16 aspect-h-9 overflow-hidden rounded-t-lg">
                            <img alt="{{ $course->name }}" class="w-full h-full object-cover object-center transition-transform group-hover:scale-105" src="{{ $course->image_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                        </div>
                        <div class="p-3">
                            <h3 class="text-base font-semibold text-jade-dark dark:text-jade line-clamp-1">{{ $course->name }}</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">{{ $course->duration ?? 'Duration not available' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-10 bg-sakura/10 dark:bg-sakura/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl text-center animate-on-scroll">
            <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-jade-dark dark:text-jade">Ready to Start Your Journey?</h2>
            <a href="{{ route('public.universities.show', ['slug' => 'test-university']) }}" class="mt-5 inline-flex h-10 items-center justify-center rounded-lg bg-jade px-5 text-sm font-semibold text-ivory hover:bg-jade-dark hover:scale-105 transition-all shadow-md" aria-label="Explore universities">Explore More</a>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-10 bg-gradient-to-b from-ivory dark:from-gray-800 to-transparent">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-jade-dark dark:text-jade text-center mb-6 animate-on-scroll">Testimonials</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse ($testimonials as $testimonial)
                    <div class="rounded-lg bg-white dark:bg-gray-900 p-4 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 animate-on-scroll">
                        <div class="flex items-center gap-2">
                            <img alt="{{ $testimonial->name }}" class="h-10 w-10 rounded-full object-cover" src="{{ $testimonial->photo_path ?: 'https://via.placeholder.com/40' }}" loading="lazy">
                            <div>
                                <p class="text-sm font-semibold text-jade-dark dark:text-jade">{{ $testimonial->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $testimonial->date->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <div class="mt-2 flex text-sakura">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="h-4 w-4" fill="{{ $i <= $testimonial->rating ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="mt-2 text-xs text-gray-600 dark:text-gray-300 line-clamp-2">{{ $testimonial->comment }}</p>
                    </div>
                @empty
                    <p class="text-center text-sm text-gray-600 dark:text-gray-300">No testimonials available yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Slider Functionality
            const sliderContainer = document.querySelector('.slider-container');
            const sliderItems = document.querySelectorAll('.slider-item');
            const sliderDots = document.querySelectorAll('.slider-dot');
            const prevButton = document.querySelector('.slider-prev');
            const nextButton = document.querySelector('.slider-next');
            let currentIndex = 0;
            const totalSlides = sliderItems.length;

            const updateSlider = () => {
                sliderContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
                sliderDots.forEach((dot, i) => {
                    dot.classList.toggle('bg-sakura', i === currentIndex);
                    dot.classList.toggle('scale-125', i === currentIndex);
                    dot.classList.toggle('bg-gray-300', i !== currentIndex);
                });
            };

            const nextSlide = () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider();
            };

            const prevSlide = () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateSlider();
            };

            let autoSlide = setInterval(nextSlide, 4000);

            sliderDots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    clearInterval(autoSlide);
                    currentIndex = index;
                    updateSlider();
                    autoSlide = setInterval(nextSlide, 4000);
                });
            });

            if (nextButton && prevButton) {
                nextButton.addEventListener('click', () => {
                    clearInterval(autoSlide);
                    nextSlide();
                    autoSlide = setInterval(nextSlide, 4000);
                });

                prevButton.addEventListener('click', () => {
                    clearInterval(autoSlide);
                    prevSlide();
                    autoSlide = setInterval(nextSlide, 4000);
                });
            }

            // Touch Support for Mobile
            let touchStartX = 0;
            let touchEndX = 0;
            sliderContainer.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            });
            sliderContainer.addEventListener('touchmove', (e) => {
                touchEndX = e.touches[0].clientX;
            });
            sliderContainer.addEventListener('touchend', () => {
                if (touchStartX - touchEndX > 50) {
                    clearInterval(autoSlide);
                    nextSlide();
                    autoSlide = setInterval(nextSlide, 4000);
                } else if (touchEndX - touchStartX > 50) {
                    clearInterval(autoSlide);
                    prevSlide();
                    autoSlide = setInterval(nextSlide, 4000);
                }
            });

            // Scroll-Triggered Animations
            const elements = document.querySelectorAll('.animate-on-scroll');
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-slide-in');
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.3 }
            );
            elements.forEach((el) => observer.observe(el));
        });
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }
        @keyframes slide-in {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-in {
            animation: slide-in 0.5s ease-out forwards;
        }
        .slider-item {
            background-position: center;
            background-size: cover;
        }
        @media (min-width: 768px) {
            .slider-item {
                background-attachment: fixed;
            }
        }
        /* Asian-Inspired Colors */
        :root {
            --ivory: #F8F1E9;
            --sakura: #F4C2C2;
            --jade: #A3BFFA;
            --jade-dark: #7D9BF2;
        }
        .bg-ivory { background-color: var(--ivory); }
        .bg-sakura { background-color: var(--sakura); }
        .text-sakura { color: var(--sakura); }
        .bg-jade { background-color: var(--jade); }
        .text-jade { color: var(--jade); }
        .bg-jade-dark { background-color: var(--jade-dark); }
        .text-jade-dark { color: var(--jade-dark); }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap">
</x-layouts.public-layout>
 