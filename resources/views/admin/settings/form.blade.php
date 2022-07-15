<div class="space-y-8">
    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <x-admin.wrap-field col="1" class="{{ $errors->has('title') ? 'has-error' : ''}}">
            {!! Form::label('title', 'Title', ['class' => 'control-label required']) !!}
            {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control w-full', 'required' => 'required'] : ['class' => 'form-control w-full']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </x-admin.wrap-field>
        <x-admin.wrap-field col="1" class="{{ $errors->has('key') ? 'has-error' : ''}}">
            {!! Form::label('key', 'Key', ['class' => 'control-label required']) !!}
            {!! Form::text('key', null, ('required' == 'required') ? ['class' => 'form-control w-full', 'required' => 'required'] : ['class' => 'form-control w-full']) !!}
            {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
        </x-admin.wrap-field>
        <x-admin.wrap-field col="full" class="{{ $errors->has('value') ? 'has-error' : ''}}">
            {!! Form::label('value', 'Value', ['class' => 'control-label required']) !!}
            {!! Form::text('value', null, ('required' == 'required') ? ['class' => 'form-control w-full', 'required' => 'required'] : ['class' => 'form-control w-full']) !!}
            {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
        </x-admin.wrap-field>
        <x-admin.wrap-field col="full" class="{{ $errors->has('remark') ? 'has-error' : ''}}">
            {!! Form::label('remark', 'Remark', ['class' => 'control-label']) !!}
            {!! Form::text('remark', null, ['class' => 'form-control w-full']) !!}
            {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
        </x-admin.wrap-field>
    </div>
</div>
<div class="py-5 flex justify-end">
    {!! Form::submit($formMode === 'edit' ? __('admin.update') : __('admin.create'), ['class' => 'btn btn-primary']) !!}
</div>
