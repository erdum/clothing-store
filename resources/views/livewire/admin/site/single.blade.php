<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $site->discount_text }}</td>
    <td class="">{{ $site->discount }}</td>
    <td class="">{{ $site->delivery_charges }}</td>
    <td class="">{{ $site->tax_charges }}</td>
    <td class="">{{ $site->currency_multiplier }}</td>
    <td class="">{{ $site->iban }}</td>
    <td class="">{{ $site->address }}</td>
    <td class="">{{ $site->phone }}</td>
    <td class="">{{ $site->email }}</td>
    <td class="">{{ $site->instagram }}</td>
    <td class="">{{ $site->facebook }}</td>
    
    @if(getCrudConfig('Site')->delete or getCrudConfig('Site')->update)
        <td>

            @if(getCrudConfig('Site')->update && hasPermission(getRouteName().'.site.update', 1, 0, $site))
                <a href="@route(getRouteName().'.site.update', $site->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Site')->delete && hasPermission(getRouteName().'.site.delete', 1, 0, $site))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Site') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Site') ]) }}</p>
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
