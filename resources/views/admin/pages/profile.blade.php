@extends('layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">
                 <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
            </ol>
        </div>
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit Password</h1>
                                </div>
                                @foreach ($datauser as $data)
                                <form action="/profile-edit/{{ $data->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="exampleInputFirstName{{ $data->id }}">Nama</label>
                                        <input name="name" type="text" class="form-control" id="exampleInputFirstName{{ $data->id }}" placeholder="Name" value="{{ $data->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail{{ $data->id }}">Email</label>
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail{{ $data->id }}" placeholder="Email" value="{{ $data->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword{{ $data->id }}">Password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword{{ $data->id }}" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ModalEditProfile{{ $data->id }}">Edit</button>
                                    </div>
                                    <hr>
                                </form>
                                @endforeach
                                <hr>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($datauser as $data)
<!-- Modal -->
<div class="modal fade" id="ModalEditProfile{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/profile-edit/{{ $data->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1{{ $data->id }}">Nama</label>
                        <input name="name" type="text" class="form-control" id="exampleFormControlInput1{{ $data->id }}" placeholder="Name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1{{ $data->id }}">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput1{{ $data->id }}" placeholder="Email" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1{{ $data->id }}">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleFormControlInput1{{ $data->id }}" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

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

