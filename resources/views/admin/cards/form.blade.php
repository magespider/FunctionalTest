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

            <!-- Description -->
            @php
                $columns = \App\Models\Column::orderBy('position')->get()->pluck('title', 'id')->toArray();
            @endphp            
            <x-admin.wrap-field-row>
                <x-slot name="label">
                    {!! Form::label('column_id', 'Column', ['class' => 'control-label required sm:mt-px']) !!}
                </x-slot>
                {!! Form::select('column_id', $columns, null, ['class' => 'form-control block w-full max-w-xs', 'required' => 'required']) !!}
                {!! $errors->first('column_id', '<p class="help-block">:message</p>') !!}
            </x-admin.wrap-field-row> 

            <!-- Description -->
            <x-admin.wrap-field-row>
                <x-slot name="label">
                    {!! Form::label('description', 'Description', ['class' => 'control-label required sm:mt-px']) !!}
                </x-slot>
                {!! Form::textarea('description', null, ['class' => 'form-control w-full', 'required' => 'required']) !!}
                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
            </x-admin.wrap-field-row> 
        </div>
    </div>
</div>
<div class="py-5 flex justify-end">
    {!! Form::submit($formMode === 'edit' ? __('admin.update') : __('admin.create'), ['class' => 'btn btn-primary']) !!}
</div>