@extends('components.layouts.public-layout')

@section('title', '{{ $college->name }} - EduConnect')

@section('head')
    <meta property="og:title" content="{{ $college->name }} - EduConnect">
    <meta property="og:description" content="Explore {{ $college->name }} on EduConnect. Discover its facilities, courses, and more.">
    <meta property="og:image" content="{{ $college->logo_path ? asset($college->logo_path) : 'https://via.placeholder.com/1200x630' }}">
    <meta name="twitter:card" content="summary_large_image">
    <style>
        .hero-section {
            background-size: cover;
            background-position: center;
            min-height: 50vh;
            transition: background 0.3s ease;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 8px;
            padding: 2rem;
            backdrop-filter: blur(4px);
        }

        @media (min-width: 640px) {
            .hero-overlay { padding: 3rem; }
            .hero-overlay h1 { font-size: 3rem; }
            .hero-overlay p { font-size: 1.125rem; }
        }

        .hero-overlay h1 {
            color: var(--text-dark);
            font-size: 2.25rem;
            font-weight: 900;
        }

        .hero-overlay p {
            color: var(--text-dark);
        }

        .facility-card {
            background-color: var(--background-light);
            border-radius: 8px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .dark .facility-card {
            background-color: var(--background-dark);
        }

        .facility-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }

        .course-card {
            background-color: var(--background-light);
            border-radius: 8px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .dark .course-card {
            background-color: var(--background-dark);
        }

        .course-card img {
            transition: transform 0.3s ease;
        }

        .course-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }

        .course-card:hover img {
            transform: scale(1.05);
        }

        .empty-state {
            background-color: var(--background-light);
            color: var(--text-light);
            border-radius: 8px;
            padding: 1rem;
        }

        .dark .empty-state {
            background-color: var(--background-dark);
            color: var(--text-dark);
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section animate-slide-in" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ $college->logo_path ? asset($college->logo_path) : 'https://via.placeholder.com/1200x600' }}');" aria-labelledby="college-title">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto hero-overlay">
                <h1 id="college-title" class="mb-4">{{ $college->name }}</h1>
                @if($college->tagline)
                    <p class="mb-2 text-lg">{{ $college->tagline }}</p>
                @endif
                <p class="text-gray-300">{{ $college->description ?? 'Description not available' }}</p>
                <a href="{{ route('public.enquiry.create') }}" class="btn btn-apply mt-4 animate-slide-in delay-100" aria-label="Apply to {{ $college->name }}">Apply Now</a>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    @if($college->facilities && count($college->facilities) > 0)
        <section class="py-12 bg-gray-50 dark:bg-background-dark">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="mb-8 text-2xl font-bold text-primary dark:text-white">Facilities</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach(is_array($college->facilities) ? $college->facilities : explode(',', $college->facilities) as $facility)
                        <div class="facility-card p-4 shadow-sm">
                            <p class="text-gray-700 dark:text-gray-300">{{ trim($facility) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Courses Section -->
    <section class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="mb-8 text-2xl font-bold text-primary dark:text-white">Courses</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($college->courses as $course)
                    <a href="{{ route('public.courses.show', ['slug' => $course->slug]) }}" class="course-card flex flex-col overflow-hidden shadow-sm" aria-label="View details for {{ $course->name }}">
                        <div class="aspect-w-16 aspect-h-9 overflow-hidden rounded-t-lg">
                            <img alt="{{ $course->name }}" class="w-full h-full object-cover" src="{{ $course->image_path ? asset($course->image_path) : 'https://via.placeholder.com/400x225' }}" loading="lazy">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-primary dark:text-white">{{ $course->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $course->duration ?? 'Duration not available' }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-12 text-center empty-state">
                        <p class="fs-6">No courses available for this college.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-12" style="background: rgba(199, 21, 133, 0.1);">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center animate-slide-in">
            <h2 class="mb-4 text-2xl font-bold text-primary">Ready to Join {{ $college->name }}?</h2>
            <a href="{{ route('public.enquiry.create') }}" class="btn btn-apply fw-semibold shadow" aria-label="Start your application to {{ $college->name }}">Start Your Application</a>
        </div>
    </section>
@endsection