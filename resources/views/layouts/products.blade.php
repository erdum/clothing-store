@extends('layouts.master')

@section('title', $sub->name)

@section('content')
<div class="bg-white">
    @foreach ($sub->products as $product)
    <div class="mx-auto max-w-2xl py-12 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">{{ $sub->name }}</h2>
        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <div class="group relative">
                <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                    <img src="{{ asset($product->images[0]->url) ?? 'https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg' }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $product->name }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">{{ $product?->colors[0]->name ?? '' }}</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format($product->unit_price) }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
