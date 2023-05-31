@extends('layouts.main')

@section('content')
 <!-- Service Price Table -->
<div class="col-xl-12  mb-4">
 <div class="card">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">Service Price Table</h6>
     <td><a href="#" class="btn btn-sm btn-primary">Tambah</a></td>
   </div>
   <div class="table-responsive">
     <table class="table align-items-center table-flush table-responsive-sm">
       <thead class="thead-light">
         <tr>
           <th>No</th>
           <th>Nama</th>
           <th>Harga</th>
           <th>Tindakan</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td><a href="#">1</a></td>
           <td>Sepatu Putih</td>
           <td>15.000</td>
           <td>
             <a href="#" class="btn btn-sm btn-primary">Edit</a>
             <a href="#" class="btn btn-sm btn-primary">Delete</a>
          </td>
          
         </tr>
         <tr>
            <td><a href="#">2</a></td>
            <td>Sepatu Biasa</td>
            <td>1.0000</td>
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

 <!-- Service Delivery Table -->
 <div class="col-xl-12  mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Service Delivery Table</h6>
        <td><a href="#" class="btn btn-sm btn-primary">Tambah</a></td>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush table-responsive-sm">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="#">1</a></td>
              <td>Ambil Sendiri</td>
              <td>0</td>
              <td>
                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                <a href="#" class="btn btn-sm btn-primary">Delete</a>
             </td>
             
            </tr>
            <tr>
               <td><a href="#">2</a></td>
               <td>Dikirim</td>
               <td>3000</td>
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

 <!-- Service Delivery Table -->
 <div class="col-xl-12  mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Service Delivery Table</h6>
        <td><a href="#" class="btn btn-sm btn-primary">Tambah</a></td>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush table-responsive-sm">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="#">1</a></td>
              <td>Antar Sendiri</td>
              <td>0</td>
              <td>
                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                <a href="#" class="btn btn-sm btn-primary">Delete</a>
             </td>
             
            </tr>
            <tr>
               <td><a href="#">2</a></td>
               <td>Dijemput</td>
               <td>3000</td>
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