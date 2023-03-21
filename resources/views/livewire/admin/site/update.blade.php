<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Site') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.site.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Site')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Discount_text Input -->
            <div class='form-group'>
                <label for='input-discount_text' class='col-sm-2 control-label '> {{ __('Discount_text') }}</label>
                <input type='text' id='input-discount_text' wire:model='discount_text' class="form-control  @error('discount_text') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('discount_text') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Discount Input -->
            <div class='form-group'>
                <label for='input-discount' class='col-sm-2 control-label '> {{ __('Discount') }}</label>
                <input type='number' id='input-discount' wire:model='discount' class="form-control  @error('discount') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('discount') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Delivery_charges Input -->
            <div class='form-group'>
                <label for='input-delivery_charges' class='col-sm-2 control-label '> {{ __('Delivery_charges') }}</label>
                <input type='number' id='input-delivery_charges' wire:model='delivery_charges' class="form-control  @error('delivery_charges') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('delivery_charges') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Tax_charges Input -->
            <div class='form-group'>
                <label for='input-tax_charges' class='col-sm-2 control-label '> {{ __('Tax_charges') }}</label>
                <input type='number' id='input-tax_charges' wire:model='tax_charges' class="form-control  @error('tax_charges') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('tax_charges') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Currency_multiplier Input -->
            <div class='form-group'>
                <label for='input-currency_multiplier' class='col-sm-2 control-label '> {{ __('Currency_multiplier') }}</label>
                <input type='number' id='input-currency_multiplier' wire:model='currency_multiplier' class="form-control  @error('currency_multiplier') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('currency_multiplier') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Iban Input -->
            <div class='form-group'>
                <label for='input-iban' class='col-sm-2 control-label '> {{ __('Iban') }}</label>
                <input type='text' id='input-iban' wire:model='iban' class="form-control  @error('iban') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('iban') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Address Input -->
            <div class='form-group'>
                <label for='input-address' class='col-sm-2 control-label '> {{ __('Address') }}</label>
                <input type='text' id='input-address' wire:model='address' class="form-control  @error('address') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('address') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Phone Input -->
            <div class='form-group'>
                <label for='input-phone' class='col-sm-2 control-label '> {{ __('Phone') }}</label>
                <input type='text' id='input-phone' wire:model='phone' class="form-control  @error('phone') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('phone') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Email Input -->
            <div class='form-group'>
                <label for='input-email' class='col-sm-2 control-label '> {{ __('Email') }}</label>
                <input type='email' id='input-email' wire:model='email' class="form-control  @error('email') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('email') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Instagram Input -->
            <div class='form-group'>
                <label for='input-instagram' class='col-sm-2 control-label '> {{ __('Instagram') }}</label>
                <input type='text' id='input-instagram' wire:model='instagram' class="form-control  @error('instagram') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('instagram') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Facebook Input -->
            <div class='form-group'>
                <label for='input-facebook' class='col-sm-2 control-label '> {{ __('Facebook') }}</label>
                <input type='text' id='input-facebook' wire:model='facebook' class="form-control  @error('facebook') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('facebook') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.site.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
