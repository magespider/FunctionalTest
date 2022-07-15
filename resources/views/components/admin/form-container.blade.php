<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow bg-white overflow-hidden min-h-full border-b border-gray-200 sm:rounded-lg p-5">
            <div class="max-w-7xl mx-auto">  
               <x-auth-session-status :status="session('flash_message')" />
                <!-- Validation Errors -->
                @if ( session('error'))
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        <li>{{ session('error') }}</li>
                    </ul>
                @endif
                <x-auth-validation-errors class="mb-4" :errors="$errors" />  
                {{ $slot }}
            </div>
        </div>
    </div> 
</div> 