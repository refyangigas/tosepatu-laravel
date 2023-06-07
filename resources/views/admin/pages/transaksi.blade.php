@extends('layouts.main')

 @section('content')
  <!-- Invoice Example -->

<!-- Invoice Example -->
<div class="col-xl-12 mb-4">
  <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
          <div class="table-responsive">
            <table class="table align-items-center table-flush table-responsive-sm">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Status</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Pembayaran</th>
                  <th>Total</th>
                  <th>Bukti</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">1</a></td>
                  <td><span class="badge badge-success">Terkirim</span></td>
                  <td>Udin Wayang</td>
                  <td><span class="badge badge-success">Terkirim</span></td>
                  <td>Nasi Padang</td>
                  <td>10</td>
                  <td><a href="#" class="btn btn-sm btn-primary">Bukti</a></td>
                  <td>00-00-00</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-primary">Delete</a>
                  </td>
                </tr>
                <!-- Data lainnya -->
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
