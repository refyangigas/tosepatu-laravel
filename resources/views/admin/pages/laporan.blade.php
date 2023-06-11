@extends('layouts.main')

@section('content')
</style>
<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Pegawai</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
        </div>
        <div class="row mb-3">

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Baru</div>
                    
                    <div class="mt-2 mb-0 text-muted text-xs"></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Proses</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-rocket fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1"> Selesai</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-edit fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Diambil</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-gift fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
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
        </div>
      </div>
    </div>
     <div class="row">
                    	<div class="col-md-12">
                    		<h4 class="card-title">Daftar Pegawai</h4>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="table-responsive">
		                        <table class="table table-striped table-bordered zero-configuration">
		                            <thead style="text-align: center;">
		                                <tr>
		                                    <th>No</th>
		                                    <th>Nama</th>
		                                    <th>Kode Pengguna</th>
		                                    <th>Posisi</th>
		                                    <th>Username</th>
		                                    <th>Aksi</th>
		                                </tr>
		                            </thead>
        <tbody>
          <tr>
            <td>1</td>
           <td>Aditya Purnama</td>
            <td>016700</td>
            <td>Admin</td>
            <td>Aditya</td>
            <td><span class="badge badge-warning">Lihat</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection