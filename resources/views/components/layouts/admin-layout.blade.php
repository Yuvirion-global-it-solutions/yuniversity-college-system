<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'UMS Admin' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white hidden md:block">
            <div class="p-4">
                <h1 class="text-2xl font-bold">UMS Admin</h1>
            </div>
            <nav class="mt-4">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.dashboard') ? 'bg-blue-700' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.profile.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.profile.*') ? 'bg-blue-700' : '' }}">Profile</a></li>
                    <li><a href="{{ route('admin.universities.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.universities.*') ? 'bg-blue-700' : '' }}">Universities</a></li>
                    <li><a href="{{ route('admin.colleges.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.colleges.*') ? 'bg-blue-700' : '' }}">Colleges</a></li>
                    <li><a href="{{ route('admin.courses.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.courses.*') ? 'bg-blue-700' : '' }}">Courses</a></li>
                    <li><a href="{{ route('admin.students.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.students.*') ? 'bg-blue-700' : '' }}">Students</a></li>
                    <li><a href="{{ route('admin.cms.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.cms.*') ? 'bg-blue-700' : '' }}">CMS</a></li>
                    <li><a href="{{ route('admin.enquiries.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.enquiries.*') ? 'bg-blue-700' : '' }}">Enquiries</a></li>
                    <li><a href="{{ route('admin.settings.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.settings.*') ? 'bg-blue-700' : '' }}">Settings</a></li>
                    <li><a href="{{ route('admin.notifications.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.notifications.*') ? 'bg-blue-700' : '' }}">Notifications</a></li>
                    <li><a href="{{ route('admin.support.index') }}" class="block p-4 hover:bg-blue-700 {{ Route::is('admin.support.*') ? 'bg-blue-700' : '' }}">Support</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Mobile Sidebar Toggle -->
        <div class="md:hidden">
            <button id="sidebar-toggle" class="p-4 text-white bg-blue-800">☰</button>
            <aside id="mobile-sidebar" class="hidden w-full bg-blue-800 text-white absolute top-0 left-0 h-screen">
                <div class="p-4 flex justify-between">
                    <h1 class="text-2xl font-bold">UMS Admin</h1>
                    <button id="sidebar-close" class="text-white">✕</button>
                </div>
                <nav class="mt-4">
                    <ul>
                        <li><a href="{{ route('admin.dashboard') }}" class="block p-4 hover:bg-blue-700">Dashboard</a></li>
                        <li><a href="{{ route('admin.profile.index') }}" class="block p-4 hover:bg-blue-700">Profile</a></li>
                        <li><a href="{{ route('admin.universities.index') }}" class="block p-4 hover:bg-blue-700">Universities</a></li>
                        <li><a href="{{ route('admin.colleges.index') }}" class="block p-4 hover:bg-blue-700">Colleges</a></li>
                        <li><a href="{{ route('admin.courses.index') }}" class="block p-4 hover:bg-blue-700">Courses</a></li>
                        <li><a href="{{ route('admin.students.index') }}" class="block p-4 hover:bg-blue-700">Students</a></li>
                        <li><a href="{{ route('admin.cms.index') }}" class="block p-4 hover:bg-blue-700">CMS</a></li>
                        <li><a href="{{ route('admin.enquiries.index') }}" class="block p-4 hover:bg-blue-700">Enquiries</a></li>
                        <li><a href="{{ route('admin.settings.index') }}" class="block p-4 hover:bg-blue-700">Settings</a></li>
                        <li><a href="{{ route('admin.notifications.index') }}" class="block p-4 hover:bg-blue-700">Notifications</a></li>
                        <li><a href="{{ route('admin.support.index') }}" class="block p-4 hover:bg-blue-700">Support</a></li>
                    </ul>
                </nav>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold">{{ $title ?? 'Dashboard' }}</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ auth()->user()->name }}</span>
                    <a href="{{ route('admin.profile.index') }}" class="text-blue-600 hover:underline">Profile</a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <x-button type="submit">Logout</x-button>
                    </form>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-4 md:p-8 overflow-y-auto">
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
                @endif
                @if (session('status'))
                    <div class="bg-blue-100 text-blue-700 p-4 rounded mb-4">{{ session('status') }}</div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Script -->
    <script>
        document.getElementById('sidebar-toggle').addEventListener('click', () => {
            document.getElementById('mobile-sidebar').classList.toggle('hidden');
        });
        document.getElementById('sidebar-close').addEventListener('click', () => {
            document.getElementById('mobile-sidebar').classList.add('hidden');
        });
    </script>
</body>
</html>