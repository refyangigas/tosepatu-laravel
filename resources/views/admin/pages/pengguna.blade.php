@extends('layouts.main')

@section('content')
 <!-- Invoice Example -->
<div class="col-xl-12  mb-4">
 <div class="card">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">Table Pengguna</h6>
     <td><a href="#" class="btn btn-sm btn-primary">Tambah</a></td>
   </div>
   <div class="table-responsive">
     <table class="table align-items-center table-flush table-responsive-sm">
       <thead class="thead-light">
         <tr>
           <th>NO</th>
           <th>NAMA</th>
           <th>USERNAME</th>
           <th>ACTIONS</th>
         </tr>
       </thead>
       <tbody>
         <tr>
            <td><a href="#">1</a></td>
            <td>wkwkwk</td>
            <td>wkwiwkwiw</td>
            <td>
              <a href="#" class="btn btn-sm btn-primary">Edit</a>
              <a href="#" class="btn btn-sm btn-primary">Delete</a>
           </td>
         </tr>
         <tr>
            <td><a href="#">2</a></td>
            <td>heheh</td>
            <td>hihihi</td>
            <td>
              <a href="#" class="btn btn-sm btn-primary">Edit</a>
              <a href="#" class="btn btn-sm btn-primary">Delete</a>
           </td>
         </tr>
       </tbody>
     </table>
   </div>
   <div class="card-footer"></div>
 </div>
</div>

@endsection