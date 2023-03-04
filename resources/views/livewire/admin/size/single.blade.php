<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $size->product->name }}</td>
    <td class="">{{ $size->name }}</td>
    
    @if(getCrudConfig('Size')->delete or getCrudConfig('Size')->update)
        <td>

            @if(getCrudConfig('Size')->update && hasPermission(getRouteName().'.size.update', 1, 0, $size))
                <a href="@route(getRouteName().'.size.update', $size->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Size')->delete && hasPermission(getRouteName().'.size.delete', 1, 0, $size))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Size') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Size') ]) }}</p>
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
