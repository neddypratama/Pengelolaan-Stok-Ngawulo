<div class="card shadow-lg p-3 rounded">
    <div class="card-header bg-success text-white">
        <h5 class="m-0 text-center">Jumlah Jenis Barang</h5>
    </div>
    <div class="card-body">
        <canvas id="jenisBarangChart"></canvas>
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
                        backgroundColor: "rgb(255,255,255)",
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
