<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FavIcon Link -->
    <link rel="shortcut icon" href="{{ asset('assets/site/images/favicon/favicon-32x32.png') }}" type="image/x-icon">
    <title>@yield('title', 'Clothing Store') | Apparel UBInn365</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/css">
        .flyout-btn:hover .flyout {
            display: block;
            opacity: 100%;
        }
    </style>
    @section('stylesheets')
    @show
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
                    <div class="space-y-6 border-t border-gray-200 py-6 px-4">
                        <div class="flow-root">
                            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign up / Login</a>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 py-6 px-4">
                        <a href="#" class="-m-2 flex items-center p-2">
                            <img src="{{ asset('assets/site/images/pakistan.png') }}" alt="Pakistan Flag" class="block h-auto w-8 flex-shrink-0">
                            <span class="ml-3 block text-base font-medium text-gray-900">PKR</span>
                            <span class="sr-only">, change currency</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <header class="relative bg-white">
            <p class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">Get free delivery on orders over $100</p>
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
                                    <div class="flex flyout-btn">
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
                                                                <a href="{{ $category->name }}" class="mt-6 block font-medium text-gray-900">
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
                                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign up / Login</a>
                                <span class="h-6 w-px bg-gray-200 block" aria-hidden="true"></span>
                            </div>
                            <div class="hidden lg:ml-6 lg:flex">
                                <a href="#" class="flex items-center text-gray-700 hover:text-gray-800">
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
                            <div class="ml-4 flow-root lg:ml-6">
                                <a href="#" class="group -m-2 flex items-center p-2">
                                    <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>

    <script>
        const openMobileMenu = () => {
            const mobileSideMenu = document.getElementById('mobile-sidebar-menu');
            const mobileSideMenuOverlay = document.getElementById('mobile-sidebar-menu-overlay');
            mobileSideMenu.classList.remove('-translate-x-full');
            mobileSideMenuOverlay.classList.remove('hidden');
            mobileSideMenu.classList.add('translate-x-0');
        };

        const closeMobileMenu = () => {
            const mobileSideMenu = document.getElementById('mobile-sidebar-menu');
            const mobileSideMenuOverlay = document.getElementById('mobile-sidebar-menu-overlay');
            mobileSideMenu.classList.add('-translate-x-full');
            mobileSideMenuOverlay.classList.add('hidden');
            mobileSideMenu.classList.remove('translate-x-0');
        };

        const handleTabClick = ({ target: { id } }) => {
            document.querySelectorAll('.mobile-sidebar-panel').forEach(panel => panel.classList.add('hidden'));
            const key = id.split('-')[0];
            document.querySelector(`.tab-${key}`).classList.remove('hidden');
        };

        document.getElementById('mobile-menu-btn').addEventListener('click', openMobileMenu);
        document.getElementById('mobile-sidebar-menu-overlay').addEventListener('click', closeMobileMenu);
        document.getElementById('mobile-menu-btn-close').addEventListener('click', closeMobileMenu);

        document.getElementById('mobile-sidebar-tabs').addEventListener('click', handleTabClick);
    </script>
    @section('scripts')
    @show
</body>

</html>
