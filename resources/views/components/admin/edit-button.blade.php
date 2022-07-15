@aware(['url' => '']) 
@if($url != "")
     <a href="{{$url}}" title="{{__('admin.edit')}}" {{ $attributes->merge(['class' => 'btn-light']) }}>{{__('admin.edit')}}</a>
@endif