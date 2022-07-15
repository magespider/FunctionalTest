<div class="h-full flex -m-4">  
  <div class="flex-1 min-w-0 flex flex-col overflow-hidden"> 
    <main class="flex-1 flex overflow-hidden">
      <div class="flex-1 flex flex-col overflow-hidden">  
        <div class="flex-1 flex xl:overflow-hidden">
          <!-- Secondary sidebar -->
          <nav aria-label="Sections" class="min-h-screen flex-shrink-0 w-60 bg-white border-r border-gray-200 xl:flex xl:flex-col">
            <div class="flex-shrink-0 h-16 px-6 border-b border-gray-200 flex items-center">
              <p class="text-lg font-medium text-gray-900">{{__('Manage Settings')}}</p>
            </div>
            <div class="flex-1 min-h-0 overflow-y-auto">
              <!-- Current: "bg-gray-200 bg-opacity-50", Default: "hover:bg-gray-200 hover:bg-opacity-50" -->
              <a href="{{route('admin.settings.index')}}" class="{{(request()->routeIs('admin.settings.*'))?'bg-gray-200 bg-opacity-50':'hover:bg-gray-200 hover:bg-opacity-50'}} flex p-4 border-b border-gray-200" aria-current="page">
                <!-- Heroicon name: outline/cog -->
                <svg class="flex-shrink-0 -mt-0.5 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <div class="ml-3 text-sm">
                  <p class="font-medium text-gray-900">{{__('General')}}</p> 
                </div>
              </a>    
            </div>
          </nav>

          <!-- Main content -->
          <div class="flex-1 overflow-hidden">
              <!-- Page Heading -->
              @isset($header)
                <header class="bg-white shadow mb-4">
                    <div class="w-full mx-auto py-3 px-4">
                      {{ $header }}
                    </div>
                </header>  
              @endisset
              <div class="p-4">
                {{ $slot }}
              </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>