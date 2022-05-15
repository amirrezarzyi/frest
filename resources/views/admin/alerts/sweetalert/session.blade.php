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