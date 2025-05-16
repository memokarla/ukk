<!-- Close your eyes. Count to one. That is how long forever feels.  -->
<div>

    <!-- Notifikasi pesan sukses / error -->
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="m-4">
        <div class="flex justify-between mb-4">
            <a href="{{ route('pklCreate') }}" type="button" 
            class="text-center text-[#F6F7EF] bg-[#2E7D65] hover:bg-[#256D58] font-medium rounded-lg text-sm py-2.5 px-6">
                Tambahkan Data PKL
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

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Guru Pembimbing
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Industri
                        </th>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bidang Usaha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mulai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Selesai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Durasi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pkls as $key => $pkl)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $pkl->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $pkl->siswa->nis }} 
                                <!-- siswa ini merupakan nama relasinya ya -->
                            </td>
                            <td class="px-6 py-4">
                                {{ $pkl->siswa->nama }} 
                                <!-- siswa ini merupakan nama relasinya ya -->
                            </td>
                            <td class="px-6 py-4">
                                {{ $pkl->guru->nama }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pkl->industri->nama }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pkl->industri->bidang_usaha }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($pkl->mulai)->format('d F Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($pkl->selesai)->format('d F Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($pkl->mulai)->diffInDays(\Carbon\Carbon::parse($pkl->selesai)) }} hari
                            </td>
                        </tr>
                    @empty
                        <p>Siswa tidak terdaftar.</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
