<!-- The Master doesn't talk, he acts. -->
<div>

    <div class="m-4 flex flex-col gap-y-4">

        <!-- CTA -->
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
                <img class="rounded-xl w-56 h-56 object-contain" 
                src="{{ $siswa->foto && file_exists(storage_path('app/public/' . $siswa->foto)) 
                ? asset('storage/' . $siswa->foto) 
                : asset('storage/siswa/siswa.png') }}" 
                alt="foto siswa" />
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="flex flex-wrap gap-4 justify-between">
            <!-- Chart -->
            <!-- ada id kan, nah ini untuk memberi identitas agar kelak dapat dipanggil oleh scriptnya -->
            <div id="chart_pkl" class=""></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                // load library Google ChartJs
                google.charts.load('current', { // 'current' artinya pakai versi terbaru dari library-nya
                    packages: ['corechart'] // ini mengampil paket grafik inti seperti Pie Chart, Line Chart, dll
                });

                // lalu panggil fungsi drawChart() yang kita buat di bawah ini
                google.charts.setOnLoadCallback(drawChart);

                // fungsi utamanya adalah menggambar pie chart
                function drawChart() {
                    const chartData = @json($chartData); // ambil data dari logika Livewire ke JS

                    const data = google.visualization.arrayToDataTable(chartData); // ubah array biasa jadi format yang dimengerti oleh Google Charts

                    const options = {
                        title: 'Status Pengisian PKL', // judul
                        pieHole: 0.4, // ini besarnya lubang, jika tanpa maka full bunder
                        colors: ['#4ade80', '#60a5fa', '#f87171'],  // warna, urutannya berdasarkan logika kita
                    };

                    // ini untuk buat 'kanvas' nya
                    // jadi, seluruh kodingan di dalam script ini akan dikirim ke mana nih?
                    // yaitu lemen HTML yang memiliki id 'chart_pkl'
                    // nanti akan dikirim ke variable chart
                    const chart = new google.visualization.PieChart(document.getElementById('chart_pkl'));

                    // gambar chartnya sekarang
                    // ambil data yang udah di format ('data')
                    // ambil pengaturan (judul, lubang pie, warna) dari ('options')
                    // lalu gambar grafiknya ke dalam elemen tadi ('chart_pkl')
                    chart.draw(data, options);
                }
            </script>

            <!-- Chart Rombel A -->
            <div id="chart_pkl_rombelA" class=""></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', { 
                    packages: ['corechart'] 
                });

                google.charts.setOnLoadCallback(drawChartRombelA);

                function drawChartRombelA() {
                    const chartDataRombelA = @json($chartDataRombelA); 

                    const data = google.visualization.arrayToDataTable(chartDataRombelA); 

                    const options = {
                        title: 'Status Pengisian PKL Rombel A', 
                        pieHole: 0.4, 
                        colors: ['#4ade80', '#60a5fa'],  
                    };

                    const chart = new google.visualization.PieChart(document.getElementById('chart_pkl_rombelA'));
                    chart.draw(data, options);
                }
            </script>

            <!-- Chart Rombel B -->
            <div id="chart_pkl_rombelB" class=""></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', { 
                    packages: ['corechart'] 
                });

                google.charts.setOnLoadCallback(drawChartRombelB);

                function drawChartRombelB() {
                    const chartDataRombelB = @json($chartDataRombelB); 

                    const data = google.visualization.arrayToDataTable(chartDataRombelB); 

                    const options = {
                        title: 'Status Pengisian PKL Rombel B', 
                        pieHole: 0.4, 
                        colors: ['#4ade80', '#60a5fa'],  
                    };

                    const chart = new google.visualization.PieChart(document.getElementById('chart_pkl_rombelB'));
                    chart.draw(data, options);
                }
            </script>
        </div>

    </div>

</div>
