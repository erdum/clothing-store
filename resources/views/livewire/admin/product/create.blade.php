<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Product') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.product.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Product')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Sub_id Input -->
            <div class='form-group'>
                <label for='input-sub_id' class='col-sm-2 control-label '> {{ __('Sub_id') }}</label>
                <select id='input-sub_id' wire:model='sub_id' class="form-control  @error('sub_id') is-invalid @enderror">
                    @foreach(getCrudConfig('Product')->inputs()['sub_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('sub_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Name Input -->
            <div class='form-group'>
                <label for='input-name' class='col-sm-2 control-label '> {{ __('Name') }}</label>
                <input type='text' id='input-name' wire:model='name' class="form-control  @error('name') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Description Input -->
            <div class='form-group'>
                <label for='input-description' class='col-sm-2 control-label '> {{ __('Description') }}</label>
                <input type='text' id='input-description' wire:model='description' class="form-control  @error('description') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Unit_price Input -->
            <div class='form-group'>
                <label for='input-unit_price' class='col-sm-2 control-label '> {{ __('Unit_price') }}</label>
                <input type='number' id='input-unit_price' wire:model='unit_price' class="form-control  @error('unit_price') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('unit_price') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Discount Input -->
            <div class='form-group'>
                <label for='input-discount' class='col-sm-2 control-label '> {{ __('Discount') }}</label>
                <input type='number' id='input-discount' wire:model='discount' class="form-control  @error('discount') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('discount') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Quantity Input -->
            <div class='form-group'>
                <label for='input-quantity' class='col-sm-2 control-label '> {{ __('Quantity') }}</label>
                <input type='number' id='input-quantity' wire:model='quantity' class="form-control  @error('quantity') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('quantity') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.product.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
