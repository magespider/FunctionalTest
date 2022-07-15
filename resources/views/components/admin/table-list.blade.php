@aware(['validation' => true])
<div> 
    @isset($navigation)
        <div class="max-w-full mx-auto mb-4 bg-white overflow-hidden sm:rounded-lg sm:shadow px-2 pt-5 pb-2">   
            <div class="max-w-7xl mx-auto">
                {{ $navigation }} 
            </div>        
        </div>        
    @endif
    @isset($header) 
        {{ $header }}   
    @endif
    @isset($search)
        <div class="max-w-full mx-auto mb-4 bg-white overflow-hidden sm:rounded-lg sm:shadow px-2 py-2">  
            <div class="flex justify-end">
                {{ $search }}
            </div>
        </div>        
    @endif
    @if($validation)
        <!-- Session Status -->
        <x-auth-session-status :status="session('flash_message')" />
        <!-- Validation Errors -->
        @if ( session('error'))
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                <li>{{ session('error') }}</li>
            </ul>
        @endif
        <x-auth-validation-errors class="mb-4" :errors="$errors" />  
    @endif
    <div class="shadow bg-white overflow-x-auto min-h-full border-b border-gray-200 sm:rounded-lg list-table"> 
        {{ $slot }}   
        @isset($pagination)
        <div class="pagination-wrapper px-4 py-3">
            {{$pagination}}
        </div>
        @endif
    </div> 
    <script type="text/javascript"> 
        $(function() {
            $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `{{__('admin.delete_warning_message')}}`,
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
						form.submit();
                    }
                });
            });
        });
    </script>
</div>