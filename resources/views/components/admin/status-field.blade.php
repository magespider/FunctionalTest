@props(['formMode'])
<x-admin.wrap-field-row class="{{ $errors->has('type') ? 'has-error' : ''}}"> 
    <x-slot name="label"> 
            {!! Form::label('enabled', __('admin.status'), ['class' => 'control-label sm:mt-px']) !!}
    </x-slot> 
    <div class="switch_checkbox">
        <label class="switch">
            @if($formMode === 'create')
                {{ Form::checkbox('enabled', 1, old('enabled', 1), ['class' => 'form-checkbox', 'id' => 'enabled']) }} 
            @else
                {{ Form::checkbox('enabled', 1, null, ['class' => 'form-checkbox', 'id' => 'enabled']) }} 
            @endif                    
            <span class="slider round"></span>
        </label>
    </div>  
    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</x-admin.wrap-field-row> 