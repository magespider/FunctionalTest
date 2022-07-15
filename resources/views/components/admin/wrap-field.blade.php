@aware(['col' => 2]) 
@if($col == 1)
    <div {{ $attributes->merge(['class' => 'col-span-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6']) }}>
        <div class="col-span-6 sm:col-span-3">
            {{ $slot }} 
        </div>
    </div>
@elseif($col == 'full')
    <div {{ $attributes->merge(['class' => 'col-span-6']) }}> 
        {{ $slot }} 
    </div>    
@else
    <div {{ $attributes->merge(['class' => 'col-span-6 sm:col-span-3']) }}>
        {{ $slot }} 
    </div>  
@endif