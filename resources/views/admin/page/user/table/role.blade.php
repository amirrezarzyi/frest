@php ($icons = ["primary","success","danger","warning", "info"])
<span class="text-nowrap">
    @foreach ($user->roles->sortBy('name') as $role) 
        <span class="badge bg-label-{{$icons[$loop->index]}} m-1">{{ $role->title }}</span><br>
    @endforeach 
</span>
