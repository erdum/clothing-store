@extends('layouts.master')

@section('title', $product->name)

@section('content')
<div class="bg-white">
    <div class="pt-6">
        <nav aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('home', ['category' => $product->sub_category->category->name]) }}" class="mr-2 text-sm font-medium text-gray-900">{{ $product->sub_category->category->name }}</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('home', ['category' => $product->sub_category->category->name, 'sub_category' => $product->sub_category->name ]) }}" class="mr-2 text-sm font-medium text-gray-900">{{ $product->sub_category->name }}</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>
                <li class="text-sm">
                    <a aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{ $product->name }}</a>
                </li>
            </ol>
        </nav>
        <!-- Image gallery -->
        <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
            @foreach ($product->images as $index => $image)
            @if ($index == 0)
            <div class="aspect-w-4 aspect-h-5 my-4 sm:overflow-hidden sm:rounded-lg lg:aspect-w-3 lg:aspect-h-4">
                <img src="{{ asset($image->url) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
            </div>
            @else
            <div class="aspect-w-3 aspect-h-4 my-4 hidden overflow-hidden rounded-lg lg:block">
                <img src="{{ asset($image->url) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
            </div>
            @endif
            @endforeach
        </div>
        <!-- Product info -->
        <div class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
            </div>
            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl tracking-tight text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format($product->unit_price) }}</p>
                <!-- Reviews -->
                <!-- <div class="mt-6">
                    <h3 class="sr-only">Reviews</h3>
                    <div class="flex items-center">
                        <div class="flex items-center">
                             Active: "text-gray-900", Default: "text-gray-200"
                            <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>
                            <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>
                            <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>
                            <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>
                            <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="sr-only">4 out of 5 stars</p>
                        <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117 reviews</a>
                    </div>
                </div> -->
                <form id="{{ $product->id }}" class="mt-10">
                    <!-- Colors -->
                    <div id="colors-container">
                        <h3 class="text-sm font-medium text-gray-900">Color</h3>
                        <fieldset class="mt-4">
                            <legend class="sr-only">Choose a color</legend>
                            <div class="flex items-center space-x-3">
                                @foreach ($product->colors as $index => $color)
                                @if ($index == 0)
                                <label class="ring ring-offset-1 relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                                    <input checked type="radio" name="color-choice" value="{{ $color->id }}" class="sr-only" aria-labelledby="color-choice-0-label">
                                    <span id="color-choice-0-label" class="sr-only">{{ $color->name }}</span>
                                    <span aria-hidden="true" class="h-8 w-8 bg-[{{ $color->value }}] rounded-full border border-black border-opacity-10"></span>
                                </label>
                                @else
                                <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                                    <input type="radio" name="color-choice" value="{{ $color->id }}" class="sr-only" aria-labelledby="color-choice-1-label">
                                    <span id="color-choice-1-label" class="sr-only">{{ $color->name }}</span>
                                    <span aria-hidden="true" class="h-8 w-8 bg-[{{ $color->value }}] rounded-full border border-black border-opacity-10"></span>
                                </label>
                                @endif
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                    <!-- Sizes -->
                    <div id="sizes-container" class="mt-10">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Size</h3>
                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
                        </div>
                        <fieldset class="mt-4">
                            <legend class="sr-only">Choose a size</legend>
                            <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                @foreach ($product->sizes as $index => $size)
                                @if ($index == 0)
                                <label class="border-2 border-indigo-500 group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer text-gray-900 shadow-sm">
                                    <input checked type="radio" name="size-choice" value="{{ $size->id }}" class="sr-only" aria-labelledby="size-choice-1-label">
                                    <span id="size-choice-1-label">{{ $size->name }}</span>
                                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                </label>
                                @else
                                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm group-active:border-2">
                                    <input type="radio" name="size-choice" value="{{ $size->id }}" class="sr-only" aria-labelledby="size-choice-1-label">
                                    <span id="size-choice-1-label">{{ $size->name }}</span>
                                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                </label>
                                @endif
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                    <button id="add-to-cart-btn" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to cart
                        <svg class="h-6 w-6 ml-2 flex-shrink-0 text-white group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                        </svg></button>
                </form>
            </div>
            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pb-16 lg:pr-8">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>
                    <div class="space-y-6">
                        <p class="text-base text-gray-900">{{ $product->description }}</p>
                    </div>
                </div>
                <div class="mt-10">
                    <h3 class="text-sm font-medium text-gray-900">Highlights</h3>
                    <div class="mt-4">
                        <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                            <li class="text-gray-400"><span class="text-gray-600">Hand cut and sewn locally</span></li>
                            <li class="text-gray-400"><span class="text-gray-600">Dyed with our proprietary colors</span></li>
                            <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp; pre-shrunk</span></li>
                            <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100% cotton</span></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-10">
                    <h2 class="text-sm font-medium text-gray-900">Details</h2>
                    <div class="mt-4 space-y-6">
                        <p class="text-sm text-gray-600">
                            Introducing our latest product, designed with high-quality materials to ensure durability and longevity. This product features a unique style, making it stand out from other products on the market. Whether for everyday use or special occasions, our product is a perfect addition to your collection.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const handleSizeClick = (event) => {
        const path = event.composedPath();

        path.map((item) => {

            if (item.nodeName === "LABEL") {
                event.currentTarget.querySelectorAll("label").forEach(item => item.classList.remove("border-2", "border-indigo-500"));
                item.classList.add("border-2", "border-indigo-500");
            }
        });
    };
    document.getElementById("sizes-container").addEventListener("click", handleSizeClick);

    const handleColorClick = (event) => {
        const path = event.composedPath();

        path.map((item) => {

            if (item.nodeName === "LABEL") {
                event.currentTarget.querySelectorAll("label").forEach(item => item.classList.remove("ring", "ring-offset-1"));
                item.classList.add("ring", "ring-offset-1");
            }
        });
    };
    document.getElementById("colors-container").addEventListener("click", handleColorClick);

    const handleAddToCartClick = async (event) => {
        event.preventDefault();

        const productId = document.querySelector("form").id;
        const color = document.querySelector("input[name=color-choice]:checked").value;
        const size = document.querySelector("input[name=size-choice]:checked").value;
        const payload = {
            action: "add",
            product_id: productId,
            quantity: 1,
            color_id: color,
            size_id: size
        };

        const req = await fetch("{{ route('cart') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
                "accept": "application/json"
            },
            body: JSON.stringify(payload)
        });

        if (req.status === 200) {
            location.reload();
        }
    };
    document.getElementById("add-to-cart-btn").addEventListener("click", handleAddToCartClick);
</script>
@endsection
