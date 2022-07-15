@aware(['status' => 0])
<div>  
    @php
        $color = ($status == 1)?"green":"red";
    @endphp
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{$color}}-100 text-{{$color}}-800">
        <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-{{$color}}-400" fill="currentColor" viewBox="0 0 8 8">
            <circle cx="4" cy="4" r="3" />
        </svg>
        {{($status == 1)? __('admin.enable') : __('admin.disable')}}
    </span>
</div>