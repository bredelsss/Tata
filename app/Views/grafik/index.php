<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="section">
<div class="section-body">
            <h2 class="section-title">Grafik Penyewaan Tata Rental Motor</h2>
            <!-- <p class="section-lead">
              We use 'Chart.JS' made by @chartjs. You can check the full documentation <a href="http://www.chartjs.org/">here</a>.
            </p> -->

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Grafik Baris Penyewaan</h4>
                    <div class="col-sm-3">
                      <input type="number" id="tahun" class="form-control" value="<?= date('Y') ?>" onchange="chartTransaksi()">

                    </div>
                    <h3  id="tahun1"></h6>
                
                  </div>  
                  <div class="card-body">
                  <canvas id="chartTransaksi" width="100%" height="40"></canvas></div>
                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-primary btn-sm" onclick="downloadChartTransaksi('PDF')">Unduh PDF</button>
                        <a id="download-trans" download="chart-transaksi.png">
                            <button class="btn btn-outline-secondary btn-sm" onclick="downloadChartTransaksi('PNG')">Unduh PNG</button>
                        </a>
                    </div>
              
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Grafik Batang Penyewaan</h4>
                    <div class="col-sm-3">
                      

                    </div>
                    <h3  id="tahun1"></h6>
                  </div>
                  <div class="card-body">
                  <canvas id="myChart2" width="100%" height="40"></canvas></div>
                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-primary btn-sm" onclick="downloadChart('PDF')">Unduh PDF</button>
                        <a id="download-chart" download="chart-transaksi.png">
                            <button class="btn btn-outline-secondary btn-sm" onclick="downloadChart('PNG')">Unduh PNG</button>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Doughnut Chart</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart3"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Pie Chart</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart4"></canvas>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
         

<script>
  function show(){
      
    }
   $(document).ready(function() {
        chartTransaksi()
        chartTransaksi2()
        show()
        // document.getElementById('tahun1').innerHTML="hgvshhvs";
     
    });
    function setLineChart(dataset) {
      var ctx = document.getElementById("chartTransaksi");
      var myChart = new Chart(ctx, {
      type: 'line',
      data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
      datasets: [{
      label: 'Total',
      data: dataset,
      borderWidth: 2,
      backgroundColor: '',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 150
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});
    }
  function chartTransaksi() {
        var tahun = $('#tahun').val();
        $.ajax({
            url: "/chart-transaksi",
            method: "POST",
            data: {
                'tahun': tahun,
            },
            success: function(response) {
                var result = JSON.parse(response)
              // console.log(result.data)
                dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                $.each(result.data, function(i, val) {
                    dataset[val.month - 1] = val.total
                });
                // dd(dataset);
                setLineChart(dataset)
                setPieChart(dataset)
                
                
            }
        });
    }

    

    

    function downloadChartImg(download, chart) {
        var img = chart.toDataURL("image/jpg", 1.0).replace("image/jpg", "image/octet-stream")
        download.setAttribute("href", img)
    }

    function downloadChartPDF(chart, name) {
        html2canvas(chart, {
            onrendered: function(canvas) {
                var img = canvas.toDataURL("image/jpg", 1.0)
                var doc = new jsPDF('l', 'pt', 'A4')
                var lebarKonten = canvas.width
                var tinggiKonten = canvas.height
                var tinggiPage = lebarKonten / 500.28 * 841.89
                var leftHeight = tinggiKonten
                var position = 0
                var imgWidth = 400.28
                var imgHeight = 595.28 / lebarKonten * tinggiKonten
                if (leftHeight < tinggiPage) {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight)

                } else {
                    while (leftHeight > 0) {
                        doc.addIamge(img, 'PNG', 0, position, imgWidth, imgHeight)

                        leftHeight -= tinggiPage
                        position -= 841.89
                        if (leftHeight > 0) {
                            pdf.addPage()
                        }
                    }
                }
                doc.save(name)
            }
        });
    }

    function downloadChartTransaksi(type) {
        var download = document.getElementById('download-trans')
        var chart = document.getElementById('chartTransaksi')

        if (type == "PNG") {
            downloadChartImg(download, chart)
        } else {
            downloadChartPDF(chart, "Chart-Transaksi.pdf")
        }
    }

    function downloadChart(type) {
        var download = document.getElementById('download-chart')
        var chart = document.getElementById('myChart2')

        if (type == "PNG") {
            downloadChartImg(download, chart)
        } else {
            downloadChartPDF(chart, "Chart-Transaksi.pdf")
        }
    }

    function setPieChart(dataset){
      var ctx = document.getElementById("myChart2");
      var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
      datasets: [{
      label: 'Total',
      data: dataset,
      borderWidth: 2,
      backgroundColor: '#ffa426',
      borderColor: '#191d21',
      borderWidth: 5.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 150
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});
    }
    

</script>
</section>

<?= $this->endSection() ?>