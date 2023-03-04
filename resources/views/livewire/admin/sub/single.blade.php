<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $sub->category->name }}</td>
    <td class="">{{ $sub->name }}</td>
    <td class="">{{ $sub->extra_text }}</td>
    <td><img class="img-fluid " width="50" height="50" src="{{ asset($sub->cover_image) }}" alt=""></td>
    
    @if(getCrudConfig('Sub')->delete or getCrudConfig('Sub')->update)
        <td>

            @if(getCrudConfig('Sub')->update && hasPermission(getRouteName().'.sub.update', 1, 0, $sub))
                <a href="@route(getRouteName().'.sub.update', $sub->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Sub')->delete && hasPermission(getRouteName().'.sub.delete', 1, 0, $sub))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Sub') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Sub') ]) }}</p>
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
