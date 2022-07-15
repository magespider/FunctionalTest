<x-admin.app-layout>
<x-slot name="header"> 
    <h2 class="text-xl font-semibold text-gray-900">
        {{ __('Change Password') }}
    </h2>        
</x-slot>  
<x-admin.form-container>
        {!! Form::model([
            'method' => 'PATCH',
            'url' => route('admin.change-password.update'),
            'class' => 'form-horizontal',
            'files' => true
        ]) !!}
        <div class="max-w-7xl md:max-w-5xl mx-auto">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                @include ('admin.change-password.form', ['formMode' => 'edit'])
            </div>
        </div>
    {!! Form::close() !!} 
</x-admin.form-container>  
</x-admin.app-layout>