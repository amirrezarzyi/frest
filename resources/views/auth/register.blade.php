@extends('auth.layouts.app')
@section('title', 'ثبت نام')
@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
   <div class="authentication-inner py-4">
      <!-- Register -->
      <div class="card">
         <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
               <a href="index.html" class="app-brand-link gap-2">
               <span class="app-brand-logo demo">
               <img src="{{ asset('admin-assets/img/favicon/favicon.ico') }}" alt="لوگو" width="26px"
                  height="26px">
               </span>
               <span class="app-brand-text demo h3 mb-0 fw-bold">فرست</span>
               </a>
            </div>
            <!-- /Logo -->
            <!-- /Logo -->
            <h4 class="mb-2">حساب کاربری خود را بسازید!</h4>
            <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
               @csrf
               <div class="mb-3">
                  <label for="username" class="form-label">نام کاربری</label>
                  <input type="text" class="form-control text-start"  id="username" name="username" placeholder="نام کاربری خود را وارد کنید" autofocus>
               </div>
               <div class="mb-3">
                  <label for="email" class="form-label">ایمیل</label>
                  <input type="text" class="form-control text-start"  id="email" name="email" placeholder="ایمیل خود را وارد کنید">
               </div>
               <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">رمز عبور</label>
                  <div class="input-group input-group-merge">
                     <input type="password" id="password" class="form-control text-start"  name="password" placeholder="············" aria-describedby="password">
                     <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
               </div>
               <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">نکرار رمز عبور</label>
                  <div class="input-group input-group-merge">
                     <input type="password" id="password" class="form-control text-start"  name="password" placeholder="············" aria-describedby="password">
                     <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
               </div>
               <div class="mb-3">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                     <label class="form-check-label" for="terms-conditions">
                     من موافقم با
                     <a href="javascript:void(0);">سیاست حریم خصوصی و قوانین</a>
                     </label>
                  </div>
               </div>
               <button class="btn btn-primary d-grid w-100">عضویت</button>
            </form>
            <p class="text-center">
               <span>حساب کاربری دارید؟</span>
               <a href="{{ route('login') }}">
               <span>وارد شوید</span>
               </a>
            </p>
         </div>
      </div>
      <!-- Register Card -->
   </div>
</div>
@endsection