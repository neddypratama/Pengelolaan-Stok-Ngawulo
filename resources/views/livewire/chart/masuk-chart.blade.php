<div class="card shadow mb-4">
    <!-- Header dengan Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Grafik Barang Masuk</h6>
        <form id="filterForm" wire:submit.prevent="updateChartDataMasuk">
            <div class="row">
                <div class="col-8">
                    <select wire:model="barangTerpilihMasuk" class="form-control">
                        <option value="all">Semua Barang</option>
                        @foreach ($barangList as $barang)
                            <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Chart -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="barangMasukChart"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener("livewire:navigated", function() {
        var filterButton = document.querySelector("#filterForm button[type='submit']");
        
        if (filterButton) {
            console.log("Livewire navigated, tombol Filter akan diklik otomatis...");
            filterButton.click();
        } else {
            console.error("Tombol Filter tidak ditemukan.");
        }
    });
</script>

<script>
    document.addEventListener("livewire:navigated", function() {
        var ctx = document.getElementById('barangMasukChart').getContext('2d');

        window.barangMasukChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Jumlah Masuk',
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Pastikan ini sudah false
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Masuk'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        // Update chart dari Livewire
        Livewire.on('updateChartMasuk', chartData => {
            // console.log('Data terbaru dari Livewire:', chartData);

            if (Array.isArray(chartData) && Array.isArray(chartData[0])) {
                chartData = chartData[0];
            }

            let labels = chartData.map(item => item.tanggal_masuk);
            let data = chartData.map(item => item.total_masuk);

            // console.log('Labels terbaru:', labels);
            // console.log('Data terbaru:', data);

            if (window.barangMasukChart) {
                window.barangMasukChart.data.labels = labels;
                window.barangMasukChart.data.datasets[0].data = data;
                window.barangMasukChart.update();

                // Resize setelah update
                setTimeout(() => {
                    window.barangMasukChart.resize();
                }, 100);
            } else {
                console.warn('Chart belum diinisialisasi.');
            }
        });

    });

    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('barangMasukChart').getContext('2d');

        window.barangMasukChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Jumlah Masuk',
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Pastikan ini sudah false
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Masuk'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        // Update chart dari Livewire
        Livewire.on('updateChartMasuk', chartData => {
            // console.log('Data terbaru dari Livewire:', chartData);

            if (Array.isArray(chartData) && Array.isArray(chartData[0])) {
                chartData = chartData[0];
            }

            let labels = chartData.map(item => item.tanggal_masuk);
            let data = chartData.map(item => item.total_masuk);

            // console.log('Labels terbaru:', labels);
            // console.log('Data terbaru:', data);

            if (window.barangMasukChart) {
                window.barangMasukChart.data.labels = labels;
                window.barangMasukChart.data.datasets[0].data = data;
                window.barangMasukChart.update();

                // Resize setelah update
                setTimeout(() => {
                    window.barangMasukChart.resize();
                }, 100);
            } else {
                // console.warn('Chart belum diinisialisasi.');
            }
        });

    });
</script>
