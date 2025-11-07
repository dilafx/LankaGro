<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Laravel' }}</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

     @vite('resources/css/app.css')
    {{-- @yield('styles') --}}
    @livewireStyles
</head>

<body>
    <x-layouts.app.sidebar :title="$title ?? null" />

    <flux:main>
        {{ $slot }}
    </flux:main>

    @livewireScripts

    {{-- @yield('scripts') --}}
</body>

</html>


{{-- @section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/blog/blog-page.css') }}">
@endsection --}}

{{-- @section('scripts')
    <script src="{{ asset('js/pages/blog/blog-page.js') }}"></script>
@endsection --}}
