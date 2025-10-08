@extends('components.layouts.public-layout')

@section('title', '{{ $university->name }} - EduConnect')

@section('content')

<!-- Hero Section -->
<section class="relative flex min-h-[60vh] items-center justify-center bg-cover bg-center text-white" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ $university->logo_path ?: 'https://via.placeholder.com/1200x600' }}');">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto bg-black bg-opacity-50 rounded-lg p-8">
            <h1 class="text-5xl font-bold mb-4">{{ $university->name }}</h1>
            <p class="text-lg text-gray-200 mb-2"><strong>Location:</strong> {{ $university->location ?? 'Not available' }}</p>
            <p class="text-lg text-gray-200 mb-2"><strong>Type:</strong> {{ $university->type ?? 'Not available' }}</p>
        </div>
    </div>
</section>

<!-- University Info Cards -->
<section class="py-16 sm:py-20 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Mission -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">Mission</h3>
                <p class="text-gray-700 dark:text-gray-300">{{ $university->mission ?? 'Mission not available' }}</p>
            </div>

            <!-- Vision -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">Vision</h3>
                <p class="text-gray-700 dark:text-gray-300">{{ $university->vision ?? 'Vision not available' }}</p>
            </div>

            <!-- Description -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition md:col-span-2 lg:col-span-2">
                <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">About</h3>
                <p class="text-gray-700 dark:text-gray-300">{{ $university->description ?? 'Description not available' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Colleges Section -->
<section class="py-16 sm:py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="mb-10 text-3xl font-bold text-gray-900 dark:text-white">Colleges</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($university->colleges as $college)
                <a href="{{ route('public.colleges.show', ['slug' => $college->slug]) }}" class="group flex flex-col gap-4 overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow-md transition hover:shadow-xl">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden">
                        <img alt="{{ $college->name }}" class="h-full w-full object-cover object-center transition-transform group-hover:scale-105" src="{{ $college->logo_path ?: 'https://via.placeholder.com/300' }}">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">{{ $college->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $college->tagline ?? 'No tagline available' }}</p>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-600 dark:text-gray-300">No colleges available for this university.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
