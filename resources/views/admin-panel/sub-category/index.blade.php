@extends('admin-panel.master')

@section('content')
<div class="rounded-md bg-white px-4 py-5 border-b border-gray-200 shadow-sm sm:px-6">
  <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
    <div class="ml-4 mt-2">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Sub Categories</h3>
    </div>
    <div class="ml-4 mt-2 flex-shrink-0">
      <a href="{{ route('add-sub-category') }}">
      <button type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add new sub-category</button>
      </a>
    </div>
  </div>
</div>
<div class="flex flex-col mt-4">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      @if (count($sub_categories) > 0)
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Extra Text</th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Delete</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($sub_categories as $sub_category)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $sub_category->category->name }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $sub_category->name }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $sub_category->extra_text }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('edit-sub-category', ['sub_category_id' => $sub_category->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('delete-sub-category', ['sub_category_id' => $sub_category->id]) }}" class="text-indigo-600 hover:text-indigo-900">Delete</a>
              </td>
            </tr>
            @endforeach

            <!-- More people... -->
          </tbody>
        </table>
      </div>
      @else
      <div class="shadow bg-white text-center text-lg p-4 rounded sm:rounded-md">
        No Sub Categories
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
