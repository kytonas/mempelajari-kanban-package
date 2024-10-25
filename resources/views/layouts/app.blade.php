<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
</head>

<body>
    {{ $slot }}
    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

    @stack('scripts')
</body>

</html>
