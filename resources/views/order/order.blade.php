@extends('layouts.master')

@section('title', 'Order #' . $order->id)

@section('content')
<div class="bg-white">
  <div class="max-w-3xl mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
    <div class="max-w-xl">
      <h1 class="text-sm font-semibold uppercase tracking-wide text-indigo-600">Thank you!</h1>
      <p class="mt-2 text-4xl font-extrabold tracking-tight sm:text-5xl">It's on the way!</p>
      <p class="mt-2 text-base text-gray-500">Your order #{{ $order->id }} has {{ $order->status }} and will be with you soon.</p>

      <dl class="mt-12 text-sm font-medium">
        <dt class="text-gray-900">Tracking number</dt>
        <dd class="text-indigo-600 mt-2">{{ $order->tracking_id ?? 'Your order is not dispatched yet.' }}</dd>
      </dl>
    </div>

    <div class="mt-10 border-t border-gray-200">
      <h2 class="sr-only">Your order</h2>

      <h3 class="sr-only">Items</h3>

      @foreach ($order->items as $item)
      <div class="py-10 border-b border-gray-200 flex space-x-6">
        <img src="{{ asset($item->product->images[0]->url) }}" alt="{{ $item->product->name }}" class="flex-none w-20 h-20 object-center object-cover bg-gray-100 rounded-lg sm:w-40 sm:h-40">
        <div class="flex-auto flex flex-col">
          <div>
            <h4 class="font-medium text-gray-900">
              <a href="{{ route('product', ['id' => $item->product->id]) }}">{{ $item->product->name }}</a>
            </h4>
            <p class="mt-2 text-sm text-gray-600">{{ $item->product->description }}</p>
          </div>
          <div class="mt-6 flex-1 flex items-end">
            <dl class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
              <div class="flex">
                <dt class="font-medium text-gray-900">Quantity</dt>
                <dd class="ml-2 text-gray-700">{{ $item->quantity }}</dd>
              </div>
              <div class="pl-4 flex sm:pl-6">
                <dt class="font-medium text-gray-900">Price</dt>
                <dd class="ml-2 text-gray-700">{{ $currency ?? 'Rs.' }}{{ number_format($item->product->unit_price) }} @if ($item->product->discount > 0) <span class="text-gray-500 text-sm">( -{{ $item->product->discount }}% )</span> @endif</dd>
              </div>
            </dl>
          </div>
          <div class="mt-4 text-sm flex items-end">
            <dl class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
              <div class="flex">
                <dt class="font-medium text-gray-900">Color</dt>
                <dd class="ml-2 text-gray-700">{{ $item->color->name }}</dd>
              </div>
              <div class="pl-4 flex sm:pl-6">
                <dt class="font-medium text-gray-900">Size</dt>
                <dd class="ml-2 text-gray-700">{{ $item->size->name }}</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
      @endforeach

      <div class="sm:ml-40 sm:pl-6">
        <h3 class="sr-only">Your information</h3>

        <h4 class="sr-only">Addresses</h4>
        <dl class="grid grid-cols-2 gap-x-6 text-sm py-10">
          <div>
            <dt class="font-medium text-gray-900">Shipping address</dt>
            <dd class="mt-2 text-gray-700">
              <address class="not-italic">
                <span class="block">{{ $order->shipping_address->address }}</span>
                <span class="block">{{ $order->shipping_address->country }}, {{ $order->shipping_address->city }} {{ $order->shipping_address->state }} {{ $order->shipping_address->postal_code }}</span>
              </address>
            </dd>
          </div>
          <div>
            <dt class="font-medium text-gray-900">Contact information</dt>
            <dd class="mt-2 text-gray-700">
              <address class="not-italic">
                <span class="block">{{ $order->user->name }}</span>
                <span class="block">{{ $order->user->email }}</span>
                <span class="block">{{ $order->shipping_address->phone_number }}</span>
              </address>
            </dd>
          </div>
        </dl>

        <h4 class="sr-only">Payment</h4>
        <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 text-sm py-10">
          <div>
            <dt class="font-medium text-gray-900">Payment method</dt>
            <dd class="mt-2 text-gray-700">
              <p>{{ $order->payment_method }}</p>
              <p>Payment ID: {{ $order->payment_id }}</p>
              @if ($order->payment_method == "Credit Card" && $order->shipping_address->card_number)
              <p><span aria-hidden="true">•••• </span><span class="sr-only">Ending in </span>{{ substr($order->shipping_address->card_number, -1, 4) }}</p>
              @endif
            </dd>
          </div>
          <div>
            <dt class="font-medium text-gray-900">Shipping method</dt>
            <dd class="mt-2 text-gray-700">
              <p>{{ $order->shipping_method }}</p>
              <p>{{ $order->shipping_eta }}</p>
              <p>Tracking ID: {{ $order->tracking_id ?? 'Your order is not dispatched yet' }}</p>
            </dd>
          </div>
        </dl>

        <h3 class="sr-only">Summary</h3>

        <dl class="space-y-6 border-t border-gray-200 text-sm pt-10">
          <div class="flex justify-between">
            <dt class="font-medium text-gray-900">Subtotal</dt>
            <dd class="text-gray-700">{{ $currency ?? 'Rs.' }}{{ number_format($order->sub_total) }}</dd>
          </div>
          @if ($order->discount > 0)
          <div class="flex justify-between">
            <dt class="flex font-medium text-gray-900">
              Discount
              <span class="rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 ml-2">{{ $order->discount_text }}</span>
            </dt>
            <dd class="text-gray-700">-{{ $currency ?? 'Rs.' }}{{ number_format(($order->discount / 100) * $order->sub_total) }} ({{ $order->discount }}%)</dd>
          </div>
          @endif
          <div class="flex justify-between">
            <dt class="font-medium text-gray-900">Shipping</dt>
            <dd class="text-gray-700">{{ $currency ?? 'Rs.' }}{{ number_format($order->delivery_charges) }}</dd>
          </div>
          <div class="flex justify-between">
            <dt class="font-medium text-gray-900">Taxes</dt>
            <dd class="text-gray-700">{{ $currency ?? 'Rs.' }}{{ number_format($order->tax) }}</dd>
          </div>
          <div class="flex justify-between">
            <dt class="font-medium text-gray-900">Total</dt>
            <dd class="text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format($order->total) }}</dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</div>
@endsection
