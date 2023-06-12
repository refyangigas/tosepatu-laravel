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
      </li>
    </ol>
  </nav>
</div>
<div class="container-fluid">
  <div class="card">
  <div class="table-responsive p-3">
  <h4 class="m-0">Filter Laporan</h4>
  <br>
  <form action="{{ route('laporan') }}" method="GET">
  <div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="tanggal">Tanggal</label>
      <input class="form-control" type="date" name="tanggal" id="tanggal" value="{{ request()->input('tanggal') }}">
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="status" id="status">
        <option value="">Semua</option>
        <option value="Belum Selesai" {{ request()->input('status') === 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
        <option value="Pengerjaan" {{ request()->input('status') === 'Pengerjaan' ? 'selected' : '' }}>Pengerjaan</option>
        <option value="Selesai" {{ request()->input('status') === 'Selesai' ? 'selected' : '' }}>Selesai</option>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <button type="submit" class="btn btn-primary mt-4 float-right">Tampilkan</button>
    </div>
  </div>
</div>
  </form>
</div>
    <div class="table-responsive p-3">
      <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th>NO</th>
            <th>Status</th>
            <th>Nama</th>
            <th>Layanan</th>
            <th>Jumlah</th>
            <th>Pembayaran</th>
            <th>Total</th>
            <th>tanggal</th>
          </tr>
        </thead>
        <tbody>
          @php
          $no = 1;
          @endphp
          @foreach($datatransaksi as $data)
          <tr>
            <td>{{$no++}}</td>
            <td>
              @if($data->status == 'Belum Selesai')
              <span class="badge badge-belum-selesai font-size-lg">{{$data->status}}</span>
              @elseif($data->status == 'Pengerjaan')
              <span class="badge badge-pengerjaan font-size-lg">{{$data->status}}</span>
              @elseif($data->status == 'Selesai')
              <span class="badge badge-selesai font-size-lg">{{$data->status}}</span>
              @endif
            </td>
            <td>{{$data->User->name}}</td>
            <td>{{$data->Layanan->name}}</td>
            <td>{{$data->jumlah}}</td>
            <td><span class="badge badge-success font-size-lg">{{ $data->pembayaran->nama}}</span></td>
            <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
            <td>{{$data->tanggal }}</td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="ModalBukti{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Bukti Transaksi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img src="{{ asset('uploads/' . $data->bukti) }}" class="img-fluid" alt="Bukti Transaksi">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('sweetalert')

@if (Session::get('update'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil Diupdate',
  })
</script>
@endif
@if (Session::get('add'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil Ditambah',
  })
</script>
@endif
@if (Session::get('delete'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil Dihapus',
  })
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    $('.btn-lihat-bukti').on('click', function() {
      var imageUrl = $(this).data('image-url');

      Swal.fire({
        title: 'Bukti Transaksi',
        imageUrl: imageUrl,
        imageAlt: 'Bukti Transaksi',
        showCloseButton: true,
        customClass: {
          popup: 'my-custom-modal',
          title: 'my-custom-modal-title',
          image: 'my-custom-modal-image'
        }
      });
    });
  });
</script>

<style>
  .badge-belum-selesai {
    background-color: #808080;
    color: #ffffff;
    /* Warna teks menjadi putih */
  }

  .badge-pengerjaan {
    background-color: #ffd700;
    color: #ffffff;
    /* Warna teks menjadi putih */
  }

  .badge-selesai {
    background-color: #38d138;
    color: #ffffff;
    /* Warna teks menjadi putih */
  }
</style>

<style>
  .truncated-address {
    display: inline-block;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .truncated-address.truncated {
    white-space: normal;
  }
</style>
<style>
  .breadcrumb {
    margin-left: 0;
  }
</style>
@endsection
