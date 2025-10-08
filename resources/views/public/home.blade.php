@extends('components.layouts.public-layout')

@section('title', 'Welcome to UMS')

@section('content')
    <!-- Hero Section with Enhanced Slider and Stats -->
    <section class="position-relative min-vh-80 d-flex align-items-center justify-content-center overflow-hidden" style="background-color: var(--background-light);">
        <!-- Slider Container -->
        <div class="position-relative w-100" style="height: 80vh; overflow: hidden;">
            <div class="slider-container d-flex w-100 h-100" style="transition: transform 0.7s ease-in-out;">
                @foreach ($sliders as $index => $slider)
                    <div class="slider-item flex-shrink-0 w-100 h-100 bg-cover bg-center" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6)), url('{{ $slider['image'] }}');" data-index="{{ $index }}" role="region" aria-label="Hero slider">
                        <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center">
                            <div class="animate-slide-in" style="max-width: 896px;">
<h1 class="fs-4 fs-sm-3 fs-md-2 fs-lg-1 fw-bold" style="color: gold;">{{ $slider['caption'] }}</h1>
<p class="mx-auto mt-3" style="max-width: 672px; font-size: 1rem; color: white;">{{ $slider['sub_caption'] }}</p>

     <a href="{{ route('public.enquiry.create') }}" class="mt-3 d-inline-flex align-items-center justify-content-center btn btn-primary fw-semibold shadow" style="height: 48px; padding: 0 24px; transition: all 0.3s ease;" aria-label="Get started with {{ $slider['caption'] }}">Get Started</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Stats Stack -->
        <div id="stats-stack" class="position-absolute bottom-0 start-50 translate-middle-x w-100" style="max-width: 1280px; background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(8px); border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 24px; z-index: 10;">
            <div class="d-flex flex-wrap justify-content-around gap-4 text-center">
                <div class="d-flex flex-column">
                    <span class="fs-3 fs-md-1 fw-bold text-secondary count" data-target="200">0</span>
                    <span class="fs-6 text-dark">Students</span>
                </div>
                <div class="d-flex flex-column">
                    <span class="fs-3 fs-md-1 fw-bold text-secondary count" data-target="500">0</span>
                    <span class="fs-6 text-dark">Universities</span>
                </div>
                <div class="d-flex flex-column">
                    <span class="fs-3 fs-md-1 fw-bold text-secondary count" data-target="1000">0</span>
                    <span class="fs-6 text-dark">Colleges</span>
                </div>
                <div class="d-flex flex-column">
                    <span class="fs-3 fs-md-1 fw-bold text-secondary count" data-target="2000">0</span>
                    <span class="fs-6 text-dark">Courses</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1280px;">
            <div class="position-relative animate-slide-in">
                <svg class="position-absolute start-0 top-50 translate-middle-y" style="width: 20px; height: 20px; color: #6c757d;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="search" placeholder="Search universities, colleges, or courses..." class="w-100 rounded-3 border border-secondary-subtle bg-white py-2 ps-5 pe-3 fs-6" style="transition: all 0.3s ease;" aria-label="Search for universities, colleges, or courses">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-white">
        <div class="container text-center animate-slide-in" style="max-width: 1280px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary">About EduConnect</h2>
            <p class="mt-3 mx-auto fs-6" style="max-width: 672px;">EduConnect empowers students to find their ideal academic path by connecting them with top universities and courses worldwide. Our platform simplifies the journey with curated resources and personalized guidance.</p>
        </div>
    </section>

    <!-- Featured Universities -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary text-center mb-4 animate-slide-in">Featured Universities</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                @foreach ($universities as $university)
                    <a href="{{ route('public.universities.show', ['slug' => $university->slug]) }}" class="col text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm animate-slide-in" style="transition: all 0.3s ease;">
                            <div class="ratio ratio-16x9 overflow-hidden rounded-top">
                                <img alt="{{ $university->name }}" class="w-100 h-100 object-fit-cover" src="{{ $university->logo_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="fs-6 fw-semibold text-primary text-truncate">{{ $university->name }}</h3>
                                <p class="fs-7 text-secondary text-truncate">{{ $university->location ?? 'Location not available' }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Top Colleges -->
    <section class="py-5 bg-white">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary text-center mb-4 animate-slide-in">Top Colleges</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                @foreach ($colleges as $college)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm animate-slide-in" style="transition: all 0.3s ease;">
                            <div class="ratio ratio-16x9 overflow-hidden rounded-top">
                                <img alt="{{ $college->name }}" class="w-100 h-100 object-fit-cover" src="{{ $college->logo_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="fs-6 fw-semibold text-primary text-truncate">{{ $college->name }}</h3>
                                <p class="fs-7 text-secondary text-truncate">{{ $college->university_id ? \App\Models\University::find($college->university_id)->name ?? 'N/A' : 'Independent' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Courses -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary text-center mb-4 animate-slide-in">Popular Courses</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                @foreach ($courses as $course)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm animate-slide-in" style="transition: all 0.3s ease;">
                            <div class="ratio ratio-16x9 overflow-hidden rounded-top">
                                <img alt="{{ $course->name }}" class="w-100 h-100 object-fit-cover" src="{{ $course->image_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="fs-6 fw-semibold text-primary text-truncate">{{ $course->name }}</h3>
                                <p class="fs-7 text-secondary text-truncate">{{ $course->duration ?? 'Duration not available' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: rgba(199, 21, 133, 0.1);">
        <div class="container text-center animate-slide-in" style="max-width: 1280px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary">Ready to Start Your Journey?</h2>
            <a href="{{ route('public.universities.index') }}" class="mt-3 d-inline-flex align-items-center justify-content-center btn btn-primary fw-semibold shadow" style="height: 40px; padding: 0 20px; transition: all 0.3s ease;" aria-label="Explore universities">Explore More</a>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary text-center mb-4 animate-slide-in">Testimonials</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @forelse ($testimonials as $testimonial)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm p-3 animate-slide-in" style="transition: all 0.3s ease;">
                            <div class="d-flex align-items-center gap-2">
                                <img alt="{{ $testimonial->name }}" class="rounded-circle object-fit-cover" style="width: 40px; height: 40px;" src="{{ $testimonial->photo_path ?: 'https://via.placeholder.com/40' }}" loading="lazy">
                                <div>
                                    <p class="fs-6 fw-semibold text-primary">{{ $testimonial->name }}</p>
                                    <p class="fs-7 text-secondary">{{ $testimonial->date->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <div class="mt-2 d-flex" style="color: var(--accent);">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="me-1" style="width: 16px; height: 16px;" fill="{{ $i <= $testimonial->rating ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="mt-2 fs-7 text-dark text-truncate" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $testimonial->comment }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center fs-6 text-dark">No testimonials available yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Counter Animation
            const counters = document.querySelectorAll('.count');
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const increment = target / 100;
                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });

            // Slider Functionality
            const sliderContainer = document.querySelector('.slider-container');
            const sliderItems = document.querySelectorAll('.slider-item');
            let currentIndex = 0;
            const totalSlides = sliderItems.length;

            const updateSlider = () => {
                sliderContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
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
            const elements = document.querySelectorAll('.animate-slide-in');
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate');
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
        :root {
            --primary: #c71585; /* Magenta */
            --secondary: #1e1b4b; /* Navy Blue */
            --accent: #e6e6fa; /* Light lavender */
            --background-light: #f9f9f9;
            --background-dark: #1e1b4b;
            --text-light: #2d2d2d;
            --text-dark: #e0e0e0;
        }

        html {
            scroll-behavior: smooth;
        }

        @keyframes slide-in {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide-in.animate {
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

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-primary:hover {
            background-color: var(--secondary);
            transform: scale(1.05);
        }

        input[type="search"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(199, 21, 133, 0.2);
        }

        /* Ensure no overlap */
        section {
            position: relative;
            z-index: 1;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection