<div class="space-y-8">
    <div>
        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <!-- Title -->
            <x-admin.wrap-field-row>
                <x-slot name="label">
                    {!! Form::label('title', 'Title', ['class' => 'control-label required sm:mt-px']) !!}
                </x-slot>
                {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control w-full', 'required' => 'required'] : ['class' => 'form-control w-full']) !!}
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </x-admin.wrap-field-row> 
        </div>
    </div>
</div>
<div class="py-5 flex justify-end">
    {!! Form::submit($formMode === 'edit' ? __('admin.update') : __('admin.create'), ['class' => 'btn btn-primary']) !!}
</div>