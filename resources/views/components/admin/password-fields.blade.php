@props(['formMode'])
@if ($formMode === 'edit')
<div class="col-span-6 flex items-center"> 
    {{ Form::checkbox('change_password', 1, null, ['class' => 'form-checkbox', 'id' => 'change_password', 'x-model' => 'changePassword']) }} 
    <label for="change_password" class="ml-2 block text-sm text-gray-900 font-medium">Change Password</label>  
</div>  
<div class="col-span-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 password-fields" x-show="changePassword">
@endif 
    <div class="col-span-6 sm:col-span-3 {{ $errors->has('password') ? 'has-error' : ''}}">
        {!! Form::label('password', __('admin.password'), ['class' => 'control-label required']) !!}
        @php
            $passwordOptions = ['class' => 'form-control w-full'];
            if ($formMode === 'create') {
                $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
            }
        @endphp
        {!! Form::password('password', $passwordOptions) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-span-6 sm:col-span-3 {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
        {!! Form::label('password_confirmation', __('admin.password_confirmation'), ['class' => 'control-label required']) !!}
        {!! Form::password('password_confirmation', ('' == 'required') ? ['class' => 'form-control w-full', 'required' => 'required'] : ['class' => 'form-control w-full']) !!}
        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
    </div>
@if ($formMode === 'edit')
    </div>
@endif