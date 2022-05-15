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
    <button class="dt-button add-new btn btn-primary mb-3 mb-md-0"
    tabindex="0" aria-controls="DataTables_Table_0" type="button"
      data-bs-toggle="modal" data-bs-target="#addPermissionModal">
      <span>افزودن نقش جدید</span>
    </button>
</div>
<!-- roles Table -->
<div class="row"> 
    <p id="table-filter" class="col-3">
        <label for="roleGroup">گروه نقش ها:</label>
        <select class="form-select" id="roleGroup">
            <option value="">همه</option>  
            @foreach ($orgKeys as $orgKey)
            <option value="{{$orgKey->id}}">{{ $orgKey->name }}</option>   
            @endforeach
        </select>
      </p>
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
                // dom: 'lr<"table-filter-container">tip',
                initComplete: function(settings){
                    // var api = new $.fn.dataTable.Api( settings );
                    // $('.table-filter-container', api.table().container()).append(
                    //     $('#table-filter').detach().show()
                    // );

                    $('#table-filter select').on('change', function(){
                        table.search(this.value).draw();
                    });

                    // var aq = new $.fn.dataTable.Api( settings );
                    // $('.table-filter-container', aq.table().container()).append(
                    //     $('#table-filterr').detach().show()
                    // );

                    // $('#table-filterr select').on('change', function(){
                    //     table.search(this.value).draw();
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
