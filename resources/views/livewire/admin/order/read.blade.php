<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Order')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Order')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Order')->create && hasPermission(getRouteName().'.order.create', 1, 0))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.order.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Order') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Order')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('user_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'user_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'user_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('User_id') }} </th>
                            <th scope="col"> {{ __('Status') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('sub_total')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'sub_total') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'sub_total') fa-sort-amount-up ml-2 @endif'></i> {{ __('Sub_total') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('total')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'total') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'total') fa-sort-amount-up ml-2 @endif'></i> {{ __('Total') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('discount')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'discount') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'discount') fa-sort-amount-up ml-2 @endif'></i> {{ __('Discount') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('tax')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'tax') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'tax') fa-sort-amount-up ml-2 @endif'></i> {{ __('Tax') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('delivery_charges')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'delivery_charges') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'delivery_charges') fa-sort-amount-up ml-2 @endif'></i> {{ __('Delivery_charges') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('payment_method')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'payment_method') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'payment_method') fa-sort-amount-up ml-2 @endif'></i> {{ __('Payment_method') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('payment_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'payment_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'payment_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Payment_id') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('shipping_method')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'shipping_method') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'shipping_method') fa-sort-amount-up ml-2 @endif'></i> {{ __('Shipping_method') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('shipping_eta')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'shipping_eta') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'shipping_eta') fa-sort-amount-up ml-2 @endif'></i> {{ __('Shipping_eta') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('tracking_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'tracking_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'tracking_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Tracking_id') }} </th>
                            
                            @if(getCrudConfig('Order')->delete or getCrudConfig('Order')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            @livewire('admin.order.single', [$order], key($order->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $orders->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
