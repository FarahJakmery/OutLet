<!DOCTYPE html>
<html lang="ar">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Include The head file here --}}
    @include('webLayouts.head')
</head>

<body>
    {{-- Include The head file here --}}
    @include('webLayouts.navbar')

    {{-- This section will be change in every page --}}
    @yield('web_content')

    {{-- Include The footer file here --}}
    @include('webLayouts.footer')

    {{-- Include The footer-scripts  file here --}}
    @include('webLayouts.footer-scripts')
</body>

</html>
