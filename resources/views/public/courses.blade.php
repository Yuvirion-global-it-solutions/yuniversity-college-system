<x-layouts.public-layout title="Courses - EduConnect">
    <!-- Courses List -->
    <section class="py-16 sm:py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="mb-10 text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Explore Courses</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($courses as $course)
                    <a href="{{ route('public.courses.show', ['slug' => $course->slug]) }}" class="group flex flex-col gap-4 overflow-hidden rounded-lg bg-white dark:bg-background-dark shadow-md transition-shadow hover:shadow-xl">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden">
                            <img alt="{{ $course->name }}" class="h-full w-full object-cover object-center transition-transform group-hover:scale-105" src="{{ $course->image_path ?: 'https://via.placeholder.com/300' }}">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 dark:text-white">{{ $course->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $course->duration ?? 'Duration not available' }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-center text-gray-600 dark:text-gray-300">No courses available.</p>
                @endforelse
            </div>
            <!-- Pagination -->
            <div class="mt-8">
                {{ $courses->links() }}
            </div>
        </div>
    </section>
</x-layouts.public-layout>