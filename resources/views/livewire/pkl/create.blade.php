<!-- Care about people's approval and you will be their prisoner. -->
<div>

    


    <!-- form -->
    <div class="bg-[#F6F7EF] py-4 px-8 rounded-xl shadow-md">
        <div class="text-xl border-b pb-4 mb-2 border-[#2E7D65] font-medium text-black/70">
            Tambahkan Data PKL
        </div>

        <!-- siswa -->
        <div class="">
            <form class="w-full">
                <div class="">
                    <!-- disini ada 3 hal yang patut diperhatikan, yaitu for, id, dan wire:model -->
                    <!-- untuk for dan id ini saling berhubungan, agar saat label for=[nama] dipencet, akan memunculkan elemen dengan id=[nama] -->
                    <label for="siswa_id" class="block mb-2 text-lg font-medium text-black/70">Nama Siswa</label>
                    <!-- sekarang bahas wire:model, ini yang penting di livewire -->
                    <!-- jadi wire:model ini memberi perintah "Sambungkan nilai input ini ke properti publik bernama $siswa_id di class PHP-nya" -->
                    <!-- jadi, saat pengguna memilih <select>, Livewire akan otomatis mengubah nilai properti: public $siswa_id; di app/livewire/pkl/create.php -->
                    <select wire:model='siswa_id' type="text" id="siswa_id"
                    class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBE8] text-black-700 border border-[#2E7D65]
                    focus:ring-[#2E7D65] focus:border-[#2E7D65]
                            @error('siswa_id') border-red-600 @enderror" 
                    required>
                        <option value="">Nama Siswa</option>
                        @foreach($siswas as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    @if(session()->has('error'))
                        <div class="text-red-500">{{ session('error') }}</div>
                    @endif
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 w-full">
            <!-- guru -->
            <div class="">
                <form class="w-full">
                    <div class="">
                        <label for="guru_id" class="block mb-2 text-lg font-medium text-black/70">Nama Guru</label>
                        <select wire:model='guru_id' type="text" id="guru_id"
                        class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBE8] text-black-700 border border-[#2E7D65]
                        focus:ring-[#2E7D65] focus:border-[#2E7D65]
                                @error('guru_id') border-red-600 @enderror" 
                        required>
                            <option value="">Nama Guru</option>
                            @foreach($gurus as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>

            <!-- industri -->
            <div class="">
                <form class="w-full">
                    <div class="">
                        <label for="industri_id" class="block mb-2 text-lg font-medium text-black/70">Nama Industri</label>
                        <select wire:model='industri_id' type="text" id="industri_id"
                        class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBE8] text-black-700 border border-[#2E7D65]
                        focus:ring-[#2E7D65] focus:border-[#2E7D65]
                                @error('industri_id') border-red-600 @enderror" 
                        required>
                            <option value="">Nama Industri</option>
                            @foreach($industris as $industri)
                                <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                            @endforeach
                        </select>
                        @error('industri_id')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>

            <!-- mulai -->
            <div class="">
                <form class="w-full">
                    <div class="">
                        <label for="mulai" class="block mb-2 text-lg font-medium text-black/70">Mulai</label>
                        <input wire:model='mulai' type="date" id="mulai" placeholder="Mulai PKL"
                        class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBE8] text-black-700 border border-[#2E7D65]
                        focus:ring-[#2E7D65] focus:border-[#2E7D65]
                                @error('mulai') border-red-600 @enderror" 
                        required />
                        @error('mulai')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>

            <!-- selesai -->
            <div class="">
                <form class="w-full">
                    <div class="">
                        <label for="selesai" class="block mb-2 text-lg font-medium text-black/70">Selesai</label>
                        <input wire:model='selesai' type="date" id="selesai" placeholder="Selesai PKL"
                        class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBE8] text-black-700 border border-[#2E7D65]
                        focus:ring-[#2E7D65] focus:border-[#2E7D65]
                                @error('selesai') border-red-600 @enderror" 
                        required />
                        @error('selesai')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
        </div>

        <!-- button -->
        <div class="flex justify-end gap-4">
            <a  href="{{ route('pkl') }}" type="button"
                    class="text-center text-[#F6F7EF] bg-[#2E7D65] hover:bg-[#256D58] font-medium rounded-lg text-sm py-2.5 px-6 mt-4">
                Kembali
            </a>
            <button wire:click="create" type="button"
                    class="text-center text-[#F6F7EF] bg-[#2E7D65] hover:bg-[#256D58] font-medium rounded-lg text-sm py-2.5 px-6 mt-4">
                Tambahkan
            </button>
        </div>
    </div>
    
</div>

