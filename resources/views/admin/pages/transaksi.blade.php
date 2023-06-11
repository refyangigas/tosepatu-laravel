@extends('layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
            </ol>
        </div>
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
                                            <li><a class="dropdown-item" href="#">Belum Selesai</a></li>
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
                                    <td><span class="badge badge-success">{{$data->status}}</span></td>
                                    <td>{{ $data->User->name }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td><span class="badge badge-success">{{ $data->pembayaran->nama }}</span></td>
                                    <td class="text-truncate">Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>
                                      @if ($data->status == 'Belum Selesai')
                                          <span class="text-danger">{{ $data->status }}</span>
                                      @else
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
                                              <button type="button" class="btn btn-sm btn-primary" disabled>Tidak Ada Bukti</button>
                                          @endif
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
                                                <img src="{{ asset( $data->bukti) }}" class="img-fluid" alt="Bukti Transaksi">
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
@endsection



