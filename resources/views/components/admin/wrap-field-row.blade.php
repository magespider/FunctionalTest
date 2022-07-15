<div class="sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start">
        @isset($label)
            {{ $label }} 
        @endif 
        <div class="mt-1 sm:mt-0 sm:col-span-4">
                <div class="flex flex-col">
                        {{$slot}}
                </div>
        </div>
</div>