@extends('admin-panel.master')

@section('content')
<div class="rounded-md bg-white px-4 py-5 border-b border-gray-200 shadow-sm sm:px-6">
  <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
    <div class="ml-4 mt-2">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Orders</h3>
    </div>
  </div>
</div>
<div class="flex flex-col mt-4">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      @if (count($orders) > 0)
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipping Address</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sub Total</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discount</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tax</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivery Charges</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Method</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment ID</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipping Method</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipping ETA</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tracking ID</th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($orders as $order)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $order->user->name }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $order->status }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $order->shipping_address->address }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ number_format($order->sub_total) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ number_format($order->discount) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ number_format($order->tax) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ number_format($order->delivery_charges) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ number_format($order->total) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $order->payment_method }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $order->payment_id }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $order->shipping_method }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $order->shipping_eta }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-40">
                <div class="text-sm text-gray-900">{{ $order->tracking_id }}</div>
              </td>
              <!-- <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
              </td> -->
              <!-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              </td> -->
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('edit-order', ['order_id' => $order->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>
            @endforeach

            <!-- More people... -->
          </tbody>
        </table>
      </div>
      @else
      <div class="shadow bg-white text-center text-lg p-4 rounded sm:rounded-md">
        No Orders
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
