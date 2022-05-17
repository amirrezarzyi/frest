@extends('admin.layouts.app')
@section('title', 'مدیریت - پروفایل')
@section('vendor-css')
@endsection
@section('content')   
<!-- User Profile Content -->
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
       <!-- About User -->
       <b class="badge bg-label-primary mb-2"> <i class="bx bx-user"></i> حساب کاربری </b> 
       <div class="card mb-4">
          <div class="card-body">
             <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="https://static.roocket.ir/images/avatar/2022/5/6/ZKWD4AQr6ruK1SnUiwbrOwDVIyyRFQgrfuHdseKv.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                   <label for="upload" class="btn btn-outline-primary me-2" tabindex="0">
                   <span class="d-none d-sm-block">تغییر تصویر</span>
                   <i class="bx bx-upload d-block d-sm-none"></i>
                   <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg">
                   </label>  
                </div>
             </div>
             <br>
             <ul class="list-unstyled mb-4 mt-3">
                <label for="name"><span class="fw-semibold mx-2">نام کاربری:</span></label>
                <li class="d-flex align-items-center my-2">
                   <div class="input-group">
                      <span class="input-group-text" id="name"><i class="bx bx-user"></i></span>
                      <input type="text" class="form-control" id="name" value="امیررضا رضایی" placeholder="نام کاربری" aria-label="Username" aria-describedby="basic-addon11">
                   </div>
                </li>
                <div class="mt-4"></div>
                <span class="fw-semibold mx-2 ">پست الکترونیکی:</span>
                <li class="d-flex align-items-center my-2">
                   <div class="input-group">
                      <span class="input-group-text" id="basic-addon11"><i class="bx bx-envelope"></i></span>
                      <input type="text" class="form-control" value="hjrezi1999@gmail.com" placeholder="نام کاربری" aria-label="Username" aria-describedby="basic-addon11" disabled>
                   </div>
                </li>
             </ul>
             <div class="row mt-3">
                <div class="d-grid gap-2 col-lg-6 mx-auto">
                   <button class="btn btn-primary" type="button">ذخییره تغییرات</button> 
                </div>
             </div>
          </div>
       </div>
       <!--/ About User -->  
    </div>
    <div class="col-xl-4 col-lg-7 col-md-7">
       <!-- Change Password -->
       <b class="badge bg-label-primary mb-2"> <i class="bx bx-lock"></i> تغییر رمز عبور </b> 
       <div class="card">
          <div class="card-body">
             <ul class="list-unstyled">
                <label for="name"><span class="fw-semibold mx-2">رمز عبور فعلی :</span></label>
                <li class="d-flex align-items-center my-2">
                   <div class="input-group">
                      <div class="input-group input-group-merge">
                         <input type="password" class="form-control text-start"  id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                         <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                      </div>
                   </div>
                </li>
                <label for="name"><span class="fw-semibold mx-2">رمز عبور جدید :</span></label>
                <li class="d-flex align-items-center my-2">
                   <div class="input-group">
                      <div class="input-group input-group-merge">
                         <input type="password" class="form-control text-start"  id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                         <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                      </div>
                   </div>
                </li>
                <label for="name"><span class="fw-semibold mx-2">تکرار رمز عبور جدید :</span></label>
                <li class="d-flex align-items-center my-2">
                   <div class="input-group">
                      <div class="input-group input-group-merge">
                         <input type="password" class="form-control text-start"  id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                         <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                      </div>
                   </div>
                </li>
             </ul>
             <div class="row mt-3">
                <div class="d-grid gap-2 col-lg-6 mx-auto">
                   <button class="btn btn-primary" type="button">تغییر رمز عبور</button> 
                </div>
             </div>
          </div>
       </div>
       <!--/ Change Password --> 
    </div>
    <div class="col-xl-4 col-lg-7 col-md-7">
       <!-- Two factor chalange -->
       <b class="badge bg-label-primary mb-2"> <i class="bx bx-shield"></i> تغییر رمز عبور </b> 
       <div class="card">
          <div class="card-body text-center">
             <p>حساب شما دو مرحله ای نمی باشد</p>
             <div class="row mt-3">
                <div class="d-grid gap-2 col-lg-6 mx-auto">
                   <button class="btn btn-primary" type="button">فعالسازی</button> 
                </div>
             </div>
          </div>
       </div>
       <!--/ Two factor chalange --> 
    </div> 
</div>
<!--/ User Profile Content -->
@endsection
@section('vendor-js')
@endsection
@section('page-js')
@endsection
