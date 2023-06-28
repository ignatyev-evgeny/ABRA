<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
<x-head/>
<x-navbar/>
{{ $slot }}
@vite('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js')
@vite('resources/js/app.js')
@livewireScripts
</body>
</html>