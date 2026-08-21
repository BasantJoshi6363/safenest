<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Favicons & Manifest using direct absolute paths -->
    <link rel="icon" type="image/png" href="/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/images/favicon/site.webmanifest" />
    <meta name="referrer" content="no-referrer">

    <title>{{ $title ?? 'Home' }} | Safenest</title>
</head>
<body>
    <header>
        <x-navbar />
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <x-footer />
    </footer>
</body>
</html>
