<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;

class Index extends Component
{
    public $siswa = null;
    public $guru = null;
    public $industri = null;
    public $search = '';

    public function render()
    {
        $pkls = Pkl::with(['siswa', 'guru', 'industri'])
            ->when($this->siswa, fn($query) => $query->where('siswa_id', $this->siswa))
            ->when($this->guru, fn($query) => $query->where('guru_id', $this->guru))
            ->when($this->industri, fn($query) => $query->where('industri_id', $this->industri))
            ->when($this->search, fn($query) => $query->where('mulai', 'like', "%{$this->search}%"))
            ->when($this->search, fn($query) => $query->where('selesai', 'like', "%{$this->search}%"))->when($this->search, function ($query) {
                $query->whereHas('siswa', fn($q) =>
                    $q->where('nama', 'like', "%{$this->search}%")
                )->orWhereHas('guru', fn($q) =>
                    $q->where('nama', 'like', "%{$this->search}%")
                )->orWhereHas('industri', fn($q) =>
                    $q->where('nama', 'like', "%{$this->search}%")
                );
            })
            ->get();

        return view('livewire.pkl.index', compact('pkls'));
    }
}
