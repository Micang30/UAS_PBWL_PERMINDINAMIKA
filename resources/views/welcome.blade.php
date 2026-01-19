@include('layout.header')

{{-- statistik data --}}
<section class="mb-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        
        {{-- jumlah kategori --}}
        <div class="bg-[#006400] rounded-xl p-4 shadow-md border-l-4 border-[#ffd700]">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-[10px] font-bold text-[#ffd700] uppercase tracking-wider">Kategori</p>
                    <p class="text-2xl font-black text-white">{{ $data['jmlKategori'] }}</p>
                </div>
                <span class="material-icons text-white/30 text-3xl">grid_view</span>
            </div>
        </div>

        {{-- jumlah penerbit --}}
        <div class="bg-[#1a1c1e] rounded-xl p-4 shadow-md border-l-4 border-[#ffd700]">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-[10px] font-bold text-[#ffd700] uppercase tracking-wider">Penerbit</p>
                    <p class="text-2xl font-black text-white">{{ $data['jmlPenerbit'] }}</p>
                </div>
                <span class="material-icons text-white/30 text-3xl">business</span>
            </div>
        </div>

        {{-- jumlah buku --}}
        <div class="bg-[#006400] rounded-xl p-4 shadow-md border-l-4 border-[#ffd700]">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-[10px] font-bold text-[#ffd700] uppercase tracking-wider">Total Buku</p>
                    <p class="text-2xl font-black text-white">{{ $data['jmlSemuaBuku'] }}</p>
                </div>
                <span class="material-icons text-white/30 text-3xl">auto_stories</span>
            </div>
        </div>

        {{-- jumlah anggota --}}
        <div class="bg-[#1a1c1e] rounded-xl p-4 shadow-md border-l-4 border-[#ffd700]">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-[10px] font-bold text-[#ffd700] uppercase tracking-wider">Anggota</p>
                    <p class="text-2xl font-black text-white">{{ $data['jmlAnggota'] }}</p>
                </div>
                <span class="material-icons text-white/30 text-3xl">badge</span>
            </div>
        </div>
        
    </div>
</section>

{{-- Grafik Section: Dikecilkan dikit tingginya --}}
<section class="bg-white rounded-xl p-5 shadow-sm border border-gray-200 mb-8">
    <div class="flex items-center mb-4">
        <span class="material-icons text-[#006400] mr-2">analytics</span>
        <h2 class="text-sm font-bold text-gray-700 uppercase">Grafik Koleksi</h2>
    </div>
    <div style="height: 200px;"> {{-- Ukuran grafik dikunci biar gak gede banget --}}
        <canvas id="grafikBukuKategori"></canvas>
    </div>
</section>

{{-- Welcome Message: Simple & Clean --}}
<div class="p-5 bg-white border border-gray-200 rounded-xl shadow-sm">
    <h2 class="text-lg font-bold text-[#1a1c1e]">Halo, {{ Auth::user()->name }}!</h2>
    <p class="text-sm text-gray-500">Selamat datang kembali di sistem manajemen data buku.</p>
</div>

<script>
    const ctx = document.getElementById('grafikBukuKategori');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($namaKategori) !!},
            datasets: [{
                label: 'Buku',
                data: {!! json_encode($jumlahBuku) !!},
                backgroundColor: '#006400',
                borderRadius: 4
            }]
        },
        options: {
            maintainAspectRatio: false, {{-- Biar ngikutin tinggi div-nya --}}
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { font: { size: 10 } } },
                x: { ticks: { font: { size: 10 } } }
            }
        }
    });
</script>

@include('layout.footer')
