@extends('layouts.main')

@section('content')
      <div class="col-lg-6">
        <h4 class="m-0">Data Laporan</h4> 
        <nav aria-label="breadcrumb"  class="d-flex align-items-start justify-content-start">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
            <li class="breadcrumb-item"><a href="#">Jasa</a></li>
            <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
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
  <div class="col-xl-12 mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <div class="col-lg-6">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@mail.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@greatstuff.com</td>
      </tr>
      <tr>
        <td>Anja</td>
        <td>Ravendale</td>
        <td>a_r@test.com</td>
      </tr>
    </tbody>
  </table>
  </div>
      </div>
    </div>
  </div>
</div>
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
</div>

@endsection
 