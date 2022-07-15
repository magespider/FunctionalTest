<x-admin.app-layout> 
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Users</h2>
            <div>
                <a class="btn-primary" href="{{ route('admin.users.create') }}">
                    <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg> 
                    {{ __('admin.add_new') }}
                </a>
            </div>
        </div>    
    </x-slot>
    <x-admin.table-list> 
        <x-slot name="search"> 
            {!! Form::open(['method' => 'GET', 'url' => route('admin.users.index'), 'class' => 'sm:flex', 'role' => 'search'])  !!}  
                <x-admin.input id="text" class="mr-2"
                                        type="text"
                                        name="search"
                                        value="{{ request('search') }}"
                                        placeholder="Search name, email..." /> 
                <x-admin.button type="submit">{{ __('admin.search') }}</x-admin.button> 
            {!! Form::close() !!}  
        </x-slot> 

        <table>
            <thead>
                <tr>
                    <th scope="col">#</th><th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th class="th-col-action" scope="col"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr class="hover:bg-gray-100">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td> 
                        <div class="flex items-center"> 
                            <div class="hidden">
                            @if(!is_null($item->email_verified_at))
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            @endif </div>
                            <p>
                                {{ $item->email }} 
                            </p>
                        </div>
                    </td>
                    <td>{{ $item->phone }}</td>
                    <td><x-admin.status :status="$item->enabled" /></td>
                    <td>{{ $item->created_at->format('Y/m/d H:i') }}</td>
                    <td class="col-action"> 
                        <a href="{{ route('admin.users.edit', $item->id) }}" title="Edit" class="btn-light">Edit</a>
                        <x-admin.delete-button url="{{ route('admin.users.destroy', $item->id) }}" />  
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <x-slot name="pagination"> 
            {!! $users->appends(request()->query())->render() !!}
        </x-slot>
    </x-admin.table-list>   
</x-admin.app-layout>