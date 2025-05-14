<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;

class Create extends Component
{
    public $siswa_id, $guru_id, $industri_id, $selesai, $mulai;

    public $siswas, $gurus, $industris;

    public function mount()
    {
        $this->siswas = Siswa::all();
        $this->gurus = Guru::all();
        $this->industris = Industri::all();
    }

    public function create()
    {
        $this->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:gurus,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        Pkl::create([
            'siswa_id' => $this->siswa_id,
            'guru_id' => $this->guru_id,
            'industri_id' => $this->industri_id,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ]);

        session()->flash('message', 'Data PKL berhasil ditambahkan!');
        return redirect()->route('pkl'); // arahkan kembali ke halaman index
    }

    public function render()
    {
        return view('livewire.pkl.create');
    }
}
