<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Homepage') - Permin Dinamika</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    {{-- navbar --}}
    <nav class="bg-[#006400] text-white py-4 shadow-md sticky top-0 z-50">
    <div class="container max-w-6xl mx-auto flex justify-between items-center px-4">
        
        {{-- Sisi Kiri: Logo + Nama --}}
        <a href="{{ route('homepage') }}" class="flex items-center space-x-3 group">
            <img src="{{ asset('img/din.png') }}" alt="Logo" class="w-10 h-10 object-contain">
            
            <span class="text-2xl font-bold tracking-tighter group-hover:text-green-200 transition">
                Permin Dinamika</span>
            </span>
        </a>

        {{-- Sisi Kanan: Menu --}}
        <div class="space-x-2">
            <a href="{{ route('homepage') }}" class="px-4 py-2 rounded-md hover:bg-[#004d00] transition">Homepage</a>
            <a href="{{ route('login') }}" class="px-4 py-2 bg-white text-[#006400] rounded-md font-semibold hover:bg-green-100 transition">
                Login Admin
            </a>
        </div>
    </div>
</nav>

    @yield('content')

    <footer class="text-center bg-[#004d00] py-5 text-white">
        <p>Copyright &copy; Muhammad Ihsan</p>
    </footer>
</body>

</html>
