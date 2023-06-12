@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxxxx" crossorigin="anonymous" />
<div class="col-xl-12 mb-4">
  <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <div class="col-lg-6">
        <h4 class="m-0">Data Transaksi</h4> 
        <nav aria-label="breadcrumb" class="d-flex align-items-start justify-content-start">
          <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                  <a href="dashboard">
                      <i class="fas fa-tachometer-alt"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                  <i class="fas fa-exchange-alt"></i>
                  <span>Transaksi</span>
          </ol>
        </nav>
      </div>
      <div class="col-lg-6 text-right">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-button">
          <button class="btn btn-primary" type="button" id="search-button">Search</button>
        </div>
      </div>
    </div>
    <div class="col-lg-6 text-end mt-3">
      <div class="btn-group mr-2" style="margin-bottom: 10px;">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
          Sort By
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Nama Asc (A - Z)</a></li>
          <li><a class="dropdown-item" href="#">Nama Desc (Z - A)</a></li>
        </ul>
      </div>
      <div class="btn-group" style="margin-bottom: 10px;">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
          Status
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Selesai</a></li>
          <li><a class="dropdown-item" href="#">Belum Selesai</a></li>
          <li><a class="dropdown-item" href="#">Pengerjaan</a></li>
        </ul>
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
              <th>Jumlah</th>
              <th>Bukti</th>
              <th>Tanggal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($datatransaksi as $data)
                                <tr>
                                    <td><a href="#">{{ $no++ }}</a></td>
                                    <td>
                                      @if($data->status == 'Belum Selesai')
                                          <span class="badge badge-belum-selesai font-size-lg">{{$data->status}}</span>
                                      @elseif($data->status == 'Pengerjaan')
                                          <span class="badge badge-pengerjaan font-size-lg">{{$data->status}}</span>
                                      @elseif($data->status == 'Selesai')
                                          <span class="badge badge-selesai font-size-lg">{{$data->status}}</span>
                                      @endif
                                  </td>
                                    <td>{{ $data->User->name }}</td>
                                    
                                    <td class="text-truncate" style="max-width: 250px; overflow: hidden;">
                                      <span class="truncated-address" onclick="showFullAddress(this)">{{ $data->alamat }}</span>
                                    </td>
                                    
                                    <script>
                                    function showFullAddress(element) {
                                      if (element.classList.contains('truncated')) {
                                        element.classList.remove('truncated');
                                      } else {
                                        element.classList.add('truncated');
                                      }
                                    }
                                    </script>

                                    <td><span class="badge badge-success font-size-lg">{{ $data->pembayaran->nama }}</span></td>
                                    <td class="text-truncate">Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>
                                          @if ($data->bukti)
                                              <div class="d-flex justify-content-start">
                                                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalBukti{{ $data->id }}" style="width: 90px;">Lihat Bukti</button>
                                                  <div class="modal fade" id="ModalBukti{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalBuktiLabel{{ $data->id }}" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered modal-lg">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="modalBuktiLabel{{ $data->id }}">Bukti Transaksi</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <img src="{{ asset($data->bukti) }}" alt="Bukti Transaksi" class="img-fluid">
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          @else
                                            <div class="d-flex justify-content-start">
                                              <button type="button" class="btn btn-sm btn-primary"  style="width: 90px;" disabled>Tidak Ada Bukti</button>
                                            </div>
                                          @endif
                                  </td>                                  
                                  <td class="text-truncate">{{ $data->tanggal }}</td>
                                    <td>
                                      <div class="d-flex justify-content-start">
                                          <a href="#" data-toggle="modal" data-target="#ModalEditTransaksi{{ $data->id }}" class="btn btn-sm btn-success mr-2">Edit</a>
                                          <a href="#" data-toggle="modal" data-target="#ModalDeleteTransaksi{{ $data->id }}" class="btn btn-sm btn-danger">Delete</a>
                                      </div>
                                  </td>
                                  
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

                                <!-- Modal -->
                                <div class="modal fade" id="ModalEditTransaksi{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/transaksi-edit/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput2">Status</label>
                                                        <select name="status" class="form-control" aria-label="Default select example">
                                                            <option value="selesai" {{ $data->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                            <option value="pengerjaan" {{ $data->status == 'pengerjaan' ? 'selected' : '' }}>Pengerjaan</option>
                                                            <option value="belum_selesai" {{ $data->status == 'belum_selesai' ? 'selected' : '' }}>Belum Selesai</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput3">Alamat</label>
                                                        <input name="alamat" value="{{ $data->alamat }}" type="text" class="form-control" id="exampleFormControlInput3" placeholder="Alamat">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput4">Jumlah</label>
                                                        <input name="jumlah" value="{{ $data->jumlah }}" type="text" class="form-control" id="exampleFormControlInput4" placeholder="Jumlah">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="ModalDeleteTransaksi{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/transaksi-delete/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Anda Yakin Akan Menghapus Data {{ $data->name }} ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
      color: #ffffff; /* Warna teks menjadi putih */
  }

  .badge-pengerjaan {
      background-color: #ffd700;
      color: #ffffff; /* Warna teks menjadi putih */
  }

  .badge-selesai {
      background-color: #38d138;
      color: #ffffff; /* Warna teks menjadi putih */
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



