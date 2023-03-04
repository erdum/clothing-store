<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $order->user_id }}</td>
    <td class="">{{ $order->status->name }}</td>
    <td class="">{{ $order->sub_total }}</td>
    <td class="">{{ $order->total }}</td>
    <td class="">{{ $order->discount }}</td>
    <td class="">{{ $order->tax }}</td>
    <td class="">{{ $order->delivery_charges }}</td>
    <td class="">{{ $order->payment_method }}</td>
    <td class="">{{ $order->payment_id }}</td>
    <td class="">{{ $order->shipping_method }}</td>
    <td class="">{{ $order->shipping_eta }}</td>
    <td class="">{{ $order->tracking_id }}</td>
    
    @if(getCrudConfig('Order')->delete or getCrudConfig('Order')->update)
        <td>

            @if(getCrudConfig('Order')->update && hasPermission(getRouteName().'.order.update', 1, 0, $order))
                <a href="@route(getRouteName().'.order.update', $order->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Order')->delete && hasPermission(getRouteName().'.order.delete', 1, 0, $order))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Order') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Order') ]) }}</p>
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
