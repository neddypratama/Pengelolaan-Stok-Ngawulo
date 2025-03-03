<div class="card shadow-lg p-3 rounded">
    <div class="card-header bg-primary text-white">
        <h5 class="m-0 text-center">Stok Barang</h5>
    </div>
    <div class="card-body">
        <canvas id="stokChart"></canvas>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var stokData = @json(collect($stokData)->pluck('stok_barang'));
        var labelData = @json(collect($stokData)->pluck('nama_barang'));

        // Generate warna random
        function getRandomColor() {
            return `rgba(${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 0.6)`;
        }

        var backgroundColors = stokData.map(() => getRandomColor());
        var borderColors = backgroundColors.map(color => color.replace('0.6', '1'));

        var ctx = document.getElementById('stokChart').getContext('2d');
        var stokChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelData,
                datasets: [{
                    label: 'Stok Barang',
                    data: stokData,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
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
                        enabled: true,
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 12
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            drawBorder: false, // Hilangkan border sumbu Y
                            display: false, // Hilangkan garis grid Y
                            color: "rgba(0, 0, 0, 0)" // Pastikan tidak terlihat
                        },
                        ticks: {
                            display: false
                        } // Hilangkan angka sumbu Y
                    },
                    x: {
                        grid: {
                            drawBorder: false, // Hilangkan border sumbu X
                            display: false, // Hilangkan garis grid X
                            color: "rgba(0, 0, 0, 0)" // Pastikan tidak terlihat
                        },
                        ticks: {
                            display: false
                        } // Hilangkan angka sumbu X
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeOutBounce'
                }
            }
        });
    }); 
</script>
