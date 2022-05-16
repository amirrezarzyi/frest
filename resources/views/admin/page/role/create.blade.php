@extends('admin.layouts.app')
@section('title','مدیریت - ایجاد نقش')

@section('vendor-css')  
    <!-- select2-->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/select2/select2.css') }}">
    
@endsection

@section('content')
<h4 class="breadcrumb-wrapper mb-2"><small class="text-muted fw-light"><a href="">نقش ها</a>/</small> ایجاد نقش</h4>

 <!-- Multi Column with Form Separator -->
 <div class="card mb-1"> 
  <form class="card-body" action="{{ route('admin.role.store') }}" method="POST">
    @csrf
    <h6 class="fw-normal">* جزئیات نقش</h6>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label" for="name">نام نقش</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
        class="form-control text-start" dir="ltr" placeholder="...نام نقش را وارد کنید">
        @error('name')
        <div class="mt-1"> 
          <span class="text-danger">* {{ $message }}</span>
        </div>
        @enderror
      </div> 
      <div class="col-md-6">
        <label class="form-label" for="key">کد یکتا(🔑)</label>
        <input type="text" id="key" name="key"  value="{{ old('key') }}" class="form-control text-start" dir="ltr" placeholder="...اسم انحصاری نقش را وارد کنید">
        @error('key')
        <div class="mt-1"> 
          <span class="text-danger">* {{ $message }}</span>
        </div>
        @enderror
      </div>    
      <div class="col-md-6">
        <label class="form-label" for="group">انتخاب گروه </label>
        <select id="group" class="group" name="parent_id" data-allow-clear="true">
          <option value="">انتخاب</option>
          @foreach ($roleGroups as $group)
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
    <hr class="my-4 mx-n4">
    <h6 class="fw-normal">* مجوزها</h6>
    <div class="row">
    @foreach ($permissions as $permission) 
      <div class="col-lg-6">
        @php ($icons = ["primary","success","danger","warning", "info"]) 
        @if ($permission->parent_id == null) 
        <small class="text-light fw-semibold badge bg-label-{{$icons[$loop->index]}}">{{$permission->name}} </small>
        @endif

        @if (!is_null($permission->childrens))         
          <div class="demo-inline-spacing mt-3">
            <div class="list-group"> 
              @foreach ($permission->childrens as $child) 
                <label class="list-group-item">
                  <input class="form-check-input me-1" type="checkbox" value="{{$child->id}}" name="permission[]"
                  {{ (is_array(old('permission')) and in_array($child->id, old('permission'))) ? ' checked' : '' }}
                  >
                    {{$child->name}}
                </label>  
              @endforeach
            </div>
          </div>
        @endif

      </div>
    @endforeach
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