<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Include The head file here --}}
    @include('web layouts.head')
</head>

<body>
    {{-- Include The head file here --}}
    @include('web layouts.navbar')

    {{-- This section will be change in every page --}}
    @yield('web_content')

    {{-- Include The footer file here --}}
    @include('web layouts.footer')

    {{-- Include The footer-scripts  file here --}}
    @include('web layouts.footer-scripts')
</body>

</html>
