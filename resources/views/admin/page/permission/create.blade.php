@extends('admin.layouts.app')
@section('title','مدیریت - ایجاد مجوز')

@section('vendor-css')  
    <!-- select2-->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/select2/select2.css') }}">
    
@endsection

@section('content')
<h4 class="breadcrumb-wrapper mb-2"><small class="text-muted fw-light"><a href="">مجوز ها</a>/</small> ایجاد مجوز</h4>

 <!-- Multi Column with Form Separator -->
 <div class="card mb-1"> 
  <form class="card-body" action="{{ route('admin.permission.store') }}" method="POST">
    @csrf
    <h6 class="fw-normal">* جزئیات مجوز</h6>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label" for="title">نام مجوز</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}"
        class="form-control text-start"  placeholder="...نام نقش را وارد کنید">
        @error('title')
        <div class="mt-1"> 
          <span class="text-danger">* {{ $message }}</span>
        </div>
        @enderror
      </div> 
      <div class="col-md-6">
        <label class="form-label" for="name">کد یکتا(🔑)</label>
        <input type="text" id="name" name="name"  value="{{ old('name') }}" class="form-control text-start"  placeholder="...اسم انحصاری نقش را وارد کنید">
        @error('name')
        <div class="mt-1"> 
          <span class="text-danger">* {{ $message }}</span>
        </div>
        @enderror
      </div>    
      <div class="col-md-6">
        <label class="form-label" for="group">انتخاب گروه </label>
        <select id="group" class="group" name="parent_id" data-allow-clear="true">
          <option value="">انتخاب</option>
          @foreach ($permissionGroup as $group)
            <option value="{{$group->id}}" {{old('parent_id') == $group->id ? 'selected' : ''}} >{{ $group->name}}</option> 
          @endforeach
        </select>
        @error('parent_id')
        <div class="mt-1"> 
          <span class="text-danger">* {{ $message }}</span>
        </div>
        @enderror
      </div> 
      <div class="col-md-6">
        <label class="form-label" for="system">انتخاب سیستم </label>
        <select id="system" name="system_id" class="system" data-allow-clear="true">
          <option value="">انتخاب</option>
          @foreach ($subSystems as $system)
            <option value="{{$system->id}}" {{ old('system_id') == $system->id ? 'selected' : '' }} >{{ $system->name}}</option> 
          @endforeach
        </select>
        @error('system_id')
        <div class="mt-1"> 
          <span class="text-danger">* {{ $message }}</span>
        </div>
        @enderror
      </div> 
    </div>
    
    <div class="pt-4">
      <button type="submit" class="btn btn-primary me-sm-3 me-1">ثبت</button>
      <button type="reset" class="btn btn-label-secondary">انصراف</button>
    </div>
  </form>
</div>
@endsection

@section('vendor-js')
    <!-- form--> 
    {{-- <script src="{{ asset('admin-assets/js/form-wizard-numbered.js') }}"></script>  --}}

    <!-- select2-->
    <script src="{{ asset('admin-assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/select2/i18n/fa.js') }}"></script>

    <script>
      /**
 *  Form Wizard
 */

'use strict';

$(function () {
  const select2 = $('.group'),
        select3 = $('.system');
 
  // select2
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        placeholder: 'انتخاب کنید',
        dropdownParent: $this.parent()
      });
    });
  }
  // select2
  if (select3.length) {
    select3.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        placeholder: 'انتخاب کنید',
        dropdownParent: $this.parent()
      });
    });
  }
}); 
    </script>
@endsection