@extends('admin.layouts.app')
@section('title','مدیریت - مجوزها')
@section('vendor-css')  
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}">
@endsection
@section('content')
<h4 class="breadcrumb-wrapper">لیست مجوزها</h4>
<div class="dt-buttons my-4 ">
    <a class="dt-button add-new btn btn-primary mb-3 mb-md-0" href="{{ route('admin.permission.create') }}" >
      <span>افزودن مجوز جدید</span>
</a>
</div>
<!-- Permission Table -->
<div class="card">
    <div class="card-datatable table-responsive">
      <table class=" table-bordered table table-hover border-top dataTable no-footer dtr-column collapsed" id="getPermissions">
        <thead>
           <tr>
           <th>#</th> 
           <th>نام مجوز</th> 
           <th>عنوان گروه مجوز</th> 
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
      $('#getPermissions').DataTable({
        "columnDefs": [
       { "orderable": false, "targets": [3] }, 
   ],
      "oLanguage": {
          "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
      },
          pageLength: 10,
          processing: true,
          serverSide: true,
          ajax: "{{route('admin.permission.getPermissions')}}",
          columns: [
          { data: 'id' },
          { data: 'name' },  
          { data: 'parent_id' },  
          { data: 'actions' },  
          ],
      });
  });
</script>
    <script src="{{ asset('admin-assets/js/modal-add-permission.js') }}"></script>
    <script src="{{ asset('admin-assets/js/modal-edit-permission.js') }}"></script> 
@endsection     
