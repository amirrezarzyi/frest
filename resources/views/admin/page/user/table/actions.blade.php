<span class="text-nowrap">
    <a class="btn btn-sm btn-info text-white btn-icon"  title="مشاهده"><i class="bx bx-show"></i></a>
    <a href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-sm btn-primary text-white btn-icon" title="ویرایش"><i class="bx bx-edit"></i></a>
    <button type="button" class="btn btn-sm btn-warning text-white btn-icon" data-bs-toggle="modal"  title="ویرایش سطوح دسترسی"
       data-bs-target="#modalCenter{{ $user->id }}">
      <i class="bx bx-shield-quarter"></i>
    </button>
    <form action="{{ route('admin.user.destroy',$user->id) }}" method="post" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-sm btn-danger text-white btn-icon confirm-delete" title="حذف"><i class="bx bx-trash"></i></button>
    </form>
</span> 

<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
    <div class="mt-3"> 
        <!-- Modal -->
        <div class="modal fade" id="modalCenter{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.user.set-role',$user->id) }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title secondary-font" id="modalCenterTitle">ویرایش نقش های کاربر <small
                                class="badge bg-label-warning m-1">{{ $user->full_name }}</small>
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
                                        @foreach ($userRole->childrens as $role)
                                            <tr>
                                            <td>
                                            <div class="form-check form-check-info">
                                                <input class="form-check-input" name="role[]" type="checkbox"
                                                value="{{ $role->id }}"
                                                id="{{ $user->id . $role->id }}"
                                                @foreach ($user->roles as $userRole)
                                                {{($userRole->id === $role->id ? 'checked' : '')}}
                                                @endforeach
                                                >
                                                <label class="form-check-label" for="{{ $user->id . $role->id }}">{{ $role->title }}</label>
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
</div>

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
 