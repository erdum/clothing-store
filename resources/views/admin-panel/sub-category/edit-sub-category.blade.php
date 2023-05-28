@extends('admin-panel.master')

@section('content')
<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Sub Category Information</h3>
        <p class="mt-1 text-sm text-gray-600">Edit all the listing sub-categories.</p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{ route('save-sub-category') }}" method="POST">
        @csrf
        <input type="hidden" name="sub_category_id" value="{{ $sub_category->id }}">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-6 gap-6">

              <div class="col-span-6 sm:col-span-3">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category*</label>
                <select required id="category_id" name="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  @foreach ($categories as $category)
                    @if ($category->id == $sub_category->category_id)
                      <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                    @else
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Sub Category Name*</label>
                <input required type="text" placeholder="Men" name="name" value="{{ $sub_category->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border border-red-500 @enderror">
              </div>

              <div class="col-span-6">
                <label for="extra_text" class="block text-sm font-medium text-gray-700">Extra Text*</label>
                <input required type="text" placeholder="Upgrade your wardrobe with our stylish Men's collection." name="extra_text" value="{{ $sub_category->extra_text }}" id="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

            </div>
        </div>
          <div class="px-4 py-3 bg-gray-50 sm:px-6 flex justify-between">
            <p class="text-red-500">
              @error('name')
                {{ $message }}
              @enderror
            </p>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection
