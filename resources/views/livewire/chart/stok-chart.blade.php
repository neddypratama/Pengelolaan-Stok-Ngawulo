<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Stok Barang</h6>
        <div class="dropdown no-arrow">
            {{-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div> --}}
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="stokChart"></canvas>
        </div>
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
                maintainAspectRatio: false, // Harus false agar tinggi bisa disesuaikan
                plugins: {
                    legend: {
                        display: false,
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
                animation: {
                    duration: 1500,
                    easing: 'easeOutBounce'
                }
            }
        });
    });

    document.addEventListener("livewire:navigated", function() {
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
                maintainAspectRatio: false, // Harus false agar tinggi bisa disesuaikan
                plugins: {
                    legend: {
                        display: false,
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
                animation: {
                    duration: 1500,
                    easing: 'easeOutBounce'
                }
            }
        });
    });
</script>
