<div class="card shadow-lg p-3 rounded">
    <div class="card-header bg-primary text-white">
        <h5 class="m-0 text-center">Barang Masuk & Keluar (Per Tanggal)</h5>
    </div>
    <div class="card-body">
        <canvas id="barangChart"></canvas>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var labelData = @json($labelData);
        var barangMasukData = @json($barangMasukData);
        var barangKeluarData = @json($barangKeluarData);
        var barangMasukNama = @json($barangMasukNama);
        var barangKeluarNama = @json($barangKeluarNama);

        var ctx = document.getElementById('barangChart').getContext('2d');
        var barangChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labelData,
                datasets: [{
                        label: 'Barang Masuk',
                        data: barangMasukData,
                        borderColor: 'rgba(78, 115, 223, 1)',
                        backgroundColor: 'rgba(78, 115, 223, 0.1)',
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        fill: true,
                    },
                    {
                        label: 'Barang Keluar',
                        data: barangKeluarData,
                        borderColor: 'rgba(231, 74, 59, 1)',
                        backgroundColor: 'rgba(231, 74, 59, 0.1)',
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 14
                            },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        backgroundColor: "rgba(0,0,0,0.8)",
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 12
                        },
                        callbacks: {
                            label: function(tooltipItem) {
                                var index = tooltipItem.dataIndex; // Ambil indeks data
                                var datasetLabel = tooltipItem.dataset
                                .label; // Barang Masuk / Barang Keluar
                                var value = tooltipItem.raw; // Jumlah barang

                                // Pastikan indeks sesuai dengan dataset
                                var namaBarang = datasetLabel === 'Barang Masuk' ?
                                    barangMasukNama[index] ?? 'Tidak ada data' :
                                    barangKeluarNama[index] ?? 'Tidak ada data';

                                return `${datasetLabel}: ${value} (${namaBarang})`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: "Tanggal"
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: "Jumlah Barang"
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
