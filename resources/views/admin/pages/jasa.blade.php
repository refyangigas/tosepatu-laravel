@extends('layouts.main')

@section('content')
<!-- Service Price Table -->
<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Data Layanan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Layanan</li>
            </ol>
        </div>
<div class="col-xl-12 mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Service Price Table</h6>
        <td><a href="#"  data-toggle="modal" data-target="#ModalAddPelayanan"
            id="#myBtn" class="btn btn-sm btn-primary">Tambah</a></td>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> </span>
          </button>
          @php
          $nomer = 1;
          @endphp
          @foreach ($errors->all() as $error)
            <li>{{ $nomer++ }}. {{ $error }}</li>
          @endforeach
        </div>
      @endif

      <div class="table-responsive">
        <table class="table align-items-center table-flush table-responsive-sm">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
     @foreach ($datalayanan as $data )
         <tr>
            <td><a href="#">{{ $no++ }}</a></td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->harga }}</td>
            <td>
              <a href="#" data-toggle="modal" data-target="#ModalEditPelayanan{{ $data->id }}"
              id="#myBtn" class="btn btn-sm btn-primary">Edit</a>
              <a href="#" data-toggle="modal" data-target="#ModalDeletePelayanan{{ $data->id }}"
              id="#myBtn" class="btn btn-sm btn-primary">Delete</a>
           </td>
         </tr>
           <!-- Modal -->
           <div class="modal fade" id="ModalEditPelayanan{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form action="/jasa-edit-layanan/{{ $data->id }}" method="post">
                @csrf
                @method('PUT')
               <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input name="name" value="{{ $data->name }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input name="harga" value="{{ $data->harga }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
           <div class="modal fade" id="ModalDeletePelayanan{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Modal Delete</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form action="/jasa-delete-pelayanan/{{ $data->id }}" method="post">
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
       <!-- Modal -->
       <div class="modal fade" id="ModalAddPelayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal Add</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/layanan-add" method="post">
                @csrf
                @method('POST')
               <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input name="harga" type="harga" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
   <div class="card-footer"></div>
 </div>
</div>
  <!-- Service Delivery Table -->
 <div class="col-xl-12  mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Service Delivery Table</h6>
        <td><a href="#"  data-toggle="modal" data-target="#ModalAddPenjemputan"
            id="#myBtn" class="btn btn-sm btn-primary">Tambah</a></td>
      </div>
      {{-- @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                  aria-hidden="true"> </span>
          </button>


          <?php

          $nomer = 1;

          ?>

          @foreach ($errors->all() as $error)
              <li>{{ $nomer++ }}. {{ $error }}</li>
          @endforeach
            </div>
   @endif --}}
   <div class="table-responsive">
     <table class="table align-items-center table-flush table-responsive-sm">
       <thead class="thead-light">
         <tr>
           <th>No</th>
           <th>Nama</th>
           <th>Harga</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
          @php
            $no = 1;
        @endphp
       @foreach ($datapenjemputan as $data )
         <tr>
            <td><a href="#">{{ $no++ }}</a></td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->harga }}</td>
            <td>
              <a href="#" data-toggle="modal" data-target="#ModalEditPenjemputan{{ $data->id }}"
                id="#myBtn" class="btn btn-sm btn-primary">Edit</a>
              <a href="#" data-toggle="modal" data-target="#ModalDeletePenjemputan{{ $data->id }}"
                id="#myBtn" class="btn btn-sm btn-primary">Delete</a>
           </td>
         </tr>
           <!-- Modal -->
           <div class="modal fade" id="ModalEditPenjemputan{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form action="/jasa-edit-penjemputan/{{ $data->id }}" method="post">
                @csrf
                @method('PUT')
               <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input name="name" value="{{ $data->name }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input name="harga" value="{{ $data->harga }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
           <div class="modal fade" id="ModalDeletePenjemputan{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal Delete</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/jasa-delete-penjemputan/{{ $data->id }}" method="post">
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
       <!-- Modal -->
       <div class="modal fade" id="ModalAddPenjemputan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal Add</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/penjemputan-add" method="post">
                @csrf
                @method('POST')
               <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input name="harga" type="harga" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
   <div class="card-footer"></div>
 </div>
</div>

 <!-- Service Delivery Table -->
 <div class="col-xl-12  mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Service Delivery Table</h6>
        <td><a href="#"  data-toggle="modal" data-target="#ModalAddPengiriman"
            id="#myBtn" class="btn btn-sm btn-primary">Tambah</a></td>
      </div>
      {{-- @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                  aria-hidden="true"> </span>
          </button>


          <?php

          $nomer = 1;

          ?>

          @foreach ($errors->all() as $error)
              <li>{{ $nomer++ }}. {{ $error }}</li>
          @endforeach
            </div>
   @endif --}}
   <div class="table-responsive">
    <table class="table align-items-center table-flush table-responsive-sm">
      <thead class="thead-light">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         @php
           $no = 1;
       @endphp
        @foreach ($datapengiriman as $data )
         <tr>
            <td><a href="#">{{ $no++ }}</a></td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->harga }}</td>
            <td>
              <a href="#" data-toggle="modal" data-target="#ModalEditPengiriman{{ $data->id }}"
              id="#myBtn" class="btn btn-sm btn-primary">Edit</a>
              <a href="#" data-toggle="modal" data-target="#ModalDeletePengiriman{{ $data->id }}"
              id="#myBtn" class="btn btn-sm btn-primary">Delete</a>
           </td>
         </tr>
           <!-- Modal -->
           <div class="modal fade" id="ModalEditPengiriman{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form action="/jasa-edit-pengiriman/{{ $data->id }}" method="post">
                @csrf
                @method('PUT')
               <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input name="name" value="{{ $data->name }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input name="harga" value="{{ $data->harga }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
           <div class="modal fade" id="ModalDeletePengiriman{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Modal Delete</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form action="/jasa-delete-pengiriman/{{ $data->id }}" method="post">
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
       <!-- Modal -->
       <div class="modal fade" id="ModalAddPengiriman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal Add</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/pengiriman-add" method="post">
                @csrf
                @method('POST')
               <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input name="harga" type="harga" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
   <div class="card-footer"></div>
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


