<!-- Care about people's approval and you will be their prisoner. -->
<div>

    <!-- nama -->
    <div class="w-full">
        <form class="w-full bg-pink-200">
            <div class="">
                <label for="nama" class="block mb-2 text-sm font-medium text-white">Nama</label>
                <input wire:model='nama' type="text" id="nama" 
                class="text-sm rounded-lg block w-full p-2.5 bg-yellow-200 border-none
                focus:ring-red-500 focus:border-red-500
                        @error('nama') border-red-600 @enderror" 
                required />
                @error('nama')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </form>
    </div>
</div>
