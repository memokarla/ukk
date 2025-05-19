<!-- The Master doesn't talk, he acts. -->
<div>

    <div class="m-4 flex flex-col gap-y-4">

        <div class="rounded-lg bg-white flex justify-between shadow-sm">
            <div class="mx-6 my-4 flex justify-center items-center">
                @if ($siswa)
                    <div class="bg-yellow-500/50 p-6 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold mb-4">Hai, {{ $siswa->nama }} 👋</h2>

                        @if ($siswa->status_lapor_pkl)
                            <!-- Jika sudah kirim data PKL -->
                            <p class="mb-4 text-green-700">
                                Terima kasih!
                                <br>
                                Kamu sudah mengirim data PKL. 🎉
                            </p>
                            <a href="/dataPkl" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                Lihat atau perbarui data PKL
                            </a>
                        @else
                            <!-- Jika belum kirim data PKL -->
                            <p class="mb-4 text-yellow-800">
                                Kamu belum mengirim data PKL. 
                                <br>
                                Yuk segera lengkapi datamu biar prosesnya lancar! ⏳
                            </p>
                            <a href="/dataPkl" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                                Isi Data PKL Sekarang
                            </a>
                        @endif
                    </div>
                @else
                    <div class="text-red-600">
                        Data siswa tidak ditemukan.
                    </div>
                @endif
            </div>

            <div class="mx-6 my-4 flex justify-center items-center shadow-md">
                <!-- [kondisi] ? [benar] : [salah] -->
                <img class="rounded-xl w-full h-full object-contain" 
                src="{{ $siswa->foto && file_exists(storage_path('app/public/' . $siswa->foto)) 
                ? asset('storage/' . $siswa->foto) 
                : asset('storage/siswa/siswa.png') }}" 
                alt="foto siswa" />
            </div>
        </div>

    </div>

</div>
