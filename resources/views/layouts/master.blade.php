<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FavIcon Link -->
    <link rel="shortcut icon" href="{{ asset('assets/site/images/favicon/favicon-32x32.png') }}" type="image/x-icon">
    <title>@yield('title', 'Clothing Store') | Apparel UBInn365</title>
    <script src="https://cdn.tailwindcss.com?plugins=aspect-ratio,forms"></script>
    <style type="text/css">
    .flyout-btn:hover .flyout {
        display: block;
        opacity: 100%;
    }
    </style>
    @yield('stylesheets')
</head>

<body>
    <div class="bg-white">
        <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <div id="mobile-sidebar-menu-overlay" class="fixed inset-0 bg-black bg-opacity-25 hidden"></div>
            <div id="mobile-sidebar-menu" class="fixed top-0 bottom-0 width-full z-40 flex transition ease-in-out duration-300 transform -translate-x-full">
                <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                    <div class="flex px-4 pt-5 pb-2">
                        <button id="mobile-menu-btn-close" type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- Links -->
                    <div class="mt-2">
                        <div class="border-b border-gray-200">
                            <div id="mobile-sidebar-tabs" class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                                @foreach (App\Models\Category::all() as $category)
                                @if (request()->is('category/' . $category->name . '/*'))
                                <button id="{{ $category->name }}-tab-btn" class="border-indigo-600 text-indigo-600 flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">{{ $category->name }}</button>
                                @else
                                <button id="{{ $category->name }}-tab-btn" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">{{ $category->name }}</button>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- 'Women' tab panel, show/hide based on tab state. -->
                        @foreach (App\Models\Category::all() as $key => $category)
                        @if ($key == 0 || request()->is($category->name . '/*'))
                        <div class="space-y-10 px-4 pt-10 pb-8 mobile-sidebar-panel tab-{{ $category->name }}" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                            @else
                            <div class="space-y-10 px-4 pt-10 pb-8 mobile-sidebar-panel tab-{{ $category->name }} hidden" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                                @endif
                                <div class="grid grid-cols-2 gap-x-4">
                                    <div class="group relative text-sm">
                                        <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                            <img src="{{ asset($category->cover_image) ?? 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg' }}" alt="{{ $category->name }}" class="object-cover object-center">
                                        </div>
                                        <a class="mt-6 block font-medium text-gray-900">
                                            <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                            {{ $category->name }}
                                        </a>
                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                    </div>
                                </div>
                                <div>
                                    @foreach ($category->sub->all() as $sub)
                                    <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">{{ $sub->name }}</p>
                                    <ul role="list" aria-labelledby="women-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                                        @foreach ($sub->products->all() as $product)
                                        <li class="flow-root">
                                            <a href="{{ route('product', ['id' => $product->id]) }}" class="-m-2 block p-2 text-gray-500">{{ $product->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="space-y-6 border-t border-gray-200 py-6 px-4">
                            <div class="flow-root">
                                <a href="{{ route('featured') }}" class="-m-2 block p-2 font-medium text-gray-900">Featured</a>
                            </div>
                            <div class="flow-root">
                                <a href="{{ route('contact-us') }}" class="-m-2 block p-2 font-medium text-gray-900">Contact Us</a>
                            </div>
                        </div>
                        @auth
                        <div class="border-t border-gray-200 py-6 px-4">
                            <a class="-m-2 flex items-center p-2">
                                <img src="{{ Auth::user()->avatar ?? asset('assets/site/images/user.jpg') }}" alt="avatar" class="block h-auto w-8 flex-shrink-0 rounded-full">
                                <span class="ml-3 block text-base font-medium text-gray-900">{{ Auth::user()->name }}</span>
                            </a>
                        </div>
                        @endauth
                        <div class="space-y-6 border-t border-gray-200 py-6 px-4">
                            <div class="flow-root">
                                @auth
                                <a href="{{ route('logout') }}" class="-m-2 block p-2 font-medium text-gray-900">Logout</a>
                                @endauth
                                @guest
                                <a href="{{ route('login') }}" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                                @endguest
                            </div>
                        </div>
                        <div class="border-t border-gray-200 py-6 px-4">
                            <a class="-m-2 flex items-center p-2">
                                <img src="{{ asset('assets/site/images/pakistan.png') }}" alt="Pakistan Flag" class="block h-auto w-8 flex-shrink-0">
                                <span class="ml-3 block text-base font-medium text-gray-900">PKR</span>
                                <span class="sr-only">, change currency</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <header class="relative bg-white">
                <!-- <p class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">Get free delivery on orders over Rs.1000</p> -->
                <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="border-b border-gray-200">
                        <div class="flex h-16 items-center">
                            <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                            <button id="mobile-menu-btn" type="button" class="rounded-md bg-white p-2 text-gray-400 lg:hidden">
                                <span class="sr-only">Open menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>
                            <!-- Logo -->
                            <div class="ml-4 flex lg:ml-0">
                                <a href="{{ route('home') }}">
                                    <span class="sr-only">Your Company</span>
                                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                                </a>
                            </div>
                            <!-- Flyout menus -->
                            <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                                <div class="flex h-full space-x-8">
                                    @foreach (App\Models\Category::all() as $category)
                                    <div class="flex flyout-btn z-40">
                                        <div class="relative flex">
                                            @if (request()->is($category->name . '/*'))
                                            <button type="button" class="border-indigo-600 text-indigo-600 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">{{ $category->name }}</button>
                                            @else
                                            <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">{{ $category->name }}</button>
                                            @endif
                                        </div>
                                        <div class="absolute inset-x-0 top-full text-sm text-gray-500 transition-all hidden flyout">
                                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                            <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>
                                            <div class="relative bg-white">
                                                <div class="mx-auto max-w-7xl px-8">
                                                    <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                                                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                                                            <div class="group relative text-base sm:text-sm">
                                                                <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                                                    <img src="{{ asset($category->cover_image) ?? 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg' }}" alt="{{ $category->name }}" class="object-cover object-center">
                                                                </div>
                                                                <a href="{{ route('home', ['category' => $category->name]) }}" class="mt-6 block font-medium text-gray-900">
                                                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                                                    New Arrivals
                                                                </a>
                                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                                            </div>
                                                        </div>
                                                        <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                                                            @foreach ($category->sub->all() as $sub)
                                                            <div>
                                                                <p id="Clothing-heading" class="font-medium text-gray-900">{{ $sub->name }}</p>
                                                                <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                    @foreach ($sub->products->all() as $product)
                                                                    <li class="flex">
                                                                        <a href="{{ route('product', ['id' => $product->id]) }}" class="hover:text-gray-800">{{ $product->name }}</a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <a href="{{ route('featured') }}" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Featured</a>
                                    <a href="{{ route('contact-us') }}" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Contact Us</a>
                                </div>
                            </div>
                            <div class="ml-auto flex items-center">
                                <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                    @auth
                                    <a href="{{ route('logout') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Logout</a>
                                    @endauth
                                    @guest
                                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
                                    @endguest
                                    <span class="h-6 w-px bg-gray-200 block" aria-hidden="true"></span>
                                </div>
                                <div class="hidden lg:ml-6 lg:flex">
                                    <a title="Selected Currency" class="flex items-center text-gray-700 hover:text-gray-800">
                                        <img src="{{ asset('assets/site/images/pakistan.png') }}" alt="Pakistan Flag" class="block h-auto w-8 flex-shrink-0">
                                        <span class="ml-3 block text-sm font-medium">PKR</span>
                                        <span class="sr-only">, change currency</span>
                                    </a>
                                </div>
                                <!-- Search -->
                                <!-- <div class="flex lg:ml-6">
                                <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Search</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </a>
                            </div> -->
                                <!-- Cart -->
                                @auth
                                <div class="hidden lg:ml-6 lg:flex">
                                    <a href="{{ route('order') }}" title="Orders History" class="flex items-center text-gray-700 hover:text-gray-800">
                                        <img src="{{ Auth::user()->avatar ?? asset('assets/site/images/user.jpg') }}" alt="avatar" class="block h-auto w-8 flex-shrink-0 rounded-full">
                                        <span class="ml-3 block text-sm font-medium">{{ Auth::user()->name }}</span>
                                    </a>
                                </div>
                                @endauth
                                <div class="ml-4 flow-root lg:ml-6">
                                    <a id="sidebar-cart-btn" title="Your Cart" class="group -m-2 flex items-center p-2 cursor-pointer">
                                        <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                        @auth
                                        <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ Auth::user()
                                                ->in_cart_items
                                                ->sum(function($item) {
                                                    return $item->quantity;
                                                });
                                        }}</span>
                                        @endauth
                                        @guest
                                        <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                        @endguest
                                        <span class="sr-only">items in cart, view bag</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <!-- Sidebar Cart -->
        <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div id="sidebar-cart-overlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity hidden"></div>
            <div class="fixed top-0 bottom-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div id="sidebar-cart" class="pointer-events-auto w-screen max-w-md translate-x-full transform transition ease-in-out duration-500">
                            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                                <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                                        <div class="ml-3 flex h-7 items-center">
                                            <button id="sidebar-cart-close-btn" type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Close panel</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <div class="flow-root">
                                            <ul id="cart-wrapper" role="list" class="-my-6 divide-y divide-gray-200">
                                                @if (Auth::check() && Auth::user()->in_cart_items()->exists())
                                                @foreach (Auth::user()->in_cart_items as $item)
                                                <li class="flex py-6">
                                                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <img src="{{ asset($item->product->images[0]->url) }}" alt="{{ $item->product->name }}" class="h-full w-full object-cover object-center">
                                                    </div>
                                                    <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                                <h3>
                                                                    <a href="{{ route('product', ['id' => $item->product->id]) }}">{{ $item->product->name }}</a>
                                                                </h3>
                                                                <p class="ml-4">{{ $currency ?? 'Rs.' }}{{ $item->product->unit_price }}</p>
                                                            </div>
                                                            <p class="mt-1 text-sm text-gray-500">{{ $item->product->colors[0]->name }}</p>
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                            <p class="text-gray-500">Qty {{ $item->quantity }}</p>
                                                            <div class="flex">
                                                                <button id="{{ $item->id }}" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                @else
                                                <p class="text-gray-500">Your Cart is empty!</p>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <p>Subtotal</p>
                                        @auth
                                        <p>{{ $currency ?? 'Rs.' }}
                                            {{
                                                Auth::user()
                                                ->in_cart_items
                                                ->sum(function ($item) {
                                                    return ($item->quantity * $item->product->unit_price);
                                                });
                                            }}
                                        </p>
                                        @endauth
                                        @guest
                                        <p>{{ $currency ?? 'Rs.' }}0</p>
                                        @endguest
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                    <div class="mt-6">
                                        @if (Auth::check() && Auth::user()->in_cart_items()->exists())
                                        <a href="{{ route('checkout') }}" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                        @else
                                        <a class="cursor-not-allowed flex items-center justify-center rounded-md border border-transparent bg-gray-400 px-6 py-3 text-base font-medium text-white shadow-sm">Checkout</a>
                                        @endif
                                    </div>
                                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                        <p>
                                            need help?
                                            <a href="{{ route('contact-us') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                Contact us
                                                <span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="fixed bottom-0 inset-x-0 pb-2 sm:pb-5">
          <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="p-2 rounded-lg bg-indigo-600 shadow-lg sm:p-3">
              <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
                  <span class="flex p-2 rounded-lg bg-indigo-800">
                    <!-- Heroicon name: outline/speakerphone -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                  </span>
                  <p class="ml-3 font-medium text-white truncate">
                    <span class="md:hidden"> We announced a new product! </span>
                    <span class="hidden md:inline"> Big news! We're excited to announce a brand new product. </span>
                  </p>
                </div>
                <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                  <a href="#" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50"> Learn more </a>
                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                  <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white">
                    <span class="sr-only">Dismiss</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        @yield('content')

        <!-- This example requires Tailwind CSS v2.0+ -->
        <footer class="bg-white">
          <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center space-x-6 md:order-2">
              <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Facebook</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                </svg>
              </a>

              <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Instagram</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
              </a>

              <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Twitter</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                </svg>
              </a>

              <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">GitHub</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                </svg>
              </a>

              <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Dribbble</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
            <div class="mt-8 md:mt-0 md:order-1">
              <p class="text-center text-base text-gray-400">&copy; 2023 UbInn 365 Apparel. All rights reserved.</p>
            </div>
          </div>
        </footer>


        <script>
        const openMobileMenu = () => {
            const mobileSideMenu = document.getElementById("mobile-sidebar-menu");
            const mobileSideMenuOverlay = document.getElementById("mobile-sidebar-menu-overlay");
            mobileSideMenu.classList.remove("-translate-x-full");
            mobileSideMenuOverlay.classList.remove("hidden");
            mobileSideMenu.classList.add("translate-x-0");
        };

        const closeMobileMenu = () => {
            const mobileSideMenu = document.getElementById("mobile-sidebar-menu");
            const mobileSideMenuOverlay = document.getElementById("mobile-sidebar-menu-overlay");
            mobileSideMenu.classList.add("-translate-x-full");
            mobileSideMenuOverlay.classList.add("hidden");
            mobileSideMenu.classList.remove("translate-x-0");
        };

        const openSidebarCart = () => {
            const sidebarCart = document.getElementById("sidebar-cart");
            const sidebarCartOverlay = document.getElementById("sidebar-cart-overlay");
            sidebarCart.classList.remove("translate-x-full");
            sidebarCartOverlay.classList.remove("hidden");
            sidebarCart.classList.add("translate-x-0");
        };

        const closeSidebarCart = () => {
            const sidebarCart = document.getElementById("sidebar-cart");
            const sidebarCartOverlay = document.getElementById("sidebar-cart-overlay");
            sidebarCart.classList.remove("translate-x-0");
            sidebarCart.classList.add("translate-x-full");
            sidebarCartOverlay.classList.add("hidden");
        };

        const handleTabClick = ({ target: { id } }) => {
            document.querySelectorAll(".mobile-sidebar-panel").forEach(panel => panel.classList.add("hidden"));
            const key = id.split("-")[0];
            document.querySelector(`.tab-${key}`).classList.remove("hidden");
        };

        const removeItemFromCart = async (itemId) => {
            const payload = {
                action: "remove",
                id: itemId
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

        document.getElementById("mobile-menu-btn").addEventListener("click", openMobileMenu);
        document.getElementById("mobile-sidebar-menu-overlay").addEventListener("click", closeMobileMenu);
        document.getElementById("mobile-menu-btn-close").addEventListener("click", closeMobileMenu);

        document.getElementById("sidebar-cart-btn").addEventListener("click", openSidebarCart);
        document.getElementById("sidebar-cart-close-btn").addEventListener("click", closeSidebarCart);
        document.getElementById("sidebar-cart-overlay").addEventListener("click", closeSidebarCart);

        document.getElementById("mobile-sidebar-tabs").addEventListener("click", handleTabClick);
        
        document.getElementById("cart-wrapper").addEventListener("click", ({ target }) => {
            if (target.nodeName === "BUTTON") removeItemFromCart(target.id);
        });

        </script>
        @yield('scripts')
</body>

</html>
