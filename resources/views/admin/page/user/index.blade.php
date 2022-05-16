@extends('admin.layouts.app')
@section('title','مدیریت - کاربران')

@section('vendor-css')
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}"> 
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">  
@endsection

@section('content')
<h4 class="breadcrumb-wrapper mb-1"><small class="text-muted fw-light"><a href="">کاربران</a>/</small> لیست</h4> 
   <div class="row g-4 mb-4">
      <div class="col-sm-6 col-xl-3">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                     <span class="secondary-font fw-medium">تمامی کاربران</span>
                     <div class="d-flex align-items-baseline mt-2">
                        <h4 class="mb-0 me-2"><div class="counter" data-target="{{ $countUsers }}">0</div></h4> 
                     </div> 
                  </div>
                  <span class="badge bg-label-primary rounded p-2 mt-3">
                  <i class="bx bx-user bx-sm"></i>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                     <span class="secondary-font fw-medium">کاربران ویژه</span>
                     <div class="d-flex align-items-baseline mt-2">
                        <h4 class="mb-0 me-2"><div class="counter" data-target="457">0</div></h4> 
                     </div> 
                  </div>
                  <span class="badge bg-label-danger rounded p-2 mt-3">
                  <i class="bx bx-user-plus bx-sm"></i>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                     <span class="secondary-font fw-medium">کاربران فعال</span>
                     <div class="d-flex align-items-baseline mt-2">
                        <h4 class="mb-0 me-2"><div class="counter" data-target="209">0</div></h4> 
                     </div> 
                  </div>
                  <span class="badge bg-label-success rounded p-2 mt-3">
                  <i class="bx bx-group bx-sm"></i>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                     <span class="secondary-font fw-medium">کاربران در انتظار</span>
                     <div class="d-flex align-items-baseline mt-2">
                        <h4 class="mb-0 me-2"><div class="counter" data-target="904">0</div></h4> 
                     </div> 
                  </div>
                  <span class="badge bg-label-warning rounded p-2 mt-3">
                  <i class="bx bx-user-voice bx-sm"></i>
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>
    
   <!-- Users List Table -->
   <a class="dt-button add-new btn btn-primary my-3 text-white" href="{{ route('admin.user.create') }}">
      <span>
         <i class="bx bx-plus me-0 me-lg-2"></i>
         <span class="d-none d-lg-inline-block">افزودن کاربر جدید</span>
      </span>
   </a>
   <div class="card">  
      <div class="card-datatable table-responsive">
         <table class=" table-bordered table table-hover border-top dataTable no-footer dtr-column collapsed" id="getUsers">
            <thead> 
               <tr>
               <th>#</th>
               <th>نام کاربری</th>
               <th>نقش</th>
               <th>نام ونام خانوادگی</th> 
               <th>موبایل</th> 
               <th>سازمان</th> 
               <th>اقدامات</th> 
               </tr>
            </thead>
            {{-- <tfoot> 
               <tr>
                  <td>#</td>
                  <td>
                     <input type="text" class="form-control filter-input" placeholder=" ..." data-column="1">
                  </td>
                  <td> 
                     <select name="" id="" class="form-control">
                        <option value=""> ...</option> 
                     </select>
                  </td> 
                  <td> 
                     <input type="text" class="form-control  " placeholder=" ..." >
                  </td>
                  <td> 
                     <input type="text" class="form-control  " placeholder=" ..." >
                  </td>
                  <td>
                      <select name="" id="" class="form-control">
                        <option value=""> ...</option>
                      </select>
                  </td>
                  <td>اقدامات</td>
               </tr>
            </tfoot> --}}
         </table>
      </div> 
   </div>  
@endsection

@section('vendor-js')
    <script src="{{ asset('admin-assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script> 
    <script src="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
@endsection

@section('page-js')
{{-- <script type="text/javascript">
//datatable
$(document).ready(function(){
      // DataTable
      $('#getUsers').DataTable({
         initComplete: function(settings){  

              $('.filter-select').change(function(){
                table.search(this.value).draw();
              });

            $('.filter-input').keyup(function(){
               table.column( $(this).data('column') )
               .search( $(this).val() ) 
               .draw();
            })
         },
         "columnDefs": [
         { "orderable": false, "targets": [6,2] }, 
           ],
         "oLanguage": {
         "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
          },
         pageLength: 10,
         processing: true,
         serverSide: true,
         ajax: "{{route('admin.user.getUsers')}}",
         columns: [
         { data: 'id' },
         { data: 'username' }, 
         { data: 'role' }, 
         { data: 'last_name' },  
         { data: 'mobile' }, 
         { data: 'organization_id' }, 
         { data: 'actions' }, 
           ],
      });
});
</script> --}}
<script type="text/javascript">
   $(document).ready(function (){
         var table = $('#getUsers').DataTable({  
            initComplete: function(settings){   
               $('.filter-input').keyup(function(){  
                  table.column( $(this).data('column'))
                     .search( $(this).val() )
                     .draw();
               }); 
            },
           "columnDefs": [
               { "orderable": false, "targets": [6,2] }, 
           ],
           "oLanguage": {
               "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
           },
           pageLength: 10,
           processing: true,
           serverSide: true,
           ajax: "{{route('admin.user.getUsers')}}",
           columns: [
            { data: 'id' },
            { data: 'username' }, 
            { data: 'role' }, 
            { data: 'last_name' },  
            { data: 'mobile' }, 
            { data: 'organization_id' }, 
            { data: 'actions' }, 
           ],
       }); 
   });
</script>


<script>
   // Selector
   const counters = document.querySelectorAll('.counter');
   // Main function
   for(let n of counters) {
   const updateCount = () => {
       const target = + n.getAttribute('data-target');
       const count = + n.innerText;
       const speed = 185; // change animation speed here
       const inc = target / speed; 
       if(count < target) {
       n.innerText = Math.ceil(count + inc);
       setTimeout(updateCount, 1);
       } else {
       n.innerText = target;
       }
   }
   updateCount();
   }
</script>  
@endsection
