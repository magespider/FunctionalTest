<div class="space-y-8">
    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6" x-data="{changePassword: <?php echo old('change_password', 0);?>}">
        <!-- Status --> 
        <x-admin.wrap-field col="1">
            <x-admin.status-field formMode={{$formMode}} />
        </x-admin.wrap-field> 

        <!-- Name -->
        <x-admin.wrap-field col="1" class="{{ $errors->has('name') ? 'has-error' : ''}}">   
            {!! Form::label('name', 'Name', ['class' => 'control-label required']) !!}
            {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control w-full', 'required' => 'required'] : ['class' => 'form-control w-full']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!} 
        </x-admin.wrap-field> 

        <!-- Email --> 
        <x-admin.wrap-field col="1" class="{{ $errors->has('email') ? 'has-error' : ''}}"> 
            {!! Form::label('email', 'Email', ['class' => 'control-label required']) !!}
            {!! Form::text('email', null, ('required' == 'required') ? ['class' => 'form-control w-full', 'required' => 'required'] : ['class' => 'form-control w-full']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
        </x-admin.wrap-field> 

        <!-- Password --> 
        <x-admin.password-fields formMode={{$formMode}} /> 
    </div> 
</div>
<div class="py-5 flex justify-end">
    {!! Form::submit($formMode === 'edit' ? __('admin.update') : __('admin.create'), ['class' => 'btn btn-primary']) !!}
</div>
