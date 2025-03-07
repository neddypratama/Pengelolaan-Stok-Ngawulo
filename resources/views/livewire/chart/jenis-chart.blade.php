<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Jumlah Jenis Barang</h6>
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
        <div class="chart-area d-flex justify-content-center">
            <canvas id="jenisBarangChart"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var labelData = @json($labelData);
        var jenisBarangData = @json($jenisBarangData);

        function getRandomColor() {
            return `rgba(${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 0.6)`;
        }

        var backgroundColors = jenisBarangData.map(() => getRandomColor());
        var borderColors = backgroundColors.map(color => color.replace('0.6', '1'));

        var ctx = document.getElementById('jenisBarangChart');
        var jenisBarangChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labelData,
                datasets: [{
                    label: 'Jumlah Jenis Barang',
                    data: jenisBarangData,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        // backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: true,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                return labelData[tooltipItem.dataIndex] + ' : ' + value;
                            }
                        }
                    }
                }
            }
        });
    });

    document.addEventListener("livewire:navigated", function() {
        var labelData = @json($labelData);
        var jenisBarangData = @json($jenisBarangData);

        function getRandomColor() {
            return `rgba(${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 0.6)`;
        }

        var backgroundColors = jenisBarangData.map(() => getRandomColor());
        var borderColors = backgroundColors.map(color => color.replace('0.6', '1'));

        var ctx = document.getElementById('jenisBarangChart');
        var jenisBarangChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labelData,
                datasets: [{
                    label: 'Jumlah Jenis Barang',
                    data: jenisBarangData,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        // backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: true,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                return labelData[tooltipItem.dataIndex] + ' : ' + value;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
