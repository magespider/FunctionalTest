<div class="sm:flex">
        <div class="flex-shrink-0 w-16">
                @isset($label)
                {{ $label }} 
                @endif 
        </div> 
        <div class="flex-1 flex flex-col"> 
                {{$slot}} 
        </div>
</div>