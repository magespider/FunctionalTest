@aware(['url' => '']) 
@if($url != "")
<div {{ $attributes->merge(['class' => '']) }}>
     {!! Form::open([
          'method'=>'DELETE',
          'url' => $url,
          'style' => 'display:inline'
     ]) !!}
          {!! Form::button(__('admin.delete'), array(
                    'type' => 'submit',
                    'class' => 'btn-danger show_confirm',
                    'data-toggle' => 'tooltip',
                    'title' => __('admin.delete'), 
          )) !!}
     {!! Form::close() !!}
     </div>
@endif