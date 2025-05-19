<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
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
        ]);
    }
}
