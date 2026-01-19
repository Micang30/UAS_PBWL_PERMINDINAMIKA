<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\User;
use App\Models\kategori;
use App\Models\penerbit;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin untuk Login
        User::create([
            'name' => 'Muhammad Ihsan',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);

        // 2. Buat Data Kategori & Penerbit (Penting agar Relasi Buku tidak null)
        $kat = kategori::create(['nama_kategori' => 'Teknologi']);
        $pen = penerbit::create(['nama_penerbit' => 'Erlangga']);

        // 3. Buat Contoh Data Buku (Opsional)
        // Jika kamu belum punya BukuFactory, jangan jalankan baris ini.
        // Jika sudah punya, ini akan membuat 10 buku otomatis.
        // Buku::factory(10)->create();
        
        // Atau buat satu buku manual untuk tes:
        Buku::create([
            'judul' => 'Belajar Laravel 11',
            'pengarang' => 'Ihsan Dev',
            'tahun_terbit' => '2024',
            'kategori_id' => $kat->id,
            'penerbit_id' => $pen->id,
        ]);
    }
}