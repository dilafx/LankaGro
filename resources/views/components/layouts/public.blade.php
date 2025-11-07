
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LankaGro</title>


   @vite('resources/css/app.css')
</head>
<body>
    <header>
        <x-navigation />
    </header>

    <main>
        @yield('content')

    </main>

   <x-footer />
</body>
</html>
