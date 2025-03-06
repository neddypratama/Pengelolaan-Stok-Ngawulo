<div class="card shadow mb-4">
    <!-- Header dengan Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Grafik Barang Keluar</h6>
        <form id="filter" wire:submit.prevent="updateChartDataKeluar">
            <div class="row">
                <div class="col-8">
                    <select wire:model="barangTerpilihKeluar" class="form-control">
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
            <canvas id="barangKeluarChart"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener("livewire:navigated", function() {
        var filterButton = document.querySelector("#filter button[type='submit']");
        
        if (filterButton) {
            console.log("Livewire navigated, tombol Filter akan diklik otomatis...");
            filterButton.click();
        } else {
            console.error("Tombol Filter tidak ditemukan.");
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('barangKeluarChart').getContext('2d');

        window.barangKeluarChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Jumlah Keluar',
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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
                            text: 'Jumlah Keluar'
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
        Livewire.on('updateChartKeluar', chartData => {
            // console.log('Data terbaru dari Livewire:', chartData);

            if (Array.isArray(chartData) && Array.isArray(chartData[0])) {
                chartData = chartData[0];
            }

            let labels = chartData.map(item => item.tanggal_keluar);
            let data = chartData.map(item => item.total_keluar);

            // console.log('Labels terbaru:', labels);
            // console.log('Data terbaru:', data);

            if (window.barangKeluarChart) {
                window.barangKeluarChart.data.labels = labels;
                window.barangKeluarChart.data.datasets[0].data = data;
                window.barangKeluarChart.update();

                // Resize setelah update
                setTimeout(() => {
                    window.barangKeluarChart.resize();
                }, 100);
            } else {
                console.warn('Chart belum diinisialisasi.');
            }
        });
    });

    document.addEventListener("livewire:navigated", function() {
        var ctx = document.getElementById('barangKeluarChart').getContext('2d');

        window.barangKeluarChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Jumlah Keluar',
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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
                            text: 'Jumlah Keluar'
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
        Livewire.on('updateChartKeluar', chartData => {
            // console.log('Data terbaru dari Livewire:', chartData);

            if (Array.isArray(chartData) && Array.isArray(chartData[0])) {
                chartData = chartData[0];
            }

            let labels = chartData.map(item => item.tanggal_keluar);
            let data = chartData.map(item => item.total_keluar);

            // console.log('Labels terbaru:', labels);
            // console.log('Data terbaru:', data);

            if (window.barangKeluarChart) {
                window.barangKeluarChart.data.labels = labels;
                window.barangKeluarChart.data.datasets[0].data = data;
                window.barangKeluarChart.update();

                // Resize setelah update
                setTimeout(() => {
                    window.barangKeluarChart.resize();
                }, 100);
            } else {
                console.warn('Chart belum diinisialisasi.');
            }
        });
    });
</script>
