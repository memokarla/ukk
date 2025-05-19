<!-- Knowing others is intelligence; knowing yourself is true wisdom. -->
<div>

    <div class="m-4">
        <!-- search dan add industri-->
        <div class="flex justify-between mb-4">
            <a href="{{ route('industriCreate') }}" type="button" 
            class="text-center text-[#F6F7EF] bg-[#2E7D65] hover:bg-[#256D58] font-medium rounded-lg text-sm py-2.5 px-6">
                Tambahkan Industri
            </a>
        
            <form class="">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                    wire:model.live="search" placeholder="Search" required />
                </div>
            </form>
        </div>

        <div class="shadow-md rounded-xl">
            <div class="py-4 px-8 text-[#F6F7EF] bg-[#2E7D65] rounded-t-xl font-medium text-lg">
                Industri
            </div>
            @forelse($industris as $industri)
                <div class="px-8 py-4 flex gap-8 rounded-b-xl border-t border-t-[#2E7D65] bg-[#F6F7EF]">
                    <div class="">
                        <img src="{{ asset('storage/' . $industri->foto) }}"
                        class="w-24 h-28 rounded-md shadow-xl">
                    </div>
                    <div class="">
                        <div class="text-lg font-semibold">
                            {{ $industri->nama }}
                        </div>
                        <div class="text-sm text-black/50 py-2">
                            {{ $industri->bidang_usaha }}
                        </div>
                        <div class="text-base font-regular">
                            <i class="fas fa-phone-alt pr-2 text-[#2E7D65]"></i>
                            {{ $industri->kontak }}
                        </div>
                        <div class="text-base font-regular">
                            <i class="fas fa-envelope pr-2 text-[#2E7D65]"></i>
                            {{ $industri->email }}
                        </div>
                        <div class="text-base font-regular">
                            <i class="fas fa-globe pr-2 text-[#2E7D65]"></i>
                            {{ $industri->website }}
                        </div>
                        <div class="text-base font-regular mt-4">
                            <i class="fas fa-map-marker-alt pr-2 text-[#2E7D65]"></i>
                            {{ $industri->alamat }}
                        </div>
                    </div>
                </div>
            @empty
                <h1>Data Industri Belum Ditemukan, Kamu Bisa Menambahkannya!</h1>
            @endforelse
        </div>
    </div>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Xx..." crossorigin="anonymous" referrerpolicy="no-referrer" />

</div>
