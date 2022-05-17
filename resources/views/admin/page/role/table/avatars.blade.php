<ul class="list-unstyled d-flex avatar-group mb-0 ">
    @foreach ($role->users->slice(0,5) as $user)
    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
       data-bs-placement="top" title="{{ $user->full_name }}"
       class="avatar avatar-sm pull-up">
       <img class="rounded-circle" src="{{ asset($user->avatar == null ? 'https://www.psi.org.kh/wp-content/uploads/2019/01/profile-icon-300x300.png' : $user->avatar) }}"
          alt="Avatar">
    </li>
    @endforeach
    @if (count($role->users) >= 6)
    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
       data-bs-placement="top"
       title=" تعداد کاربران این سازمان {{ count($role->users) }} نفر می باشد"" class="
       avatar avatar-sm pull-up">
       <span
          class="avatar-initial rounded-circle bg-secondary">{{ count($role->users) - 5 }}+</span>
    </li>
    @endif
 </ul>