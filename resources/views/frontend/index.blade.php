@extends('frontend.master')
@section('title', 'Katalog Buku')

@section('content')
    {{-- hero section --}}
    <section class="bg-[#006400] text-white py-12 shadow-inner">
        <div class="container max-w-6xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-2">Selamat Datang di Katalog Buku</h1>
            <h1 class="text-5xl font-extrabold mb-4 tracking-tight">Permin</h1>
            <p class="text-lg text-green-100">Jelajahi berbagai koleksi buku-buku terbaik dari kami.</p>
        </div>
    </section>

    {{-- section filter dan pencarian --}}
    <section class="container max-w-6xl mx-auto py-6 px-4">
        <form action="{{ route('homepage') }}" method="get" class="flex flex-wrap gap-4 items-center">
            <select name="kategori" class="p-2 border border-green-200 rounded focus:ring-2 focus:ring-[#006400] outline-none">
                <option value="">Semua Kategori</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>

            <select name="penerbit" class="p-2 border border-green-200 rounded focus:ring-2 focus:ring-[#006400] outline-none">
                <option value="">Semua Penerbit</option>
                @foreach ($penerbit as $p)
                    <option value="{{ $p->id }}" {{ request('penerbit') == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_penerbit }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="search" class="p-2 border border-green-200 rounded flex-1 focus:ring-2 focus:ring-[#006400] outline-none" placeholder="Masukkan kata kunci..."
                value="{{ request('search') }}">
            <button type="submit" class="bg-[#006400] hover:bg-[#004d00] text-white px-6 py-2 rounded transition-colors duration-200">
                Terapkan
            </button>
        </form>
    </section>

    {{-- section katalog --}}
    <section class="container max-w-6xl mx-auto py-6 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            @foreach ($buku as $b)
                <div class="bg-white shadow-md hover:shadow-xl transition-shadow p-6 flex rounded-lg items-center space-x-4 border-l-4 border-[#006400]">
                    <div class="flex-shrink-0">
                        @if ($b->cover)
                            <img src="{{ asset('storage/' . $b->cover) }}" alt="Cover Buku"
                                class="w-16 h-20 rounded-md object-cover shadow-sm">
                        @else
                            <img src="{{ asset('img/default_cover.jpg') }}" alt="Cover Buku"
                                class="w-16 h-20 rounded-md object-cover shadow-sm">
                        @endif
                    </div>

                    <div class="flex-1">
                        <h2 class="text-lg font-bold text-[#006400] leading-tight mb-1">
                            <a href="{{ route('detail-buku', $b->id) }}" class="hover:underline">
                                {{ $b->judul }}
                            </a>
                        </h2>
                        <p class="text-gray-600 text-xs font-medium">Pengarang: <span class="text-gray-800">{{ $b->pengarang }}</span></p>
                        <p class="text-gray-600 text-xs">Penerbit: {{ $b->penerbit->nama_penerbit }}</p>
                        <div class="mt-2 inline-block bg-green-50 text-[#006400] text-[10px] px-2 py-0.5 rounded-full border border-green-100">
                            Tahun: {{ $b->tahun_terbit }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 flex justify-center">{{ $buku->links() }}</div>
    </section>
@endsection
