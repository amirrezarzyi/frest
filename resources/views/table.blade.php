@extends('admin.layouts.app')
@section('title','مدیریت - کاربران')

@section('vendor-css')
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}"> 
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">  
@endsection

@section('content')
<h4 class="breadcrumb-wrapper mb-1"><small class="text-muted fw-light"><a href="">کاربران</a>/</small> لیست</h4> 
 
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title">فیلتر جستجو</h5>
      <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
        <div class="col-md-4 user_role"></div>
        <div class="col-md-4 user_plan"></div>
        <div class="col-md-4 user_status"></div>
      </div>
    </div>
    <div class="card-datatable table-responsive">
      <table class="datatables-users table border-top">
        <thead>
          <tr>
            <th></th>
            <th>کاربر</th>
            <th>نقش</th>
            <th>طرح</th>
            <th>صورتحساب</th>
            <th>وضعیت</th>
            <th>عمل‌ها</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- Offcanvas to add new user -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
      <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddUserLabel" class="offcanvas-title">افزودن کاربر</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
          <div class="mb-3">
            <label class="form-label" for="add-user-fullname">نام کامل</label>
            <input type="text" class="form-control" id="add-user-fullname" placeholder="جان اسنو" name="userFullname" aria-label="John Doe">
          </div>
          <div class="mb-3">
            <label class="form-label" for="add-user-email">ایمیل</label>
            <input type="text" id="add-user-email" class="form-control text-start"  placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail">
          </div>
          <div class="mb-3">
            <label class="form-label" for="add-user-contact">تماس</label>
            <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact">
          </div>
          <div class="mb-3">
            <label class="form-label" for="add-user-company">شرکت</label>
            <input type="text" id="add-user-company" class="form-control" placeholder="توسعه دهنده وب" aria-label="jdoe1" name="companyName">
          </div>
          <div class="mb-3">
            <label class="form-label" for="country">کشور</label>
            <select id="country" class="select2 form-select">
              <option value="">انتخاب</option>
              <option value="Australia">استرالیا</option>
              <option value="Bangladesh">بنگلادش</option>
              <option value="Belarus">بلاروس</option>
              <option value="Brazil">برزیل</option>
              <option value="Canada">کانادا</option>
              <option value="China">چین</option>
              <option value="France">فرانسه</option>
              <option value="Germany">آلمان</option>
              <option value="India">هندوستان</option>
              <option value="Indonesia">اندونزی</option>
              <option value="Iran">ایران</option>
              <option value="Italy">ایتالیا</option>
              <option value="Japan">ژاپن</option>
              <option value="Korea">کره جنوبی</option>
              <option value="Mexico">مکزیک</option>
              <option value="Philippines">فیلیپین</option>
              <option value="Russia">روسیه</option>
              <option value="South Africa">آفریقای جنوبی</option>
              <option value="Thailand">تایلند</option>
              <option value="Turkey">ترکیه</option>
              <option value="Ukraine">اوکراین</option>
              <option value="United Arab Emirates">امارات</option>
              <option value="United Kingdom">انگلستان</option>
              <option value="United States">ایالات متحده</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="user-role">نقش کاربر</label>
            <select id="user-role" class="form-select">
              <option value="subscriber">مشترک</option>
              <option value="editor">ویرایشگر</option>
              <option value="maintainer">نگهدارنده</option>
              <option value="author">نویسنده</option>
              <option value="admin">مدیر</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="form-label" for="user-plan">انتخاب پلن</label>
            <select id="user-plan" class="form-select">
              <option value="basic">پایه</option>
              <option value="enterprise">سازمان</option>
              <option value="company">شرکت</option>
              <option value="team">تیم</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ثبت</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">انصراف</button>
        </form>
      </div>
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
 
<script>
    /**
 * Page User List
 */

'use strict';

// Datatable (jquery)
$(function () {

  // Variable declaration for table
  var dt_user_table = $('.datatables-users'),
    select2 = $('.select2'),
    userView = 'app-user-view-account.html',
    statusObj = {
      1: { title: 'Ø¯Ø± Ø§Ù†ØªØ¸Ø§Ø±', class: 'bg-label-warning' },
      2: { title: 'ÙØ¹Ø§Ù„', class: 'bg-label-success' },
      3: { title: 'ØºÛŒØ±ÙØ¹Ø§Ù„', class: 'bg-label-secondary' }
    };

  if (select2.length) {
    var $this = select2;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Ø§Ù†ØªØ®Ø§Ø¨ Ú©Ø´ÙˆØ±',
      dropdownParent: $this.parent()
    });
  }

  // Users datatable
  if (dt_user_table.length) {
    var dt_user = dt_user_table.DataTable({
      ajax: assetsPath + 'json/user-list.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'full_name' },
        { data: 'role' },
        { data: 'current_plan' },
        { data: 'billing' },
        { data: 'status' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          searchable: false,
          orderable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // User full name and email
          targets: 1,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $name = full['full_name'],
              $email = full['email'],
              $image = full['avatar'];
            if ($image) {
              // For Avatar image
              var $output =
                '<img src="' + assetsPath + '/img/avatars/' + $image + '" alt="Avatar" class="rounded-circle">';
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['full_name'],
                $initials = $name.split(' ').map(word => word[0]).join('â€Œ') || '';
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
            }
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center user-name">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar avatar-sm me-3">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<a href="' +
              userView +
              '" class="text-body text-truncate"><span class="fw-semibold">' +
              $name +
              '</span></a>' +
              '<small class="text-muted">' +
              $email +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          // User Role
          targets: 2,
          render: function (data, type, full, meta) {
            var $role = full['role'];
            var roleBadgeObj = {
              'Ù…Ø´ØªØ±Ú©':
                '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span>',
              'Ù†ÙˆÛŒØ³Ù†Ø¯Ù‡':
                '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="bx bx-cog bx-xs"></i></span>',
              'Ù†Ú¯Ù‡Ø¯Ø§Ø±Ù†Ø¯Ù‡':
                '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span>',
              'ÙˆÛŒØ±Ø§ÛŒØ´Ú¯Ø±':
                '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i class="bx bx-edit bx-xs"></i></span>',
              'Ù…Ø¯ÛŒØ±':
                '<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span>'
            };
            return "<span class='text-truncate d-flex align-items-center'>" + roleBadgeObj[$role] + $role + '</span>';
          }
        },
        {
          // Plans
          targets: 3,
          render: function (data, type, full, meta) {
            var $plan = full['current_plan'];

            return '<span class="fw-semibold">' + $plan + '</span>';
          }
        },
        {
          // User Status
          targets: 5,
          render: function (data, type, full, meta) {
            var $status = full['status'];

            return '<span class="badge ' + statusObj[$status].class + '">' + statusObj[$status].title + '</span>';
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Ø¹Ù…Ù„â€ŒÙ‡Ø§',
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-inline-block text-nowrap">' +
              '<button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button>' +
              '<button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button>' +
              '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>' +
              '<div class="dropdown-menu dropdown-menu-end m-0">' +
              '<a href="' +
              userView +
              '" class="dropdown-item">Ù…Ø´Ø§Ù‡Ø¯Ù‡</a>' +
              '<a href="javascript:;" class="dropdown-item">ØªØ¹Ù„ÛŒÙ‚</a>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[1, 'asc']],
      dom:
        '<"row mx-2"' +
        '<"col-md-2"<"me-3"l>>' +
        '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: '_MENU_',
        search: ''
      },
      // Buttons with Dropdown
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-secondary dropdown-toggle mx-3',
          text: '<i class="bx bx-upload me-2"></i>Ø¨Ø±ÙˆÙ†â€ŒØ¨Ø±ÛŒ',
          buttons: [
            {
              extend: 'print',
              text: '<i class="bx bx-printer me-2" ></i>Ú†Ø§Ù¾',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be print
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              },
              customize: function (win) {
                //customize print view for dark
                $(win.document.body)
                  .css('color', config.colors.headingColor)
                  .css('border-color', config.colors.borderColor)
                  .css('background-color', config.colors.body);
                $(win.document.body)
                  .find('table')
                  .addClass('compact')
                  .css('color', 'inherit')
                  .css('border-color', 'inherit')
                  .css('background-color', 'inherit');
              }
            },
            {
              extend: 'csv',
              text: '<i class="bx bx-file me-2" ></i>CSV',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'excel',
              text: 'Excel',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'pdf',
              text: '<i class="bx bxs-file-pdf me-2"></i>PDF',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'copy',
              text: '<i class="bx bx-copy me-2" ></i>Ú©Ù¾ÛŒ',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }
          ]
        },
        {
          text: '<i class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Ø§ÙØ²ÙˆØ¯Ù† Ú©Ø§Ø±Ø¨Ø± Ø¬Ø¯ÛŒØ¯</span>',
          className: 'add-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'offcanvas',
            'data-bs-target': '#offcanvasAddUser'
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Ø¬Ø²Ø¦ÛŒØ§Øª ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(2)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize"><option value=""> Ø§Ù†ØªØ®Ø§Ø¨ Ù†Ù‚Ø´ </option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
        // Adding plan filter once table initialized
        this.api()
          .columns(3)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserPlan" class="form-select text-capitalize"><option value=""> Ø§Ù†ØªØ®Ø§Ø¨ Ù¾Ù„Ù† </option></select>'
            )
              .appendTo('.user_plan')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
        // Adding status filter once table initialized
        this.api()
          .columns(5)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Ø§Ù†ØªØ®Ø§Ø¨ ÙˆØ¶Ø¹ÛŒØª </option></select>'
            )
              .appendTo('.user_status')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append(
                  '<option value="' +
                    statusObj[d].title +
                    '" class="text-capitalize">' +
                    statusObj[d].title +
                    '</option>'
                );
              });
          });
      }
    });
  }

  // Delete Record
  $('.datatables-users tbody').on('click', '.delete-record', function () {
    dt_user.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});

// Validation & Phone mask
(function () {
  const phoneMaskList = document.querySelectorAll('.phone-mask'),
    addNewUserForm = document.getElementById('addNewUserForm');

  // Phone Number
  if (phoneMaskList) {
    phoneMaskList.forEach(function (phoneMask) {
      new Cleave(phoneMask, {
        phone: true,
        phoneRegionCode: 'US'
      });
    });
  }
  // Add New User Form Validation
  const fv = FormValidation.formValidation(addNewUserForm, {
    fields: {
      userFullname: {
        validators: {
          notEmpty: {
            message: 'Ù„Ø·ÙØ§ Ù†Ø§Ù… Ú©Ø§Ù…Ù„ Ø±Ø§ ÙˆØ§Ø±Ø¯ Ú©Ù†ÛŒØ¯'
          }
        }
      },
      userEmail: {
        validators: {
          notEmpty: {
            message: 'Ù„Ø·ÙØ§ Ø§ÛŒÙ…ÛŒÙ„ Ø±Ø§ ÙˆØ§Ø±Ø¯ Ú©Ù†ÛŒØ¯'
          },
          emailAddress: {
            message: 'Ù…Ù‚Ø¯Ø§Ø± ÙˆØ§Ø±Ø¯ Ø´Ø¯Ù‡ ÛŒÚ© Ø¢Ø¯Ø±Ø³ Ø§ÛŒÙ…ÛŒÙ„ Ù…Ø¹ØªØ¨Ø± Ù†ÛŒØ³Øª'
          }
        }
      }
    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        // Use this for enabling/changing valid/invalid class
        eleValidClass: '',
        rowSelector: function (field, ele) {
          // field is the field name & ele is the field element
          return '.mb-3';
        }
      }),
      submitButton: new FormValidation.plugins.SubmitButton(),
      // Submit the form when all fields are valid
      // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
      autoFocus: new FormValidation.plugins.AutoFocus()
    }
  });
})();
</script>
@endsection    
