@aware(['url' => '']) 
@if($url != "")
<div {{ $attributes->merge(['class' => '']) }}>
     {!! Form::open([
          'method'=>'POST',
          'url' => $url,
          'style' => 'display:inline'
     ]) !!}
          {!! Form::button(__('Cancle'), array(
                    'type' => 'submit',
                    'class' => 'btn-danger show_cancle_confirm',
                    'data-toggle' => 'tooltip',
                    'title' => __('admin.cancle'), 
          )) !!}
     {!! Form::close() !!}
     </div>
@endif