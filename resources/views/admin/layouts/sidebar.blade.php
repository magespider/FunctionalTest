<!-- Static sidebar for mobile -->
<div x-show="open" class="fixed inset-0 z-40 flex md:hidden" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog" aria-modal="true" style="display: none;">
    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="open = false" aria-hidden="true">
    </div>
    <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-description="Off-canvas menu, show/hide based on off-canvas menu state." class="relative max-w-xs w-full bg-white pt-5 pb-4 flex-1 flex flex-col">
        <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Close button, show/hide based on off-canvas menu state." class="absolute top-0 right-0 -mr-12 pt-2">
            <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="open = false">
                <span class="sr-only">Close sidebar</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex-shrink-0 px-4 flex items-center">
            <a href="{{ route('admin.dashboard') }}">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
            </a> 
        </div>
        <div class="mt-5 flex-1 h-0 overflow-y-auto">
            <nav class="space-y-4 divide-y divide-gray-100">
                <div class="px-2 space-y-1"> 
                    <x-admin.nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        <svg class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        {{ __('Dashboard') }}
                    </x-admin.nav-link> 
                    <x-admin.nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">  
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        {{ __('Users') }}
                    </x-admin.nav-link>   

                    <x-admin.nav-link :href="route('admin.columns.index')" :active="request()->routeIs('admin.columns.*')">   
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        {{ __('Columns') }}
                    </x-admin.nav-link>  

                    <x-admin.nav-link :href="route('admin.cards.index')" :active="request()->routeIs('admin.cards.*')">   
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        {{ __('Cards') }}
                    </x-admin.nav-link>   
                </div>  
                <div class="px-2 mt-6 pt-6"> 
                    <x-admin.nav-link :href="route('admin.settings.index')" :active="request()->routeIs('admin.settings.*') || request()->routeIs('admin.main-categories.*') || request()->routeIs('admin.strengths.*') || request()->routeIs('admin.manufacturers.*') || request()->routeIs('admin.shipping-methods.*') || request()->routeIs('admin.countries.*') || request()->routeIs('admin.states.*')"> 
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ __('Settings') }}
                    </x-admin.nav-link>  
                </div> 
            </nav>
        </div>
    </div>
    <div class="flex-shrink-0 w-14">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
</div>
<!-- Static sidebar for desktop -->
<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0 bg-white"> 
    <!-- Sidebar component, swap this element with another sidebar if you like --> 
    <div class="border-r border-gray-200 pb-4 flex flex-col flex-grow overflow-y-auto"> 
        <div class="flex h-16 items-center flex-shrink-0 px-4 border-b border-gray-200"> 
            <a href="{{ route('admin.dashboard') }}" class="admin_logo">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
            </a> 
            <h2 class="text-sm ml-3">Admin</h2> 
        </div>
        <div class="flex-grow flex flex-col">
            <nav class="mt-5 flex-1 bg-white space-y-4 divide-y divide-gray-100"> 
                <div class="px-2 space-y-1">
                    <x-admin.nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        <svg class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        {{ __('Dashboard') }}
                    </x-admin.nav-link> 
                    <x-admin.nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">  
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        {{ __('Users') }}
                    </x-admin.nav-link>  
                    
                    <x-admin.nav-link :href="route('admin.columns.index')" :active="request()->routeIs('admin.columns.*')">   
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        {{ __('Columns') }}
                    </x-admin.nav-link>  

                    <x-admin.nav-link :href="route('admin.cards.index')" :active="request()->routeIs('admin.cards.*')">   
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        {{ __('Cards') }}
                    </x-admin.nav-link>  
                </div>
                <div class="px-2 mt-6 pt-6"> 
                    <x-admin.nav-link :href="route('admin.settings.index')" :active="request()->routeIs('admin.settings.*') || request()->routeIs('admin.main-categories.*') || request()->routeIs('admin.strengths.*') || request()->routeIs('admin.manufacturers.*') || request()->routeIs('admin.shipping-methods.*') || request()->routeIs('admin.countries.*') || request()->routeIs('admin.states.*')"> 
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ __('Settings') }}
                    </x-admin.nav-link> 
                </div>
            </nav>
        </div>
    </div> 
</div>