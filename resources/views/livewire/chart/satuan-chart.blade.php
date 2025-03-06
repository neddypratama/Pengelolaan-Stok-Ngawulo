<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Jumlah Satuan Barang</h6>
        <div class="dropdown no-arrow">
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area d-flex justify-content-center">
            <canvas id="satuanBarangChart"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var labelData = @json($labelData);
        var satuanBarangData = @json($satuanBarangData);

        function getRandomColor() {
            return `rgba(${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 0.6)`;
        }

        var backgroundColors = satuanBarangData.map(() => getRandomColor());
        var borderColors = backgroundColors.map(color => color.replace('0.6', '1'));

        var ctx = document.getElementById('satuanBarangChart');
        var satuanBarangChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labelData,
                datasets: [{
                    label: 'Jumlah Satuan Barang',
                    data: satuanBarangData,
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
        var satuanBarangData = @json($satuanBarangData);

        function getRandomColor() {
            return `rgba(${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 
                     ${Math.floor(Math.random() * 255)}, 0.6)`;
        }

        var backgroundColors = satuanBarangData.map(() => getRandomColor());
        var borderColors = backgroundColors.map(color => color.replace('0.6', '1'));

        var ctx = document.getElementById('satuanBarangChart');
        var satuanBarangChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labelData,
                datasets: [{
                    label: 'Jumlah Satuan Barang',
                    data: satuanBarangData,
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
