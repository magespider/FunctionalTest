<div class="space-y-8 divide-y divide-gray-200">
    <div>  
      <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <x-admin.wrap-field col="1">
          {!! Form::label('current-password', __('Old Password'), ['class' => 'control-label required']) !!}
          <div class="mt-1">
              <x-admin.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="current-password"
                                required autocomplete="new-password" />
              {!! $errors->first('current-password', '<p class="help-block">:message</p>') !!}
            </div>
        </x-admin.wrap-field>   
        <div class="sm:col-span-3">
          {!! Form::label('password', __('New Password'), ['class' => 'control-label required']) !!}
          <div class="mt-1">
              <x-admin.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="" />
              {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>
        </div>  
        <div class="sm:col-span-3">
          {!! Form::label('password_confirmation', __('Confirm Password'), ['class' => 'control-label required']) !!}
          <div class="mt-1">
            <x-admin.input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" placeholder="" required />
            {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
          </div>
        </div>   
      </div>
    </div> 
</div>

<div class="py-5">
  <div class="flex justify-end"> 
    {!! Form::submit(__('Save'), ['class' => 'btn-primary ml-5']) !!}  
  </div>
</div> 