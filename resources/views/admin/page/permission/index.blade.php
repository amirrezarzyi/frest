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
    <button class="dt-button add-new btn btn-primary mb-3 mb-md-0"
    tabindex="0" aria-controls="DataTables_Table_0" type="button"
      data-bs-toggle="modal" data-bs-target="#addPermissionModal">
      <span>افزودن مجوز جدید</span>
    </button>
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
  <!--/ Permission Table -->

  <!-- Modal -->
  <!-- Add Permission Modal -->
  {{-- <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <div class="text-center mb-4">
            <h3 class="secondary-font">افزودن مجوز جدید</h3>
            <p>مجوزهایی که می‌توانید استفاده کنید و به کاربران خود اختصاص دهید.</p>
          </div>
          <form id="addPermissionForm" class="row" onsubmit="return false">
            <div class="col-12 mb-3">
              <label class="form-label" for="modalPermissionName">نام مجوز</label>
              <input type="text" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="نام مجوز" autofocus>
            </div>
            <div class="col-12 mb-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="corePermission">
                <label class="form-check-label" for="corePermission"> تنظیم به عنوان مجوز اصلی </label>
              </div>
            </div>
            <div class="col-12 text-center demo-vertical-spacing">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">ایجاد مجوز</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                انصراف
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
  <!--/ Add Permission Modal -->

  <!-- Edit Permission Modal -->
  {{-- <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body">
          <div class="text-center mb-4">
            <h3 class="secondary-font">ویرایش مجوز</h3>
            <p>مجوز را بر اساس نیاز خود ویرایش کنید.</p>
          </div>
          <div class="alert alert-warning" role="alert">
            <h6 class="alert-heading mb-2">هشدار</h6>
            <p class="mb-0">
              با ویرایش نام مجوز، امکان به هم خوردن عملکرد مجوزهای سیستم وجود دارد. لطفا قبل از اقدام از عمل خود مطمئن باشید.
            </p>
          </div>
          <form id="editPermissionForm" class="row" onsubmit="return false">
            <div class="col-sm-9">
              <label class="form-label" for="editPermissionName">نام مجوز</label>
              <input type="text" id="editPermissionName" name="editPermissionName" class="form-control" placeholder="نام مجوز" tabindex="-1">
            </div>
            <div class="col-sm-3 mb-3">
              <label class="form-label invisible d-none d-sm-inline-block">دکمه</label>
              <button type="submit" class="btn btn-primary mt-1 mt-sm-0">به‌روزرسانی</button>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="editCorePermission">
                <label class="form-check-label" for="editCorePermission"> تنظیم به عنوان مجوز اصلی </label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
  <!--/ Edit Permission Modal -->

  <!-- /Modal -->

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
      //   "columnDefs": [
      //  { "orderable": false, "targets": [1] }, 
  //  ],
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
