@extends('components.layouts.public-layout')

@section('title', '{{ $college->name }} - EduConnect')

@section('content')

<!-- Hero Section -->
<section class="relative flex min-h-[50vh] items-center justify-center bg-cover bg-center text-white" 
    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ $college->logo_path ? asset($college->logo_path) : 'https://via.placeholder.com/1200x600' }}');">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto bg-black bg-opacity-50 rounded-lg p-8">
            <h1 class="text-5xl font-bold mb-4">{{ $college->name }}</h1>
            <p class="text-lg text-gray-200 mb-2">{{ $college->tagline ?? '' }}</p>
            <p class="text-gray-300">{{ $college->description ?? 'Description not available' }}</p>
        </div>
    </div>
</section>
<!-- Facilities Section -->
@if($college->facilities && count($college->facilities) > 0)
<section class="py-16 sm:py-20 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="mb-10 text-3xl font-bold text-gray-900 dark:text-white">Facilities</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach(is_array($college->facilities) ? $college->facilities : explode(',', $college->facilities) as $facility)
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow hover:shadow-lg transition">
                    <p class="text-gray-700 dark:text-gray-300">{{ trim($facility) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif


<!-- Courses Section -->
<section class="py-16 sm:py-20 bg-white dark:bg-background-dark">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="mb-10 text-2xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-3xl">Courses</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($college->courses as $course)
                <a href="{{ route('public.courses.show', ['slug' => $course->slug]) }}" class="group flex flex-col gap-4 overflow-hidden rounded-lg bg-white dark:bg-background-dark shadow-md transition-shadow hover:shadow-xl">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden">
                        <img alt="{{ $course->name }}" class="h-full w-full object-cover object-center transition-transform group-hover:scale-105" src="{{ $course->image_path ? asset($course->image_path) : 'https://via.placeholder.com/300' }}">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">{{ $course->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $course->duration ?? 'Duration not available' }}</p>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-600 dark:text-gray-300">No courses available for this college.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
