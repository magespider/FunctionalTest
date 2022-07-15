<x-admin.app-layout>  
    <x-admin.settings>
        <x-slot name="header">
            <x-admin.action-heading title="Edit Setting" backlink="{{ route('admin.settings.index') }}" /> 
        </x-slot> 

        <x-admin.form-container>
            {!! Form::model($setting, [
                'method' => 'PATCH',
                'url' => route('admin.settings.update', $setting->id),
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}
                <div class="max-w-7xl md:max-w-5xl mx-auto">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        @include ('admin.settings.form', ['formMode' => 'edit'])
                    </div>
                </div>
            {!! Form::close() !!}
        </x-admin.form-container> 
    </x-admin.settings>
</x-admin.app-layout>