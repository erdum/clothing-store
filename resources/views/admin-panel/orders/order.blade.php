@extends('admin-panel.master')

@section('title', 'Order #' . $order->id)

@section('content')
<div class="bg-gray-50">
    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Order #{{ $order->id }}</h2>
        <form action="{{ route('save-order') }}" method="POST" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>
                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input disabled value="{{ $order->user->name }}" type="text" id="name" name="name" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <div class="mt-1">
                                <input disabled value="{{ $order->shipping_address->address }}" type="text" name="address" id="address" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <div class="mt-1">
                                <input disabled value="{{ $order->shipping_address->city }}" type="text" name="city" id="city" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <div class="mt-1">
                              <input disabled value="{{ $order->shipping_address->country }}" type="text" name="country" id="country" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                            <div class="mt-1">
                                <input disabled value="{{ $order->shipping_address->state }}" type="text" name="state" id="state" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal code</label>
                            <div class="mt-1">
                                <input disabled value="{{ $order->shipping_address->postal_code }}" type="text" name="postal_code" id="postal_code" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input disabled value="{{ $order->user->email }}" type="text" name="email" id="email" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone</label>
                            <div class="mt-1">
                                <input disabled value="{{ $order->shipping_address->phone_number }}" type="text" name="phone_number" id="phone_number" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                          <label for="order_status" class="block text-sm font-medium text-gray-700">Order Status *</label>
                          <select id="order_status" name="order_status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($order_statuses as $status)
                              <option @if ($order->status == $status) selected @endif value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                </div>
                <div class="mt-6 border-t border-gray-200 pt-6">
                    <h2 class="text-lg font-medium text-gray-900">Shipping <span class="text-sm text-gray-600 mx-1 font-normal">({{ $order->shipping_method }})</span> </h2>
                    <div class="grid grid-cols-4 mt-4">
                        <div class="col-span-4">
                            <label for="shipping_eta" class="block text-sm font-medium text-gray-700">Delivery ETA</label>
                            <div class="mt-1">
                                <input disabled type="text" id="shipping_eta" name="shipping_eta" value="{{ $order->shipping_eta }}" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 mt-4">
                        <div class="col-span-4">
                            <label for="tracking_id" class="block text-sm font-medium text-gray-700">Tracking ID *</label>
                            <div class="mt-1">
                                <input type="text" id="tracking_id" name="tracking_id" value="{{ $order->tracking_id }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Payment -->
                <div class="mt-6 border-t border-gray-200 pt-6">
                    <h2 class="text-lg font-medium text-gray-900">Payment <span class="text-sm text-gray-600 mx-1 font-normal">({{ $order->payment_method }})</span></h2>
                    <div class="grid grid-cols-4 mt-4">
                        <div class="col-span-4">
                            <label for="tid" class="block text-sm font-medium text-gray-700">Transaction ID</label>
                            <div class="mt-1">
                                <input disabled type="text" id="tid" name="tid" value="{{ $order->payment_id }}" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order summary -->
            <div class="mt-10 lg:mt-0">
                <h2 class="text-lg font-medium text-gray-900">Order summary</h2>
                <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <h3 class="sr-only">Items in your cart</h3>
                    <ul id="item-wrapper" role="list" class="divide-y divide-gray-200">
                        @foreach ($order->items as $item)
                        <li class="flex py-6 px-4 sm:px-6">
                            <div class="flex-shrink-0">
                                <img src="{{ asset($item->product->images[0]->url) }}" alt="{{ $item->product->name }}" class="w-20 rounded-md">
                            </div>
                            <div class="ml-6 flex-1 flex flex-col">
                                <div class="flex">
                                    <div class="min-w-0 flex-1">
                                        <h4 class="text-sm">
                                            <a href="{{ route('product', ['id' => $item->product->id]) }}" class="font-medium text-gray-700 hover:text-gray-800">{{ $item->product->name }}</a>
                                        </h4>
                                        <p class="mt-1 text-sm text-gray-500">{{ $item->color->name }}</p>
                                        <p class="mt-1 text-sm text-gray-500">{{ $item->size->name }}</p>
                                    </div>
                                </div>
                                <div class="flex-1 pt-2 flex items-end justify-between">
                                    <p class="mt-1 text-sm font-medium text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format(($item->quantity * $item->product->unit_price) - ($item->product->discount / 100)) }} @if ($item->product->discount > 0) <span class="text-gray-500 text-sm">( -{{ $item->product->discount }}% )</span> @endif</p>
                                    <div class="ml-4">
                                        <label for="quantity" class="sr-only">Quantity</label>
                                        <select disabled name="quantity" title="Select Quantity" class="cursor-pointer rounded-md border border-gray-300 text-base font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option selected>{{ $item->quantity }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        <!-- More products... -->
                    </ul>
                    <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Subtotal</dt>
                            <dd id="sub-total" class="text-sm font-medium text-gray-900">{{ $currency }}{{ number_format($order->sub_total) }}</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Discount
                                @if (!empty($order->discount_text))
                                    <span class="rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 ml-2">{{ $order->discount_text }}</span>
                                @endif
                            </dt>
                            <dd id="taxes" class="text-sm font-medium text-gray-900">-{{ $currency }}{{ number_format((($order->discount) / 100) * $order->sub_total) }} ( {{ $order->discount }}% )</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Tax</dt>
                            <dd id="taxes" class="text-sm font-medium text-gray-900">+{{ $currency }}{{ number_format((($order->tax) / 100) * $discounted_total) }} ( {{ $order->tax }}% )</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Delivery Charges</dt>
                            <dd id="delivery-charges" class="text-sm font-medium text-gray-900">{{ $currency }}{{ number_format($order->delivery_charges) }}</dd>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                            <dt class="text-base font-medium">Total</dt>
                            <dd id="total" class="text-base font-medium text-gray-900">{{ $currency }}{{ number_format($order->total) }}</dd>
                        </div>
                    </dl>
                    <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                        <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Update Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
