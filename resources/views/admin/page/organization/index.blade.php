@extends('admin.layouts.app')
@section('title','مدیریت - سازمان ها')

@section('vendor-css')
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}"> 
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">  
@endsection

@section('content')
<h4 class="breadcrumb-wrapper mb-1"><small class="text-muted fw-light"><a href="">سازمان ها</a>/</small> لیست</h4> 
 
   <!-- Users List Table -->
   <a class="dt-button add-new btn btn-primary my-3 text-white" href="{{ route('admin.organization.create') }}">
      <span>
         <i class="bx bx-plus me-0 me-lg-2"></i>
         <span class="d-none d-lg-inline-block">افزودن سازمان جدید</span>
      </span>
   </a>
   <div class="card">  
      <div class="card-datatable table-responsive">
         <table class=" table-bordered table table-hover border-top dataTable no-footer dtr-column collapsed" id="getOrgs">
            <thead>
               <tr>
                  <th>#</th>
                  <th>نام سازمان</th>
                  <th>ادمین سازمان</th>
                  <th>کد اقتصادی</th> 
                  <th>کاربران</th> 
                  <th>اقدامات</th> 
               </tr>
            </thead>
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
<script type="text/javascript">
   $(document).ready(function(){
       // DataTable
       $('#getOrgs').DataTable({
         "columnDefs": [
        { "orderable": false, "targets": [4,5] }, 
    ],
       "oLanguage": {
           "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
       },
           pageLength: 10,
           processing: true,
           serverSide: true,
           ajax: "{{route('admin.organization.getOrgs')}}",
           columns: [
           { data: 'id' },
           { data: 'title' }, 
           { data: 'manager_id' }, 
           { data: 'national_code' },   
           { data: 'countUsers' },  
           { data: 'actions' },  
           ],
       });
   });
</script> 
@endsection