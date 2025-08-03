<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOBARN - ICT Solutions Tanzania | Computers, Networking, CCTV</title>
    <meta name="description" content="Leading ICT company in Tanzania providing computers, networking equipment, CCTV installation, software development, and technical support. Trusted by businesses across Dar es Salaam.">
    <meta name="keywords" content="ICT Tanzania, computers Dar es Salaam, networking equipment, CCTV installation, software development, technical support, Lenovo, Microsoft, CISCO">

    {{-- Tailwind --}}
    <link rel="stylesheet" href="{{ asset('vendor/core/packages/theme/frontend/css/app.css') }}">

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons(); // This will replace all <i class="lucide-icon"></i> elements
    </script>
    <script src="https://unpkg.com/alpinejs" defer></script>


</head>
<body class="font-sans antialiased text-gray-900 bg-white">

    @include('packages/theme::frontend.parts.navigation')

    <main>
        @yield('content')
    </main>

    @include('packages/theme::frontend.parts.footer')

    {{-- JS if needed --}}
</body>
</html>
