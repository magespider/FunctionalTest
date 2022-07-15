<div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">  
    <input type="file" class="hidden" name="{{$name}}" 
                            x-ref="{{$name}}"
                            x-on:change="
                                    photoName = $refs.{{$name}}.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.{{$name}}.files[0]);
                            " /> 
    <!-- Current Image -->
    <div class="mt-2" x-show="! photoPreview">
        @if($mode === 'create' || $image == "")
        <span class="h-12 w-12 inline-block rounded-full overflow-hidden bg-gray-100">
            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </span>
        @else
            <img src="{{ $image }}" alt="" class="rounded-sm w-44 h-24 shadow object-cover">
        @endif
    </div>
    <!-- New Image Preview -->
    <div class="mt-2" x-show="photoPreview">
        <span class="block rounded-sm w-44 h-24 shadow"
                x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
        </span>
    </div> 
    <x-admin.button class="mt-3 mr-2" type="button" x-on:click.prevent="$refs.{{ $name }}.click()">
        {{($mode === 'edit')?__('admin.change_image') : __('admin.upload_new_image')}}
    </x-admin.button>
</div>