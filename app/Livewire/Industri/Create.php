<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;
use Livewire\WithFileUploads; // diperlukan untuk fitur upload file

class Create extends Component
{
    use WithFileUploads; // mengaktifkan fitur upload file

    public $gambar, $nama, $bidang_usaha, $alamat, $kontak, $email;

    // fungsi yang akan dipanggil ketika user menekan button Tambahkan, kan di buttton view ada wire:click="create", nah itu ini
    public function create() {
        $this->validate([ // ini semua validasi input
            'gambar' => 'required|image|max:2048', // harus file gambar, maximal 2mb
            'nama' => 'required',
            'bidang_usaha' => 'required',
            'website' => 'required|url', // berupa url
            'alamat' => 'required',
            'kontak' => 'required|numeric', // hanya menerima angka
            'email' => 'required|email', // hanya menerima dalam formal email
        ]);

        // menyimpan file gambar ke folder storage/app/public/industri, dan menyimpan path-nya ke variabel $gambarPath
        $gambarPath = $this->gambar->store('industri', 'public');
        
        // menyimpan data industri baru ke database dengan field yang sudah divalidasi 
        Industri::create([
            'gambar' => $gambarPath, // file path gambar yang sudah diupload
            'nama' => $this->nama,
            'bidang_usaha' => $this->bidang_usaha,
            'website' => $this->website,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Industri berhasil ditambahkan!');
        return redirect('/industri');
    }

    public function render()
    {
        return view('livewire.industri.create');
    }
}
