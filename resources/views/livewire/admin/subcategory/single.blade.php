<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $subcategory->name }}</td>
    <td class="">{{ $subcategory->extra_text }}</td>
    <td><img class="img-fluid  rounded-circle " width="50" height="50" src="{{ asset($subcategory->cover_image) }}" alt=""></td>
    
    @if(getCrudConfig('SubCategory')->delete or getCrudConfig('SubCategory')->update)
        <td>

            @if(getCrudConfig('SubCategory')->update && hasPermission(getRouteName().'.subcategory.update', 0, 0, $subcategory))
                <a href="@route(getRouteName().'.subcategory.update', $subcategory->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('SubCategory')->delete && hasPermission(getRouteName().'.subcategory.delete', 0, 0, $subcategory))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('SubCategory') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('SubCategory') ]) }}</p>
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
