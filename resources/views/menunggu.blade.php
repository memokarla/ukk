<x-app-layout>

    <div class="pt-16">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 m-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Header dengan ilustrasi -->
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-3xl font-bold mb-2">Menunggu Persetujuan</h2>
                            <p class="text-blue-100">Akun Anda sedang dalam proses verifikasi</p>
                        </div>
                        <div class="hidden md:block">
                            <svg class="w-24 h-24 text-white opacity-75" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 100-16 8 8 0 000 16zm1-8h4v2h-6V7h2v5z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Status card -->
                <div class="p-6">
                    <div class="flex items-center p-4 mb-6 bg-yellow-50 border-l-4 border-yellow-400 rounded-r-md">
                        <svg class="h-6 w-6 text-yellow-400 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-yellow-700">
                            Akun Anda telah berhasil terdaftar dan sedang menunggu persetujuan administrator.
                        </p>
                    </div>
                    
                    <!-- Progress indicator -->
                    <div class="flex items-center justify-center my-8">
                        <!-- Step 1: Registrasi -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center bg-green-500 text-white font-semibold">
                                ✓
                            </div>
                            <span class="text-xs mt-2 text-green-600">Registrasi</span>
                        </div>

                        <!-- Garis antar step -->
                        <div class="flex-auto border-t-2 border-blue-500 mx-2"></div>

                        <!-- Step 2: Menunggu -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center bg-blue-500 text-white font-semibold animate-pulse">
                                2
                            </div>
                            <span class="text-xs mt-2 text-blue-600">Persetujuan</span>
                        </div>

                        <!-- Garis antar step -->
                        <div class="flex-auto border-t-2 border-gray-300 mx-2"></div>

                        <!-- Step 3: Akses -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center bg-gray-300 text-white font-semibold">
                                3
                            </div>
                            <span class="text-xs mt-2 text-gray-400">Akses Penuh</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>