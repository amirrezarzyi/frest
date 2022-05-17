<span class="text-nowrap">
    {{-- <a class="btn btn-sm btn-info text-white btn-icon"  title="مشاهده"><i class="bx bx-show"></i></a> --}}
    <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-primary text-white btn-icon" title="ویرایش"><i class="bx bx-edit"></i></a>
    <form action="{{ route('admin.role.destroy',$role->id) }}" method="post" class="d-inline"> 
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-sm btn-danger text-white btn-icon confirm-delete" title="حذف"><i class="bx bx-trash"></i></button>
    </form> 
</span> 

<!-- Vertically Centered Modal -->
{{-- <div class="col-lg-4 col-md-6">
    <div class="mt-3"> 
        <!-- Modal -->
        <div class="modal fade" id="modalCenter{{ $permission->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.permission.set-role',$permission->id) }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title secondary-font" id="modalCenterTitle">ویرایش نقش های کاربر <small
                                class="badge bg-label-warning m-1">{{ $permission->full_name }}</small>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>نام نقش ها</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td>
                                            <div class="form-check form-check-info">
                                                <input class="form-check-input" name="role[]" type="checkbox"
                                                value="{{ $role->id }}"
                                                id="{{ $permission->id . $role->id }}"
                                                @foreach ($permission->roles as $permissionRole)
                                                {{($permissionRole->id === $role->id ? 'checked' : '')}}
                                                @endforeach
                                                >
                                                <label class="form-check-label"
                                                    for="{{ $permission->id . $role->id }}">{{ $role->name }}</label>
                                            </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            بستن
                            </button>
                            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<script> 
    $(function () {
      'use strict'; 
     
      var confirmDelete = $('.confirm-delete');
     
      //--------------- Confirm Options ---------------
      
    
      // Confirm Color
      if (confirmDelete.length) {
        confirmDelete.on('click', function () {
          Swal.fire({
            title: 'آیا از حذف کردن داده مطمن هستید؟',
            text: "شما میتوانید درخواست خود را لغو نمایید",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله داده حذف شود.',
            cancelButtonText: 'خیر درخواست لغو شود.',
            customClass: {
              confirmButton: 'btn btn-primary',
              cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
          }).then((result) => { 
            if (result.value == true) {
                $(this).parent().submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              Swal.fire({
                title: 'لغو درخواست',
                text: "درخواست شما لغو شد",
                icon: 'error', 
                confirmButtonText: 'تایید',
                customClass: {
                  confirmButton: 'btn btn-success', 
                }
              });
            }
          });
        });
      }
    });
</script>
 