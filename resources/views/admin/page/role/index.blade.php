@extends('admin.layouts.app')
@section('title','مدیریت - نقش ها')
@section('vendor-css')  
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}">
@endsection
@section('content')
<h4 class="breadcrumb-wrapper">لیست نقش ها</h4>
<div class="dt-buttons my-4 ">
    <a class="dt-button add-new btn btn-primary mb-3 mb-md-0" href="{{ route('admin.role.create') }}">
      <span>افزودن نقش جدید</span>
</a>
</div>
<!-- roles Table -->
<div class="row mb-2">   
  <div class="col-4">
      <select class="form-control filter-select col-6" data-column="3">
          <option value="">گروه را انتخاب کنید ....</option>  
          @foreach ($groups as $group)
          <option value="{{$group->id}}">{{ $group->name }}</option>   
          @endforeach
      </select> 
  </div>
</div>
<div class="card p-2">
    <div class="card-datatable table-responsive">
      <table class=" table-bordered table table-hover border-top dataTable no-footer dtr-column collapsed" id="getRoles">
        <thead>
           <tr>
           <th>#</th> 
           <th>نام نقش</th>  
           <th>نام گروه نقش</th>  
           <th>اقدامات</th>  
           </tr>
        </thead>
     </table>
    </div>
  </div>
  <!--/ roles Table -->

  

@endsection
@section('vendor-js')
    <script src="{{ asset('admin-assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script> 
    <script src="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
@endsection
@section('page-js')
<script type="text/javascript">
  $(document).ready(function (){
        var table = $('#getRoles').DataTable({ 
            initComplete: function(settings){  

              $('.filter-select').change(function(){
                table.search(this.value).draw();
              });

              // $('.filter-select').change(function(){
              //     table.column( $(this).data('column') )
              //     .search( $(this).val() ) 
              //     .draw();
              // });
            },

          "columnDefs": [
              { "orderable": false, "targets": [3] }, 
          ],
          "oLanguage": {
              "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
          },
          pageLength: 10,
          processing: true,
          serverSide: true,
          ajax: "{{route('admin.role.getRoles')}}",
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
