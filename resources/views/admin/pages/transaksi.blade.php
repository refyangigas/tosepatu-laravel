@extends('layouts.main')

@section('content')
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
                @foreach ($datatransaksi as $data)
                <tr>
                  <td><a href="#">{{ $no++ }}</a></td>
                  <td><span class="badge badge-success">{{$data->status}}</span></td>
                  <td>{{ $data->User->name}}</td>
                  <td>{{ $data->alamat }}</td>
                  <td><span class="badge badge-success">{{ $data->pembayaran->nama}}</span></td>
                  <td>{{ $data->Pengiriman->harga * $data->jumlah + $data->Penjemputan->harga * $data->jumlah + $data->Layanan->harga * $data->jumlah }}</td>
                  <td>{{$data->jumlah}}</td>
                  <td><a href="#" class="btn btn-sm btn-primary">Bukti</a></td>
                  <td>{{ $data->tanggal }}</td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#ModalEditTransaksi{{ $data->id }}"
                        id="#myBtn" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" data-toggle="modal" data-target="#ModalDeleteTransaksi{{ $data->id }}"
                        id="#myBtn" class="btn btn-sm btn-primary">Delete</a>
                  </td>
                </tr>
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
                        <form action="{{ route('transaksi.update', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">Status</label>
                                    <select name="status" class="form-control" aria-label="Default select example">
                                        @if ($data->status == "Selesai")
                                        <option selected value="Selesai">Selesai</option>
                                        <option value="Pengerjaan">Pengerjaan</option>
                                        <option value="Belum Selesai">Belum Selesai</option>
                                        @elseif ($data->status == "Pengerjaan")
                                        <option selected value="Pengerjaan">Pengerjaan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Belum Selesai">Belum Selesai</option>
                                        @else
                                        <option selected value="Belum Selesai">Belum Selesai</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Pengerjaan">Pengerjaan</option>
                                        @endif
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
                        >
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
                      <form action="/transaksi-delete/{{ $data->id }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                          <p>Anda Yakin Akan Menghapus Data {{ $data->name }} ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">delete</button>
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
@endsection
