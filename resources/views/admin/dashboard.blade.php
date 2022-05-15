@extends('admin.layouts.app')
@section('title','مدیریت - داشبورد')
@section('vendor-css')
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
@endsection
@section('content')
<h4 class=" breadcrumb-wrapper"> داشبورد </h4>
<div class="row">
   <!-- Gamification Card -->
   <div class="col-lg-4 col-md-6 col-12 mb-4">
      <div class="card bg-light"
         style="background: url('http://fis.test/admin-assets/app-assets/images/illustration/flowers.svg') no-repeat left 30px top 30px">
         <div class="card-header">
            <div class="col-6"></div>
            <h5 class="card-title mb-2"><i class="bx bx-calendar text-primary"></i> {{Jdate(now())->format('%A, %d %B %Y');}} </h5>
            <span class="d-block text-nowrap primary-font"><i class="bx bx-time text-primary"></i> <small id="clock"></small> </span>
         </div>
         <div class="card-body">
            <div class="col-7">
               <a href="javascript:;" class="btn btn-md btn-primary">مشاهده قرارداد ها</a>
            </div>
         </div>
      </div>
   </div>
   <!--/ Gamification Card -->
   <!-- Website Analytics-->
   <div class="col-lg-8 col-md-12 mb-4">
      <div class="card h-100">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0"><i class="bx bx-bar-chart-alt"></i>گزارش نهایی سیستم</h5>
            <div class="dropdown primary-font">
               <i class="bx bx-time"></i><small>آخرین بروزرسانی : <b>{{ jDate(now())->format('%H:%M') }}</b></small>
            </div>
         </div>
         <div class="card-body pb-2">
            <div class="d-flex justify-content-around align-items-center flex-wrap mb-4">
               <div class="col-xl-3 col-sm-6 col-6 mb-2 mb-xl-0">
                  <div class="d-flex flex-row">
                     <div class="avatar flex-shrink-0 me-4 mt-2">
                        <span class="avatar-initial avatar-md  avatar rounded-circle bg-label-primary"><i
                           class="bx bx-user"></i></span>
                     </div>
                     <div class="my-auto">
                        <h5 class="fw-bolder mb-0">
                           <div class="counter" data-target="20">0</div>
                        </h5>
                        <p class="card-text font-small-3 mb-0">کاربران</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 col-6 mb-2 mb-xl-0">
                  <div class="d-flex flex-row">
                     <div class="avatar flex-shrink-0 me-4 mt-2">
                        <span class="avatar-initial avatar-md  rounded-circle bg-label-info"><i
                           class="bx bx-file"></i></span>
                     </div>
                     <div class="my-auto">
                        <h5 class="fw-bolder mb-0">
                           <div class="counter" data-target="226">0</div>
                        </h5>
                        <p class="card-text font-small-3 mb-0">قرارداد ها</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 col-6 mb-2 mb-xl-0">
                  <div class="d-flex flex-row">
                     <div class="avatar flex-shrink-0 me-4 mt-2">
                        <span class="avatar-initial avatar-md rounded-circle bg-label-danger"><i
                           class="bx bx-package"></i></span>
                     </div>
                     <div class="my-auto">
                        <h5 class="fw-bolder mb-0">
                           <div class="counter" data-target="32132">0</div>
                        </h5>
                        <p class="card-text font-small-3 mb-0">پرونده ها</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 col-6 mb-2 mb-xl-0">
                  <div class="d-flex flex-row">
                     <div class="avatar flex-shrink-0 me-4 mt-2">
                        <span class="avatar-initial avatar-md  rounded-circle bg-label-success"><i
                           class="bx bx-dollar"></i></span>
                     </div>
                     <div class="my-auto">
                        <h5 class="fw-bolder mb-0">
                           <div class="counter" data-target="110">0</div>
                        </h5>
                        <p class="card-text font-small-3 mb-0">سهامداران</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--/ Website Analytics--> 
</div>
<div class="row p-3">
   <!-- Navigation -->
   <div class="card col-lg-3 col-md-4 col-12 mb-md-0 mb-3">
      <div class="d-flex justify-content-between flex-column mb-2 mb-md-0">
         <ul class="nav nav-align-left nav-pills flex-column lh-1-85">
            <li class="nav-item">
               <button class="nav-link active mt-2" data-bs-toggle="tab" data-bs-target="#documents">
               <i class="bx bx-file faq-nav-icon me-1"></i>
               <span class="align-middle">قرارداد ها</span>
               </button>
            </li>
            @if (Auth()->user()->organization_id) 
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#orgs">
               <i class="bx bx-buildings faq-nav-icon me-1"></i>
               <span class="align-middle">سازمان</span>
               </button>
            </li>
            @endif
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#alarms">
               <i class="bx bx-time faq-nav-icon me-1"></i>
               <span class="align-middle">جلسات</span>
               </button>
            </li>
         </ul>
         <div class="d-none d-md-block">
            <div class="mt-2">
               <img src="{{ asset('admin-assets/svg/find.svg') }}"  >
            </div>
         </div>
      </div>
   </div>
   <!-- /Navigation -->
   <!-- tabs -->
   <div class="card col-lg-9 col-md-8 col-12">
      <div class="tab-content py-0 mb-4">
         <div class="tab-pane fade show active" id="documents" role="tabpanel">
            <div class="input-wrapper my-3 input-group input-group-merge zindex-1">
               <span class="input-group-text" id="basic-addon1"><i class="bx bx-search-alt bx-xs text-muted"></i></span>
               <input type="text" class="form-control form-control-lg" placeholder="شماره قرار داد را وارد کنید ..." aria-label="Search" aria-describedby="basic-addon1">
            </div>
            <div id="accordionPayment" class="accordion accordion-header-primary">
               <div class="card accordion-item active">
                  <table class="datatables-ajax table table-light table-hover">
                     <thead>
                        <tr>
                           <th>نام کامل</th>
                           <th>ایمیل</th>
                           <th>موقعیت</th>
                           <th>دفتر</th>
                           <th>تاریخ شروع</th>
                           <th>حقوق</th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
         {{-- organizations --}}
         @if (Auth()->user()->organization_id) 
         <div class="tab-pane fade" id="orgs" role="tabpanel">
            <div class="d-flex align-items-center mt-3 gap-3">
               <div>
                  <span class="badge bg-label-primary rounded-2 p-2 mt-1">
                  <i class="bx bx-buildings fs-3 lh-1"></i>
                  </span>
               </div>
               <div>
                  <h5 class="mb-0">
                     <span class="align-middle">طبقه بندی سازمانی</span>
                  </h5>
                  {{-- <span class="lh-1-85">دریافت راهنمایی برای ارسال</span> --}}
               </div>
            </div>
            <div id="accordionDelivery" class="accordion accordion-header-primary">
               <div class=" accordion-item active">
                  <div class="col-12 col-lg-12 ">
                     <div class="demo-inline-spacing my-2">
                        <div class="list-group p-3">
                           {{-- your org --}}  
                           <div class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer">
                              <img src="{{Auth()->user()->organization->logo}}" alt="User Image" class="rounded-circle me-3 w-px-50">
                              <div class="w-100">
                                 <div class="d-flex justify-content-between">
                                    <div class="user-info">
                                       <h6 class="mb-1">{{Auth()->user()->organization->title}}</h6>
                                       {{-- <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</small>  --}}
                                    </div>
                                    <div class="add-btn">
                                       <small>سازمان شما</small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           {{--/ your org --}}
                           {{-- parent org --}}    
                           @if (Auth()->user()->organization->parent)
                              <ul class="list-group list-group-timeline">
                                 <li class="list-group-item list-group-timeline-warning"> </li>
                              </ul>
                              <div class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer">
                                 <img src="{{Auth()->user()->organization->parent->logo}}" alt="User Image" class="rounded-circle me-3 w-px-50">
                                 <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                       <div class="user-info">
                                          <h6 class="mb-1">{{Auth()->user()->organization->parent->title}}</h6>
                                          {{-- <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</small>  --}}
                                       </div>
                                       <div class="add-btn">
                                          <small>سازمان والد</small>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           @endif
                           {{--/ parent org --}} 
                           {{-- father org --}}   
                           @unless (Auth()->user()->organization->father == Auth()->user()->organization->parent)
                              <ul class="list-group list-group-timeline">
                                 <li class="list-group-item list-group-timeline-primary"> </li>
                                 <li class="list-group-item list-group-timeline-warning"> </li>
                                 <li class="list-group-item list-group-timeline-info"> </li>
                              </ul>
                              <div class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer">
                                 <img src="{{Auth()->user()->organization->father->logo}}" alt="User Image" class="rounded-circle me-3 w-px-50">
                                 <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                       <div class="user-info">
                                          <h6 class="mb-1">{{Auth()->user()->organization->father->title}}</h6>
                                          {{-- <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</small>  --}}
                                       </div>
                                       <div class="add-btn">
                                          <small>سازمان مستقل</small>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           @endunless
                           {{--/ father org --}} 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endif
         {{--/ organizations --}}
         {{-- alarms --}}
         <div class="tab-pane fade" id="alarms" role="tabpanel">
            <div class="d-flex align-items-center my-3 gap-3">
               <div>
                  <span class="badge bg-label-primary rounded-2 p-2 mt-1">
                  <i class="bx bx-cart fs-3 lh-1"></i>
                  </span>
               </div>
               <div>
                  <h5 class="mb-0">
                     <span class="align-middle">ارسال</span>
                  </h5>
                  <span class="lh-1-85">دریافت راهنمایی برای ارسال</span>
               </div>
            </div>
            <div id="accordionDelivery" class="accordion accordion-header-primary">
               <div class="card accordion-item active">
                  <h2 class="accordion-header">
                     <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionDelivery-1" aria-controls="accordionDelivery-1">
                     با تولید سادگی
                     </button>
                  </h2>
                  <div id="accordionDelivery-1" class="accordion-collapse collapse show">
                     <div class="accordion-body lh-2">
                        با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
                     </div>
                  </div>
               </div>
            </div>
         </div>
         {{--/ alarms --}}
      </div>
   </div>
   <!-- /tabs-->
</div>
@endsection
@section('vendor-js')
<script src="{{ asset('admin-assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/libs/datatables/i18n/fa.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
@endsection
@section('page-js')
<script>
   // Selector
   const counters = document.querySelectorAll('.counter');
   // Main function
   for(let n of counters) {
   const updateCount = () => {
       const target = + n.getAttribute('data-target');
       const count = + n.innerText;
       const speed = 500; // change animation speed here
       const inc = target / speed; 
       if(count < target) {
       n.innerText = Math.ceil(count + inc);
       setTimeout(updateCount, 1);
       } else {
       n.innerText = target;
       }
   }
   updateCount();
   }
</script>
<script>
   setInterval(displayTime,1000)
   function displayTime(){
   const timeNow = new Date();
   
   let hours = timeNow.getHours();
   let minutes = timeNow.getMinutes();
   let seconds = timeNow.getSeconds();
   
   hours = hours < 10 ? '0' + hours : hours;
   minutes = minutes < 10 ? '0' + minutes : minutes;
   seconds = seconds < 10 ? '0' + seconds : seconds;
   
   let timeStr = hours + ":" + minutes + ":" + seconds;
   
   document.getElementById('clock').innerText = timeStr;
   }
   
   displayTime();
</script>
@endsection