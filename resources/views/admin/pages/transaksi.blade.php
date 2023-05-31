 @extends('layouts.main')

 @section('content')
  <!-- Invoice Example -->
<div class="col-xl-12  mb-4">
  <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
      <a class="m-0 float-right btn btn-danger btn-sm" href="#">Lihat Lebih Banyak <i class="fas fa-chevron-right"></i></a>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush table-responsive-sm">
        <thead class="thead-light">
          <tr>
            <th>ID Pesanan</th>
            <th>Status</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pembayaran</th>
            <th>Total</th>
            <th>Bukti</th>
            <th>Tanggal</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">1</a></td>
            <td><span class="badge badge-success">Terkirim</span></td>
            <td>Udin Wayang</td>
            <td>jember</td>
            <td>Nasi Padang</td>
            <td><span class="badge badge-success">Terkirim</span></td>
            <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
          </tr>
          <tr>
            <td><a href="#">2</a></td>
            <td><span class="badge badge-warning">Pengiriman</span></td>
            <td>Jaenab Bajigur</td>
            <td>jember</td>
            <td>Gundam Edisi 90'</td>
            <td><span class="badge badge-warning">Pengiriman</span></td>
            <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
          </tr>
          <tr>
            <td><a href="#">3</a></td>
            <td><span class="badge badge-danger">Menunggu</span></td>
            <td>Rivat Mahesa</td>
            <td>jember</td>
            <td>Kaos Oblong</td>
            <td><span class="badge badge-danger">Menunggu</span></td>
            <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
          </tr>
          <tr>
            <td><a href="#">4</a></td>
            <td><span class="badge badge-info">Sedang Diproses</span></td>
            <td>Indri Junanda</td>
            <td>jember</td>
            <td>Topi Bundar</td>
            <td><span class="badge badge-info">Sedang Diproses</span></td>
            <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
          </tr>
          <tr>
            <td><a href="#">5</a></td>
            <td><span class="badge badge-success">Terkirim</span></td>
            <td>Udin Cilok</td>
            <td>jember</td>
            <td>Bedak Bayi</td>
            <td><span class="badge badge-success">Terkirim</span></td>
            <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer"></div>
  </div>
</div>

@endsection