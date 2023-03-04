<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Image') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.image.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Image')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Product_id Input -->
            <div class='form-group'>
                <label for='input-product_id' class='col-sm-2 control-label '> {{ __('Product_id') }}</label>
                <select id='input-product_id' wire:model='product_id' class="form-control  @error('product_id') is-invalid @enderror">
                    @foreach(getCrudConfig('Image')->inputs()['product_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('product_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Url Input -->
            <div class='form-group'>
                <label for='input-url' class='col-sm-2 control-label '> {{ __('Url') }}</label>
                <input type='file' id='input-url' wire:model='url' class="form-control-file  @error('url') is-invalid @enderror">
                @if($url and !$errors->has('url') and $url instanceof Illuminate\Http\UploadedFile and $url->isPreviewable())
                    <a href="{{ $url->temporaryUrl() }}" target="_blank"><img width="200" height="200" class="mt-3 img-fluid shadow" src="{{ $url->temporaryUrl() }}" alt=""></a>
                @endif
                @error('url') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.image.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
