<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $image->product->name }}</td>
    <td><img class="img-fluid " width="50" height="50" src="{{ asset($image->url) }}" alt=""></td>
    
    @if(getCrudConfig('Image')->delete or getCrudConfig('Image')->update)
        <td>

            @if(getCrudConfig('Image')->update && hasPermission(getRouteName().'.image.update', 1, 0, $image))
                <a href="@route(getRouteName().'.image.update', $image->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Image')->delete && hasPermission(getRouteName().'.image.delete', 1, 0, $image))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Image') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Image') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
