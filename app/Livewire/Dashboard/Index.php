<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $chartData;
    public $chartDataRombelA;
    public $chartDataRombelB;

    // as we know ya, saat komponen livewire dipanggil, ini akan dipanggil otomatis
    public function mount()
    {
        $this->loadChartData(); // ini merupakan function yang kita panggil, setelah kita membuatnya di bawah ini
        $this->loadChartDataRombelA(); 
        $this->loadChartDataRombelB(); 
    }

    // ini fungsi yang kita buat, jadi namanya custom, bisa saja ambilData
    public function loadChartData()
    {
        // pada model Siswa yang membaca database siswas, ambil rombel dengan data SIJA A, dan yang memiliki status_lapor_pkl true, simpah ke $sijaA_sudah
        $sijaA_sudah = Siswa::where('rombel', 'SIJA A')->where('status_lapor_pkl', true)->count();

        // pada model Siswa yang membaca database siswas, ambil rombel dengan data SIJA B, dan yang memiliki status_lapor_pkl true, simpah ke $sijaB_sudah
        $sijaB_sudah = Siswa::where('rombel', 'SIJA B')->where('status_lapor_pkl', true)->count();

        // pada model Siswa yang membaca database siswas, ambil yang memiliki status_lapor_pkl false, simpah ke $belum
        $belum = Siswa::where('status_lapor_pkl', false)->count();

        // lalu, ketiga data ini disimpan ke properti Livewire 'chartData'
        $this->chartData = [
            ['Kategori', 'Jumlah'],
            ['SIJA A - Sudah', $sijaA_sudah],
            ['SIJA B - Sudah', $sijaB_sudah],
            ['Belum Isi', $belum],
        ];
    }

    public function loadChartDataRombelA()
    {
        // pada model Siswa yang membaca database siswas, ambil rombel dengan data SIJA A, dan yang memiliki status_lapor_pkl true, simpah ke $sijaA_sudah
        $sijaA_sudah = Siswa::where('rombel', 'SIJA A')->where('status_lapor_pkl', true)->count();
        $sijaA_belum = Siswa::where('rombel', 'SIJA A')->where('status_lapor_pkl', false)->count();


        $this->chartDataRombelA = [
            ['Kategori', 'Jumlah'],
            ['SIJA A - Sudah', $sijaA_sudah],
            ['SIJA A - Belum', $sijaA_belum],
        ];
    }

    public function loadChartDataRombelB()
    {
        // pada model Siswa yang membaca database siswas, ambil rombel dengan data SIJA A, dan yang memiliki status_lapor_pkl true, simpah ke $sijaA_sudah
        $sijaB_sudah = Siswa::where('rombel', 'SIJA B')->where('status_lapor_pkl', true)->count();
        $sijaB_belum = Siswa::where('rombel', 'SIJA B')->where('status_lapor_pkl', false)->count();


        $this->chartDataRombelB = [
            ['Kategori', 'Jumlah'],
            ['SIJA B - Sudah', $sijaB_sudah],
            ['SIJA B - Belum', $sijaB_belum],
        ];
    }

    public function render()
    {
        // ambil email user yang sedang login
        // ini mengambil data dari tabel users
        // sistem autentikasi Laravel secara default menggunakan model App\Models\User yang terkait langsung dengan tabel users
        $userEmail = Auth::user()->email;

        // cari data siswa berdasarkan email
        // Siswa::where('email', $userEmail) : berarti, pada model Siswa, pada database siswas, cari email berdasarkan $userEmail (mengambil email user yang sedang login)
        // nilainya akan disimpan di $siswa
        $siswa = Siswa::where('email', $userEmail)->first();

        return view('livewire.dashboard.index', [
            'siswa' => $siswa,
            'chartData' => $this->chartData,
            'chartDataRombelA' => $this->chartDataRombelA,
            'chartDataRombelB' => $this->chartDataRombelB,
        ]);
    }
}
