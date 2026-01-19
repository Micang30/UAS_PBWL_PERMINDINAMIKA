<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Permin Dinamika</title>
    @vite('resources/css/app.css')
</head>

{{-- Background Gradasi Magical: Perpaduan Hijau Tua, Hijau Emerald, dan Kuning Emas --}}
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#004d00] via-[#006400] to-[#ffd700] animate-gradient-xy">
    
    <div class="bg-white/90 backdrop-blur-sm shadow-2xl rounded-2xl px-10 py-10 w-full max-w-md border-t-8 border-[#ffd700]">
        
        {{-- Logo atau Icon (Opsional) --}}
        <div class="flex justify-center mb-4">
            <div class="bg-[#006400] p-3 rounded-full shadow-lg">
                <img src="{{ asset('img/din.png') }}" alt="Logo" class="w-12 h-12 object-contain">
            </div>
        </div>

        <h1 class="font-extrabold text-center text-[#006400] text-3xl mb-2">Selamat Datang</h1>
        <p class="text-center text-gray-600 mb-8 text-sm">Silakan login ke akun Admin Anda</p>

        <form action="{{ route('loginProses') }}" method="post">
            @csrf
            
            {{-- Input Email --}}
            <div class="mb-5">
                <label class="block text-[#006400] font-bold mb-2 ml-1">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" 
                    placeholder="nama@email.com"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#ffd700] focus:ring-0 outline-none transition-all duration-300 placeholder:text-gray-300">
                @error('email')
                    <div class="text-red-500 mt-1 text-xs font-semibold ml-1 italic">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Password --}}
            <div class="mb-8">
                <label class="block text-[#006400] font-bold mb-2 ml-1">Password</label>
                <input type="password" name="password" 
                    placeholder="••••••••"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#ffd700] focus:ring-0 outline-none transition-all duration-300">
                @error('password')
                    <div class="text-red-500 mt-1 text-xs font-semibold ml-1 italic">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol Login Magical --}}
            <button type="submit" 
                class="bg-[#006400] text-[#ffd700] font-bold py-3 rounded-xl w-full hover:bg-[#004d00] hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 shadow-lg shadow-green-900/20 uppercase tracking-widest text-sm">
                Masuk Sekarang
            </button>

            <div class="mt-6 text-center">
                <a href="{{ route('homepage') }}" class="text-xs text-gray-500 hover:text-[#006400] transition-colors">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </form>
    </div>

    @include('sweetalert::alert')

    {{-- Script CSS Tambahan untuk Animasi Gradasi --}}
    <style>
        .animate-gradient-xy {
            background-size: 400% 400%;
            animation: gradient-xy 15s ease infinite;
        }
        @keyframes gradient-xy {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
    </style>
</body>

</html>