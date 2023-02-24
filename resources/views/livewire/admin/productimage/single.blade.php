<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $productimage->product->name }}</td>
    <td><img class="img-fluid " width="50" height="50" src="{{ asset($productimage->ulr) }}" alt=""></td>
    
    @if(getCrudConfig('ProductImage')->delete or getCrudConfig('ProductImage')->update)
        <td>

            @if(getCrudConfig('ProductImage')->update && hasPermission(getRouteName().'.productimage.update', 0, 0, $productimage))
                <a href="@route(getRouteName().'.productimage.update', $productimage->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('ProductImage')->delete && hasPermission(getRouteName().'.productimage.delete', 0, 0, $productimage))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('ProductImage') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('ProductImage') ]) }}</p>
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
