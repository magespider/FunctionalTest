@aware(['url' => '']) 
@if($url != "")
     <a href="{{$url}}" title="{{__('admin.view')}}" {{ $attributes->merge(['class' => 'btn-light']) }}>{{__('admin.view')}}</a>
@endif