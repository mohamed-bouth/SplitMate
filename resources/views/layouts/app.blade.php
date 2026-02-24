<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ColocApp') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    
    <body class="font-sans antialiased text-slate-800 selection:bg-indigo-100 selection:text-indigo-900">
        
        <div class="min-h-screen flex flex-col bg-[#131416] relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-indigo-50/70 to-transparent -z-10 pointer-events-none"></div>

            <div class="sticky top-0 z-50 bg-[#131416] backdrop-blur-md border-b border-slate-200/60 shadow-sm transition-all">
                @include('layouts.navigation')
            </div>

            @isset($header)
                <header class="bg-[#131416] backdrop-blur-sm border-b border-white shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)]">
                    <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        <div class="text-2xl font-semibold text-white tracking-tight">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <main class="flex-grow w-full max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
                <div class="fade-in-up">
                    {{ $slot }}
                </div>
            </main>

            <footer class="py-6 text-center text-sm text-slate-400 bg-transparent mt-auto">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'ColocApp') }}. All rights reserved.</p>
            </footer>

        </div>
    </body>
</html>