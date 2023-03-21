<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Site')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Site')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Site')->create && hasPermission(getRouteName().'.site.create', 1, 0))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.site.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Site') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Site')->searchable())
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
                            <th scope="col" style='cursor: pointer' wire:click="sort('discount_text')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'discount_text') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'discount_text') fa-sort-amount-up ml-2 @endif'></i> {{ __('Discount_text') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('discount')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'discount') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'discount') fa-sort-amount-up ml-2 @endif'></i> {{ __('Discount') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('delivery_charges')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'delivery_charges') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'delivery_charges') fa-sort-amount-up ml-2 @endif'></i> {{ __('Delivery_charges') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('tax_charges')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'tax_charges') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'tax_charges') fa-sort-amount-up ml-2 @endif'></i> {{ __('Tax_charges') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('currency_multiplier')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'currency_multiplier') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'currency_multiplier') fa-sort-amount-up ml-2 @endif'></i> {{ __('Currency_multiplier') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('iban')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'iban') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'iban') fa-sort-amount-up ml-2 @endif'></i> {{ __('Iban') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('address')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'address') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'address') fa-sort-amount-up ml-2 @endif'></i> {{ __('Address') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('phone')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'phone') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'phone') fa-sort-amount-up ml-2 @endif'></i> {{ __('Phone') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('email')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'email') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'email') fa-sort-amount-up ml-2 @endif'></i> {{ __('Email') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('instagram')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'instagram') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'instagram') fa-sort-amount-up ml-2 @endif'></i> {{ __('Instagram') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('facebook')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'facebook') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'facebook') fa-sort-amount-up ml-2 @endif'></i> {{ __('Facebook') }} </th>
                            
                            @if(getCrudConfig('Site')->delete or getCrudConfig('Site')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sites as $site)
                            @livewire('admin.site.single', [$site], key($site->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $sites->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
