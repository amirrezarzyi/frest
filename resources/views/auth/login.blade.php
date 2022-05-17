@extends('auth.layouts.app')
@section('title', 'ورود')
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
            <h4 class="mb-2">وارد حساب کاربری خود شوید!</h4>
            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
               @csrf
               <div class="mb-3">
                  <label for="username" class="form-label">نام کاربری</label>
                  <input type="text" class="form-control text-start"  id="username" name="username"
                     placeholder="نام کاربری خود را وارد کنید" autofocus>
               </div>
               <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                     <label class="form-label" for="password">رمز عبور</label>
                     {{-- <a href="auth-forgot-password-basic.html"> --}}
                     {{-- <small>رمز عبور را فراموش کردید؟</small> --}}
                     {{-- </a> --}}
                  </div>
                  <div class="input-group input-group-merge">
                     <input type="password" id="password" class="form-control text-start" 
                        name="password" placeholder="············" aria-describedby="password">
                     <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
               </div>
               <div class="mb-3">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" id="remember-me">
                     <label class="form-check-label" for="remember-me"> به خاطر سپاری </label>
                  </div>
               </div>
               <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">ورود</button>
               </div>
            </form>
            {{-- <p class="text-center">
               <span>کاربر جدید هستید؟</span>
               <a href="{{ route('register') }}">
               <span>یک حساب بسازید</span>
               </a>
            </p> --}}
         </div>
      </div>
   </div>
   <!-- /Register -->
</div>
</div>
@endsection