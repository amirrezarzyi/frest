<span class="text-nowrap">
    <a class="btn btn-sm btn-info text-white btn-icon"  title="مشاهده"><i class="bx bx-show"></i></a>
    <a href="{{ route('admin.organization.edit',$org->id) }}" class="btn btn-sm btn-primary text-white btn-icon" title="ویرایش"><i class="bx bx-edit"></i></a> 
    <form action="{{ route('admin.organization.destroy',$org->id) }}" method="post" class="d-inline">
      @csrf
      @method('DELETE')
            <button type="button" class="btn btn-sm btn-danger text-white btn-icon confirm-delete" title="حذف"><i class="bx bx-trash"></i></button>
    </form>
</span>  

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
 