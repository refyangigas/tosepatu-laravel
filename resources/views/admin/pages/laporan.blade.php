@extends('layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
        </div>
 <!-- Datatables -->
 <div class="col-lg-12">
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <div class="container">
        <div class="row justify-content-end">
          <div class="col-auto">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-button">
              <button class="btn btn-primary" type="button" id="search-button">Search</button>
            </div>
          </div>
          <div class="col-auto">
            <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Belum Bayar</a></li>
                <li><a class="dropdown-item" href="#">Pengerjaan</a></li>
                <li><a class="dropdown-item" href="#">Selesai</a></li>
                <li><a class="dropdown-item" href="#">Gagal</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
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
@endsection
 