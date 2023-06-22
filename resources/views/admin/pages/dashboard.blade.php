@extends('layouts.main')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <nav aria-label="breadcrumb" class="d-flex align-items-start justify-content-start">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/transaksi">
                            <i class="fas fa-exchange-alt"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="jasa">
                            <i class="fas fa-desktop"></i>
                            <span>Layanan</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="pengguna">
                            <i class="fas fa-users"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="laporan">
                            <i class="fas fa-chart-bar"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="profile">
                            <i class="fas fa-user"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                </ol>
            </nav>
            
        </div>

        <div class="row mb-3">
       <!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Pendapatan (Bulan)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($totalpendapatan, 2, ',', '.') }}</div>
                    <div class="mt-2 mb-0 text-muted text-xs"></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi (Bulan)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totaltransaksi}}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1"> Total User</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totaldatauser}}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Layanan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totaldatalayanan}}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
            <h6 class="m-0 font-weight-bold">Grafik Pendapatan (Bulan)</h6>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>
</div>




 <!-- Bar Chart -->
<div class="col-xl-4 col-lg-5">
  <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Jumlah Orderan (Bulan)</h6>
      </div>
      <div class="card-body">
          <div class="chart-container" style="height: 320px;">
              <canvas id="orderChart"></canvas>
          </div>
      </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
      // Mendapatkan data dari server
      fetch('/dashboard/get-jumlah-transaksi')
          .then(response => response.json())
          .then(data => {
              // Data untuk grafik
              var chartData = {
                  labels: data.labels,
                  datasets: [{
                          label: "Jumlah Orderan",
                          data: data.jumlahTransaksi,
                          backgroundColor: "rgba(54, 162, 235, 0.2)",
                          borderColor: "rgba(54, 162, 235, 1)",
                          borderWidth: 1,
                          fill: true,
                      },
                      {
                          label: "Jumlah Sepatu",
                          data: data.jumlahSepatu,
                          backgroundColor: "rgba(255, 99, 132, 0.2)",
                          borderColor: "rgba(255, 99, 132, 1)",
                          borderWidth: 1,
                          fill: true,
                      }
                  ]
              };

              // Opsi konfigurasi grafik
              var options = {
                  responsive: true,
                  maintainAspectRatio: false,
                  tooltips: {
                      callbacks: {
                          title: function(tooltipItem, data) {
                              return 'Minggu ' + (tooltipItem[0].index + 1);
                          },
                          label: function(tooltipItem, data) {
                              if (tooltipItem.datasetIndex === 0) {
                                  return 'Order: ' + tooltipItem.yLabel;
                              } else if (tooltipItem.datasetIndex === 1) {
                                  return 'Jumlah Sepatu: ' + tooltipItem.yLabel;
                              }
                          }
                      }
                  },
                  scales: {
                      x: {
                          display: true,
                          title: {
                              display: true,
                              text: 'Minggu'
                          }
                      },
                      y: {
                          display: true,
                          title: {
                              display: true,
                              text: 'Order Quantity'
                          },
                          ticks: {
                              beginAtZero: true,
                              callback: function(value, index, values) {
                                  // Mengatur format sumbu y sesuai kondisi jumlah orderan
                                  if (value >= 1000) {
                                      return (value / 1000) + 'k';
                                  } else if (value >= 100) {
                                      return (value / 100) + '00';
                                  } else if (value >= 10) {
                                      return (value / 10) + '0';
                                  } else {
                                      return value;
                                  }
                              }
                          }
                      }
                  }
              };

              // Membuat grafik menggunakan Chart.js
              var ctx = document.getElementById('orderChart').getContext('2d');
              var orderChart = new Chart(ctx, {
                  type: 'bar',
                  data: chartData,
                  options: options
              });
          });
  });
</script>



        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
@endsection
