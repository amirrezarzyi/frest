@extends('admin.layouts.app')
@section('title', 'مدیریت - ایجاد کاربر')
 
@section('vendor-css') 
    <!-- form-->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/bs-stepper/bs-stepper.css') }}">

    <!-- select2-->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/select2/select2.css') }}">
    
@endsection

@section('content')
<h4 class="breadcrumb-wrapper mb-1"><small class="text-muted fw-light"><a href="">کاربران</a>/</small> ایجاد کاربر</h4>
<!-- Default Wizard -->
<div class="col-12">
   <div class="bs-stepper wizard-numbered mt-2">
      <div class="bs-stepper-header">
         <div class="step" data-target="#account-details">
            <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label">
            <span class="bs-stepper-title">جزئیات حساب</span>
            <span class="bs-stepper-subtitle">تنظیم جزئیات حساب</span>
            </span>
            </button>
         </div>
         <div class="line"></div>
         <div class="step" data-target="#personal-info">
            <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label">
            <span class="bs-stepper-title">اطلاعات شخصی</span>
            <span class="bs-stepper-subtitle">افزودن اطلاعات شخصی</span>
            </span>
            </button>
         </div>
         <div class="line"></div>
         <div class="step" data-target="#organization-info">
            <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label">
            <span class="bs-stepper-title">سازمان ها</span>
            <span class="bs-stepper-subtitle">افزودن سازمان ها</span>
            </span>
            </button>
         </div>
         <div class="line"></div>
         <div class="step" data-target="#role-info">
            <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">4</span>
            <span class="bs-stepper-label">
            <span class="bs-stepper-title">نقش ها</span>
            <span class="bs-stepper-subtitle">افزودن نقش ها</span>
            </span>
            </button>
         </div>
      </div>
      <div class="bs-stepper-content">
         <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Account Details -->
            <div id="account-details" class="content">
               <div class="content-header mb-3">
                  <h6 class="mb-1">جزئیات حساب</h6>
               </div>
               <div class="d-flex align-items-start align-items-sm-center gap-4 mb-3">
                  <img src="https://www.psi.org.kh/wp-content/uploads/2019/01/profile-icon-300x300.png"  alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                  <div class="button-wrapper">
                     <label for="upload" class="btn btn-sm btn-primary me-2 mb-4" tabindex="0">
                     <span class="d-none d-sm-block">بارگذاری تصویر</span>
                     <i class="bx bx-upload d-block d-sm-none"></i>
                     <input type="file" name="avatar" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg">
                     </label>
                     <button type="button" class="btn btn-sm btn-label-secondary account-image-reset mb-4">
                     <i class="bx bx-reset d-block d-sm-none"></i>
                     <span class="d-none d-sm-block">بازنشانی</span>
                     </button> 
                  </div>
               </div>
               <div class="mb-1">
                  @error('avatar')
                  <span class="text-danger"> * {{ $message }}</span>
                  @enderror
               </div>
               <div class="row g-3">
                  <div class="col-sm-6">
                     <label class="form-label" for="username">نام کاربری</label>
                     <input type="text" id="username" name="username" class="form-control text-start" dir="ltr" placeholder="061234567(کدملی)" value="{{ old('username') }}">
                     <div class="mt-1">
                        @error('username')
                        <span class="text-danger"> * {{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <label class="form-label" for="email">ایمیل</label>
                     <input type="text" name="email" id="email" class="form-control text-start" dir="ltr" placeholder="aliamiri@email.com" value="{{ old('email') }}">
                     <div class="mt-1">
                        @error('email')
                        <span class="text-danger"> * {{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6 form-password-toggle">
                     <label class="form-label" for="password">رمز عبور</label>
                     <div class="input-group input-group-merge">
                        <input type="password" name="password" id="password" class="form-control text-start" dir="ltr" placeholder="············">
                        <span class="input-group-text cursor-pointer" id="password2"><i class="bx bx-hide"></i></span>
                     </div>
                     <div class="mt-1">
                        @error('password')
                        <span class="text-danger"> * {{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6 form-password-toggle">
                     <label class="form-label" for="confirm-password">تایید رمز عبور</label>
                     <div class="input-group input-group-merge">
                        <input type="password" name="password_confirmation" id="confirm-password" class="form-control text-start" dir="ltr" placeholder="············">
                        <span class="input-group-text cursor-pointer" id="confirm-password2"><i class="bx bx-hide"></i></span>
                     </div>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <button type="button" class="btn btn-label-secondary btn-prev" disabled>
                     <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                     <span class="d-sm-inline-block d-none">قبلی</span>
                     </button>
                     <button type="button" class="btn btn-primary btn-next">
                     <span class="d-sm-inline-block d-none">بعدی</span>
                     <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                     </button>
                  </div>
               </div>
            </div>
            <!-- Personal Info -->
            <div id="personal-info" class="content">
               <div class="content-header mb-3">
                  <h6 class="mb-1">اطلاعات شخصی</h6>
               </div>
               <div class="row g-3">
                  <div class="col-sm-6">
                     <label class="form-label" for="first-name">نام</label>
                     <input type="text" id="first-name" name="first_name" class="form-control" placeholder="علی" value="{{ old('first_name') }}">
                     <div class="mt-1">
                        @error('first_name')
                        <span class="text-danger"> * {{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <label class="form-label" for="last-name">نام خانوادگی</label>
                     <input type="text" id="last-name" name="last_name" class="form-control" placeholder="امیری" value="{{ old('last_name') }}">
                     <div class="mt-1">
                        @error('last_name')
                        <span class="text-danger"> * {{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <label class="form-label" for="first-name">موبایل</label>
                     <input type="text" id="first-name" name="mobile" class="form-control" placeholder="09123456789" value="{{ old('mobile') }}">
                     <div class="mt-1">
                        @error('mobile')
                        <span class="text-danger"> * {{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <label class="form-label" for="last-name">آدرس</label>
                     <input type="text" id="last-name" name="address" class="form-control" placeholder="خراسان جنوبی - بیرجند - مدرس 11و13" value="{{ old('address') }}">
                     <div class="mt-1">
                        @error('address')
                        <span class="text-danger"> * {{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <button type="button" class="btn btn-primary btn-prev">
                     <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                     <span class="d-sm-inline-block d-none">قبلی</span>
                     </button>
                     <button type="button" class="btn btn-primary btn-next">
                     <span class="d-sm-inline-block d-none">بعدی</span>
                     <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                     </button>
                  </div>
               </div>
            </div>
            <!-- organization -->
            <div id="organization-info" class="content">
               <div class="content-header mb-3">
                  <h6 class="mb-1">سازمان ها</h6>
               </div>
               <div class="row g-3">
                  <div class="col-md-6 mb-4">  
                     <div class="position-relative"">
                        @if (old('organization_id'))
                           @php
                              $org = App\Models\Organization::where('id', old('organization_id'))->first();
                           @endphp
                        @endif
                        <select id='sel_emp' name="organization_id" style='width: 200px;'>
                           @if (old('organization_id')) <option value="{{ $org->id }}" selected>{{ $org->title }}</option>@endif
                        </select>                 
                     </div>
                  </div>
                  <div class="mt-1">
                     @error('organization_id')
                     <span class="text-danger"> * {{ $message }}</span>
                     @enderror
                  </div>  
                  <div class="col-12 d-flex justify-content-between">
                     <button type="button" class="btn btn-primary btn-prev">
                     <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                     <span class="d-sm-inline-block d-none">قبلی</span>
                     </button>
                     <button type="button" class="btn btn-primary btn-next">
                     <span class="d-sm-inline-block d-none">بعدی</span>
                     <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                     </button>
                  </div>
               </div>
            </div>
            <!-- role -->
            <div id="role-info" class="content">
               <div class="content-header mb-3">
                  <h6 class="mb-1">نقش های کاربران</h6>
               </div>
               <div class="row g-3">
                  <div class="row row-bordered g-0">
                     <div class="col-md p-3">
                        @foreach ($roles as $role)
                        <div class="form-check form-check-info">
                           <input class="form-check-input" name="role[]" type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" 
                           {{ (is_array(old('role')) and in_array($role->id, old('role'))) ? ' checked' : '' }}
                           > 
                           <label class="form-check-label" for="{{ $role->id }}"> {{ $role->name }} </label>
                        </div>
                        @endforeach 
                        <div class="mt-1">
                           @error('role')
                           <span class="text-danger"> * {{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <button type="button" class="btn btn-primary btn-prev">
                     <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                     <span class="d-sm-inline-block d-none">قبلی</span>
                     </button>
                     <button type="submit" class="btn btn-success">ثبت</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- /Default Wizard -->
@endsection

@section('vendor-js')
    <!-- form-->
    <script src="{{ asset('admin-assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('admin-assets/js/form-wizard-numbered.js') }}"></script> 

    <!-- select2-->
    <script src="{{ asset('admin-assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/select2/i18n/fa.js') }}"></script>
@endsection

@section('page-js')
    <!-- select2 Orhanization-->
   <script type="text/javascript">
      // CSRF Token
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $(document).ready(function(){
   
        $( "#sel_emp" ).select2({ 
           placeholder: "سازمان والد را انتخاب کنید",
           ajax: { 
             url: "{{route('admin.user.selectOrg')}}",
             type: "post",
             dataType: 'json',
             delay: 250,
             data: function (params) {
               return {
                  _token: CSRF_TOKEN,
                  search: params.term // search term
               };
             },
             processResults: function (response) {
               return {
                 results: response
               };
             },
             cache: true
           }
   
        });
   
      });
   </script>
   
   {{-- avatar --}}
   <script>  
        document.addEventListener('DOMContentLoaded', function (e) {
          (function () { 
            // Update/reset user image of account page
            let accountUserImage = document.getElementById('uploadedAvatar');
            const fileInput = document.querySelector('.account-file-input'),
              resetFileInput = document.querySelector('.account-image-reset');
        
            if (accountUserImage) {
              const resetImage = accountUserImage.src;
              fileInput.onchange = () => {
                if (fileInput.files[0]) {
                  accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                }
              };
              resetFileInput.onclick = () => {
                fileInput.value = '';
                accountUserImage.src = resetImage;
              };
            }
          })();
        }); 
    </script>  
@endsection
