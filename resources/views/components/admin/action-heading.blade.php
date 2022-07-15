@aware(['title' => '', 'backlink' => ''])
<div class="flex-1 min-w-0 flex items-center">
     @if($backlink != "")
     <a class="btn-primary mr-3 flex items-center" href="{{ $backlink }}"> 
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" />
          </svg>           
          {{ __('admin.back') }}
     </a> 
     @endif
     <h1 class="text-xl font-medium text-gray-900">{!! $title !!}</h1> 
</div> 