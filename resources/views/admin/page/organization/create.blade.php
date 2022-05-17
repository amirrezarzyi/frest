@extends('admin.layouts.app')
@section('title', 'مدیریت - ایجاد سازمان')


@section('vendor-css')
    <!-- form-->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/bs-stepper/bs-stepper.css') }}">

    <!-- select2-->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/select2/select2.css') }}">
@endsection

@section('content') 
    <h4 class="d-inline">سازمان ها / <h6 class="d-inline">ایجاد سازمان</h6></h4>

    <div class="row mt-3">
        <div class="col-12 mb-4">
            {{-- <a href="{{ route('admin.organization.index') }}" class="btn btn-primary mb-2"><i class="bx bx-arrow-from-left"></i> بازگشت</a> --}}
            <div class="bs-stepper wizard-numbered mt-2">
                <div class="bs-stepper-header">
                    <div class="step active" data-target="#account-details">
                        <button type="button" class="step-trigger" aria-selected="true">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">
                            <span class="bs-stepper-title">جزئیات سازمان</span>
                            <span class="bs-stepper-subtitle">تنظیم جزئیات سازمان</span>
                          </span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger" aria-selected="false">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">
                            <span class="bs-stepper-title">اطلاعات تماس</span>
                            <span class="bs-stepper-subtitle">افزودن اطلاعات تماس سازمان</span>
                          </span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#avatar">
                        <button type="button" class="step-trigger" aria-selected="false">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">
                            <span class="bs-stepper-title">مدیر و لوگوی سازمان</span>
                            <span class="bs-stepper-subtitle">افزودن مدیر و لوگوی سازمان</span>
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
                    <form action="{{ route('admin.organization.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Account Details -->
                        <div id="account-details" class="content active dstepper-block">
                            <div class="content-header mb-3">
                                <h6 class="mb-1">جزئیات سازمان</h6> 
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="title">نام سازمان</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control text-start"  placeholder="امور شعب بانک ملی">
                                    <div class="mt-1">
                                        @error('title')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="national_code">کد سازمان</label>
                                    <input type="text" name="national_code" id="national_code" value="{{ old('national_code') }}" class="form-control text-start"  placeholder="0245633285">
                                    <div class="mt-1">
                                        @error('national_code')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="parent_id" class="form-label">سازمان والد</label>
                                    <div class="position-relative"">
                                    @if (old('parent_id')) 
                                        @php
                                            $orgId = App\Models\Organization::where('id', old('parent_id'))->first(); 
                                        @endphp
                                    @endif
                                        <select id='parent_id' class="select2" name="parent_id"> 
                                            @if (old('parent_id')) <option value="{{$orgId['id']}}" selected>{{ $orgId['title'] }}</option> @endif
                                            @if (old('parent_id') == 0) <option value="0" selected>بدون والد</option> @endif
                                        </select>                 
                                     </div>
                                    <div class="mt-1">
                                        @error('parent_id')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 form-password-toggle"> 
                                    <label for="parent_id" class="form-label">وابستگی به ارگان والد</label>
                                    <select id="inderpent" name="inderpent" class="form-select"> 
                                        <option value="1">وابسته</option>
                                        <option value="0">مستقل</option> 
                                      </select>  
                                    <div class="mt-1">
                                        @error('inderpent')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-label-secondary btn-prev" disabled="">
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
                                <h6 class="mb-1">اطلاعات تماس</h6> 
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="email">ایمیل</label>
                                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="meli-bank@gmail.com">
                                    <div class="mt-1">
                                        @error('email')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="phone">تلفن</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="با کد منطقه">
                                    <div class="mt-1">
                                        @error('phone')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="fax">فکس (دورنگار)</label>
                                    <input type="text" name="fax" id="fax" value="{{ old('fax') }}" class="form-control" placeholder="با کد منطقه">
                                    <div class="mt-1">
                                        @error('fax')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="website">وبسایت</label>
                                    <input type="text" name="website" id="website" value="{{ old('address') }}" class="form-control" placeholder="www.bmi.ir">
                                    <div class="mt-1">
                                        @error('website')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label class="form-label" for="address">آدرس</label>
                                    <textarea name="address" id="address" rows="3" class="form-control" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 107px;"
                                              placeholder="بیرجند، خیابان غفاری ، میدان دانشگاه آزاد">{{ old('address') }}</textarea>
                                    <div class="mt-1">
                                        @error('address')
                                        <span class="text-danger">* {{ $message }}</span>
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

                        <!-- Organizatin and Avatar-->
                        <div id="avatar" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-1">مدیر و لوگو سازمان</h6> 
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6 mt-5">
                                    <label for="manager_id" class="form-label">نام مدیر سازمان</label>
                                    <div class="position-relative"">
                                        @if (old('manager_id'))
                                            @php
                                                $manager = App\Models\User::where('id', old('manager_id'))->first();
                                            @endphp
                                        @endif
                                        <select id='manager_id' name="manager_id" style='width: 200px;'> 
                                            @if (old('manager_id')) <option value="{{ $manager->id }}" selected>{{ $manager->full_name. ' - ' . $manager['username'] }}</option>@endif
                                        </select>                 
                                     </div>
                                    <div class="mt-1">
                                        @error('manager_id')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 text-center">
                                    <div class="button-wrapper">      
                                        <div class="mb-2">
                                            <img src="https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_170,w_170,f_auto,b_white,q_auto:eco,dpr_1/v1488900775/hkx40wm1lkzzqy35kptv.png"  alt="user-avatar" class="d-block rounded mx-auto" height="100" width="100" id="uploadedAvatar">
                                        </div>                      
                                       <label for="upload" class="btn btn-sm btn-primary me-2 mb-4" tabindex="0">
                                       <span class="d-none d-sm-block">بارگذاری تصویر</span>
                                       <i class="bx bx-upload d-block d-sm-none"></i>
                                       <input type="file" name="logo" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg">
                                       </label>
                                       <button type="button" class="btn btn-sm btn-label-secondary account-image-reset mb-4">
                                       <i class="bx bx-reset d-block d-sm-none"></i>
                                       <span class="d-none d-sm-block">بازنشانی</span>
                                       </button> 
                                    </div>
                                 </div>
                                 @error('logo')
                                    <span class="text-danger">* {{ $message }}</span>
                                 @enderror
                                
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
                            <h6 class="mb-1">نقش های سازمانی</h6>
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
    </div>
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
    <!-- select2  ORGANIZATIONS-->
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){ 
          $( "#parent_id" ).select2({ 
            placeholder: "سازمان والد را انتخاب کنید",
             ajax: { 
               url: "{{route('admin.organization.selectParent')}}",
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
    
    <!-- select2 USERS-->
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
          $( "#manager_id" ).select2({ 
            placeholder: "مدیر سازمان والد را انتخاب کنید", 
             ajax: { 
               url: "{{route('admin.organization.selectManager')}}",
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