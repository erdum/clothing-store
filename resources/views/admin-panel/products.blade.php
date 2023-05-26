@extends('admin-panel.master')

@section('content')
<div class="rounded-md bg-white px-4 py-5 border-b border-gray-200 shadow-sm sm:px-6">
  <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
    <div class="ml-4 mt-2">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Products</h3>
    </div>
    <div class="ml-4 mt-2 flex-shrink-0">
      <a href="{{ route('add-product') }}">
      <button type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add new product</button>
      </a>
    </div>
  </div>
</div>
<div class="flex flex-col mt-4">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sub Category</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($products as $product)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $product->sub->category->name }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $product->sub->name }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $product->images[0]->url }}">
                  </div>
                  <div class="ml-4 w-96">
                    <a href="{{ route('product', ['id' => $product->id]) }}">
                      <div class="text-sm font-medium text-gray-900 truncate">{{ $product->name }}</div>
                      <div class="text-sm text-gray-500 truncate">{{ $product->description }}</div>
                    </a>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $currency ?? 'Rs.' }}{{ $product->unit_price }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $product->quantity }}</div>
              </td>
              <!-- <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
              </td> -->
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('edit-product', ['product_id' => $product->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>
            @endforeach

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
