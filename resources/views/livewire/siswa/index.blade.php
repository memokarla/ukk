<!-- Success is as dangerous as failure.  -->
<div class="pt-16">

    <div class="m-4">
        <div class="flex justify-end my-4 gap-4">
            <form class="">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full ps-10 text-sm text-gray-900 border border-yellow-300 rounded-lg bg-gray-50 focus:ring-yellow-500 focus:border-yellow-500" 
                    wire:model.live="search" placeholder="Search" required />
                </div>
            </form>

            <!-- filter sort -->
            <div data-collapse-toggle="filter_siswa" class="text-[#F6F7EF] bg-[#FCD34D] hover:bg-yellow-500 flex items-center py-2 px-4 rounded-xl cursor-pointer gap-2">
                <i class="fas fa-filter"></i>
            </div>
        </div>

        <!-- filter dan sort -->
        <div class="bg-white border border-[#FCD34D] rounded-xl p-4 flex flex-col gap-y-4 mb-4 hidden" id="filter_siswa">
            <!-- filter -->
            <!-- gender -->
            <div class="flex justify-between">
                <div class="text-black-700">Gender</div>

                 <div class="grid gap-4">
                    <div class="flex gap-4 mt-2">
                        @foreach($genders as $value => $gender)
                            <label class="cursor-pointer relative">
                                <input type="checkbox" wire:model.live="selected_gender" value="{{ $value }}" class="peer sr-only" />

                                <!-- before -->
                                <div class="overflow-hidden opacity-100 rounded-lg border border-[#FCD34D] peer-checked:opacity-0">
                                    <div class="flex items-center text-center justify-between p-2">
                                        <span class="z-3 text-base text-black-700 pr-2">{{ $gender }}</span>
                                        <i class="fa-solid fa-check text-black-500 opacity-0"></i>
                                    </div>
                                </div>

                                <!-- after -->
                                <div class="absolute top-0 r-0 opacity-0 rounded-lg border border-[#FCD34D] peer-checked:opacity-100 peer-checked:bg-[#FCD34D] peer-checked:text-white">
                                    <div class="flex items-center justify-between p-2">
                                        <span class="text-base pr-2">{{ $gender }}</span>
                                        <i class="fa-solid fa-check text-white-500"></i>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="border border-[#FCD34D]"></div>

            <!-- rombel -->
            <div class="flex justify-between">
                <div class="text-black-700">Rombongan Belajar</div>

                 <div class="grid gap-4">
                    <div class="flex gap-4 mt-2">
                        @foreach($rombels as $value => $rombel)
                            <label class="cursor-pointer relative">
                                <input type="checkbox" wire:model.live="selected_rombel" value="{{ $value }}" class="peer sr-only" />

                                <!-- before -->
                                <div class="overflow-hidden opacity-100 rounded-lg border border-[#FCD34D] peer-checked:opacity-0">
                                    <div class="flex items-center text-center justify-between p-2">
                                        <span class="z-3 text-base text-black-700 pr-2">{{ $rombel }}</span>
                                        <i class="fa-solid fa-check text-black-500 opacity-0"></i>
                                    </div>
                                </div>

                                <!-- after -->
                                <div class="absolute top-0 r-0 opacity-0 rounded-lg border border-[#FCD34D] peer-checked:opacity-100 peer-checked:bg-[#FCD34D] peer-checked:text-white">
                                    <div class="flex items-center justify-between p-2">
                                        <span class="text-base pr-2">{{ $rombel }}</span>
                                        <i class="fa-solid fa-check text-white-500"></i>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="border border-[#FCD34D]"></div>

            <!-- sort -->
            <!-- abjad -->
            <div class="flex justify-between">
                <div class="text-black-700">Abjad</div>

                <div class="flex gap-4 mt-2">
                    {{-- a-z --}}
                    <label class="cursor-pointer relative">
                        <input type="radio" wire:model.live="selected_abjad" name="sortBy" value="Abjad:A - Z" class="peer sr-only" />
                        {{-- before --}}
                        <div class="overflow-hidden opacity-100 rounded-lg border border-[#FCD34D] peer-checked:opacity-0">
                            <div class="flex items-center text-center justify-between p-2">
                                <span class="z-3 text-base text-black-700 pr-2">A-Z</span>
                                <i class="fa-solid fa-check text-black-700 opacity-0"></i>
                            </div>
                        </div>
                        {{-- after --}}
                        <div class="absolute top-0 r-0 opacity-0 rounded-lg border border-[#FCD34D] peer-checked:opacity-100 checked peer-checked:bg-[#FCD34D] peer-checked:text-white">
                            <div class="flex items-center justify-between p-2">
                                <span class="text-base pr-2">A-Z</span>
                                <i class="fa-solid fa-check text-white-500"></i>
                            </div>
                        </div>
                    </label>

                    {{-- z-a --}}
                    <label class="cursor-pointer relative">
                        <input type="radio" wire:model.live="selected_abjad" name="sortBy" value="Abjad:Z - A" class="peer sr-only" />
                        {{-- before --}}
                        <div class="overflow-hidden opacity-100 rounded-lg border border-[#FCD34D] peer-checked:opacity-0">
                            <div class="flex items-center text-center justify-between p-2">
                                <span class="z-3 text-base text-black-700 pr-2">Z-A</span>
                                <i class="fa-solid fa-check text-black-700 opacity-0"></i>
                            </div>
                        </div>
                        {{-- after --}}
                        <div class="absolute top-0 r-0 opacity-0 rounded-lg border border-[#FCD34D] peer-checked:opacity-100 checked peer-checked:bg-[#FCD34D] peer-checked:text-white">
                            <div class="flex items-center justify-between p-2">
                                <span class="text-base pr-2">Z-A</span>
                                <i class="fa-solid fa-check text-white-500"></i>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white bg-[#FCD34D]">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gender
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rombel
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kontak
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswas as $key => $siswa)
                        <tr class="bg-white border-b border-gray-200 hover:bg-yellow-100">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $siswa->id }}
                            </th>
                            <td class="px-6 py-4">
                                <!-- [kondisi] ? [benar] : [salah] -->
                                <img class="rounded-full w-12 h-12 object-contain" 
                                src="{{ $siswa->foto && file_exists(storage_path('app/public/' . $siswa->foto)) 
                                ? asset('storage/' . $siswa->foto) 
                                : asset('images/siswa.png') }}" 
                                alt="foto siswa" />
                            </td>
                            <td class="px-6 py-4">
                                {{ $siswa->nama }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $siswa->nis }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $siswa->gender }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $siswa->rombel }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $siswa->alamat }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $siswa->kontak }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $siswa->email }}
                            </td>
                        </tr>
                    @empty
                        <p>Siswa tidak terdaftar.</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Xx..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- js flowbite -->
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

</div>
