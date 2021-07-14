<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="shortcut icon" href="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" type="image/x-icon">
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                                <a href="{{ route('course.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Courses</a>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <a href="#" class="bg-white hover:bg-gray-200 text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    @yield('title')
                </h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                @yield('content')
                <!-- /End replace -->
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
