@extends('components.layouts.public-layout')

@section('title', 'Enquiry - EduConnect')

@section('content')
    <!-- Enquiry Section -->
    <section class="py-16 sm:py-20 bg-white dark:bg-background-dark">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="mb-10 text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl text-center">Make an Enquiry</h2>
            <div class="max-w-md mx-auto">
                <form action="{{ route('public.enquiry.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 p-2 focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Your Name">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 p-2 focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="your@email.com">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                        <input type="tel" id="phone" name="phone" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 p-2 focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Your Phone Number">
                    </div>
                    <div>
                        <label for="university" class="block text-sm font-medium text-gray-700 dark:text-gray-300">University</label>
                        <select id="university" name="university_id" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 p-2 focus:ring-2 focus:ring-primary focus:border-transparent" onchange="updateColleges()">
                            <option value="">Select a University</option>
                            @foreach ($universities as $university)
                                <option value="{{ $university->id }}">{{ $university->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="college" class="block text-sm font-medium text-gray-700 dark:text-gray-300">College</label>
                        <select id="college" name="college_id" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 p-2 focus:ring-2 focus:ring-primary focus:border-transparent" onchange="updateCourses()">
                            <option value="">Select a College</option>
                        </select>
                    </div>
                    <div>
                        <label for="course" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course</label>
                        <select id="course" name="course_id" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 p-2 focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">Select a Course</option>
                        </select>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                        <textarea id="message" name="message" rows="4" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 p-2 focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Your Enquiry"></textarea>
                    </div>
                    <button type="submit" class="w-full rounded-lg bg-primary text-white py-2 text-sm font-medium hover:bg-secondary transition-all shadow-card hover:shadow-hover">Submit Enquiry</button>
                </form>
            </div>
        </div>
    </section>
@endsection

<script>
    function updateColleges() {
        const universityId = document.getElementById('university').value;
        const collegeSelect = document.getElementById('college');
        const courseSelect = document.getElementById('course');

        collegeSelect.innerHTML = '<option value="">Select a College</option>';
        courseSelect.innerHTML = '<option value="">Select a Course</option>';

        if (universityId) {
            fetch(`/public/universities/${universityId}/colleges`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(college => {
                        const option = document.createElement('option');
                        option.value = college.id;
                        option.textContent = college.name;
                        collegeSelect.appendChild(option);
                    });
                });
        }
    }

    function updateCourses() {
        const collegeId = document.getElementById('college').value;
        const courseSelect = document.getElementById('course');

        courseSelect.innerHTML = '<option value="">Select a Course</option>';

        if (collegeId) {
            fetch(`/public/colleges/${collegeId}/courses`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(course => {
                        const option = document.createElement('option');
                        option.value = course.id;
                        option.textContent = course.name;
                        courseSelect.appendChild(option);
                    });
                });
        }
    }
</script>