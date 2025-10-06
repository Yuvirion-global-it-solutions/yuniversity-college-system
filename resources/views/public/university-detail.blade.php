<x-layouts.public-layout title="{{ $university->name }} - EduConnect">
    <!-- Hero Section -->
    <section class="relative flex min-h-[40vh] items-center justify-center bg-cover bg-center py-12 text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.6) 100%), url('{{ $university->logo_path ?: 'https://via.placeholder.com/300' }}');">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold tracking-tight sm:text-5xl">{{ $university->name }}</h1>
            <p class="mt-2 text-lg text-gray-200">{{ $university->location ?? 'Location not available' }}</p>
        </div>
    </section>

    <!-- Colleges Section -->
    <section class="py-16 sm:py-20 bg-white dark:bg-background-dark">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="mb-10 text-2xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-3xl">Colleges</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($university->colleges as $college)
                    <a href="{{ route('public.colleges.show', ['slug' => $college->slug]) }}" class="group flex flex-col gap-4 overflow-hidden rounded-lg bg-white dark:bg-background-dark shadow-md transition-shadow hover:shadow-xl">
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
</x-layouts.public-layout>