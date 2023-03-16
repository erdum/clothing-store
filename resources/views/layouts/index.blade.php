@extends('layouts.master')

@section('content')
<div class="bg-white">
    @foreach ($categories as $category)
    <div class="mx-auto max-w-2xl py-12 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">{{ $category->name }} Exclusive Collection</h2>
        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($category->sub->take(4)->all() as $sub)
            <div class="group relative">
                <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                    <img src="{{ asset($sub->products[0]->images[0]->url) ?? 'https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg' }}" alt="{{ $sub->products[0]->name }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="{{ route('home', ['category' => $category->name, 'sub_category' => $sub->name]) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $sub->name }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">{{ $sub->products[0]->name }}</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">Rs.{{ $sub->products[0]->unit_price }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection
