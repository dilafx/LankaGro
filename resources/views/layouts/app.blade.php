
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LankaGro</title>
    {{-- Your CSS links --}}
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        {{-- Your site header/logo could go here --}}
         @include('layouts.navigation')
        {{-- PASTE THE NAVIGATION CODE HERE --}}

    </header>

    <main>
        {{-- This is where the content from other pages will be injected --}}
        @yield('content')
    </main>

    <footer>
        {{-- Your site footer could go here --}}
    </footer>
</body>
</html>
