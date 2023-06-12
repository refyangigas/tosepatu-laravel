@extends('layouts.main')

@section('content')
      <div class="col-lg-6">
        <h4 class="m-0">Data Laporan</h4> 
        <nav aria-label="breadcrumb" class="d-flex align-items-start justify-content-start">
          <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                  <a href="dashboard">
                      <i class="fas fa-tachometer-alt"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                  <i class="fas fa-chart-bar"></i>
                  <span>Laporan</span>
          </ol>
        </nav>
      </div>
      <div class="container">
  <div class="col-xl-12 mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <div class="col-lg-6">
          <h4>Filter Laporan</h4>
          <p>Mulai Tanggal</p>
          <input class="form-control" type="date" id="myInput">
          <br>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="card">
        <div class="table-responsive p-3">
      <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th>NO</th>
            <th>STATUS</th>
            <th>NAMA</th>
            <th>LAYANAN</th>
            <th>JUMLAH</th>
            <th>PEMBAYARAN</th>
            <th>TOTAL</th>
            <th>TANGGAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Lael Greer</td>
            <td><span class="badge badge-success">Terkirim</span></td>
            <td>Systems Administrator</td>
            <td>London</td>
            <td>21</td>
            <td>2009/02/27</td>
            <td>$103,500</td>
            <td>00-00-00</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

@endsection
 