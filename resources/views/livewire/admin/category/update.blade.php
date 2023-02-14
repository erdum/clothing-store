<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Category') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.category.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Category')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Name Input -->
            <div class='form-group'>
                <label for='input-name' class='col-sm-2 control-label '> {{ __('Name') }}</label>
                <input type='text' id='input-name' wire:model='name' class="form-control  @error('name') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Extra_text Input -->
            <div class='form-group'>
                <label for='input-extra_text' class='col-sm-2 control-label '> {{ __('Extra_text') }}</label>
                <input type='text' id='input-extra_text' wire:model='extra_text' class="form-control  @error('extra_text') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('extra_text') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Cover_image Input -->
            <div class='form-group'>
                <label for='input-cover_image' class='col-sm-2 control-label '> {{ __('Cover_image') }}</label>
                <input type='file' id='input-cover_image' wire:model='cover_image' class="form-control-file  @error('cover_image') is-invalid @enderror">
                @if($cover_image and !$errors->has('cover_image') and $cover_image instanceof Illuminate\Http\UploadedFile and $cover_image->isPreviewable())
                    <a href="{{ $cover_image->temporaryUrl() }}" target="_blank"><img width="200" height="200" class="mt-3 img-fluid shadow" src="{{ $cover_image->temporaryUrl() }}" alt=""></a>
                @endif
                @error('cover_image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.category.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
