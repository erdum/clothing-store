<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FavIcon Link -->
    <link rel="shortcut icon" href="{{ asset('assets/site/images/favicon/favicon-32x32.png') }}" type="image/x-icon">
    <title>@yield('title', 'Admin Clothing Store') | Apparel Ub365Inn</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style type="text/css">
    .flyout-btn:hover .flyout {
        display: block;
        opacity: 100%;
    }
    </style>
    
    @yield('stylesheets')
</head>

<body class="h-full">
    <div>
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div id="mobile-menu-overlay" class="fixed inset-0 flex z-40 md:hidden transition-all ease-in-out duration-300 -translate-x-full opacity-0" role="dialog" aria-modal="true">
            <div id="mobile-menu" class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
            <div id="mobile-menu-close-btn" class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="h-8 w-auto" src="{{ asset(App\Models\SiteSetting::first()->logo) }}" alt="Logo">
                </div>
                <div class="mt-5 flex-1 h-0 overflow-y-auto">
                    <nav class="px-2 space-y-1">
                        <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                        <a href="{{ route('admin-panel') }}" class="@if (in_array(Route::currentRouteName(), ['admin-panel', 'add-product', 'edit-product'])) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-box text-gray-500 text-lg mr-4 ml-1"></i>
                            Products
                        </a>
                        <a href="{{ route('admin-categories') }}" class="@if (in_array(Route::currentRouteName(), ['admin-categories', 'add-category', 'edit-category'])) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-list-ul text-gray-500 text-lg mr-4 ml-1"></i>
                            Categories
                        </a>
                        <a href="{{ route('admin-sub-categories') }}" class="@if (in_array(Route::currentRouteName(), ['admin-sub-categories', 'add-sub-category', 'edit-sub-category'])) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-sitemap text-gray-500 text-lg mr-4 ml-1"></i>
                            Sub Categories
                        </a>
                        <a href="{{ route('admin-orders') }}" class="@if (in_array(Route::currentRouteName(), ['admin-orders', 'edit-sub-category'])) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-cart-shopping text-gray-500 text-lg mr-4 ml-1"></i>
                            Orders
                        </a>
                        <a href="{{ route('admin-site') }}" class="@if (Route::currentRouteName() == 'admin-site') bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-sliders text-gray-500 text-lg mr-4 ml-1"></i>
                            Site-settings
                        </a>
                    </nav>
                </div>
            </div>
            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>
        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 bg-white overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="h-8 w-auto" src="{{ asset(App\Models\SiteSetting::first()->logo) }}" alt="Logo">
                </div>
                <div class="mt-5 flex-grow flex flex-col">
                    <nav class="flex-1 px-2 pb-4 space-y-1">
                        <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                        <a href="{{ route('admin-panel') }}" class="@if (in_array(Route::currentRouteName(), ['admin-panel', 'add-product', 'edit-product'])) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-box text-gray-500 text-lg mr-4 ml-1"></i>
                            Products
                        </a>
                        <a href="{{ route('admin-categories') }}" class="@if (in_array(Route::currentRouteName(), ['admin-categories', 'add-category', 'edit-category'])) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-list-ul text-gray-500 text-lg mr-4 ml-1"></i>
                            Categories
                        </a>
                        <a href="{{ route('admin-sub-categories') }}" class="@if (in_array(Route::currentRouteName(), ['admin-sub-categories', 'add-sub-category', 'edit-sub-category'])) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-sitemap text-gray-500 text-lg mr-4 ml-1"></i>
                            Sub Categories
                        </a>
                        <a href="{{ route('admin-orders') }}" class="@if (in_array(Route::currentRouteName(), ['admin-orders', 'edit-sub-category'])) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-cart-shopping text-gray-500 text-lg mr-4 ml-1"></i>
                            Orders
                        </a>
                        <a href="{{ route('admin-site') }}" class="@if (Route::currentRouteName() == 'admin-site') bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fa-solid fa-sliders text-gray-500 text-lg mr-4 ml-1"></i>
                            Site-settings
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="md:pl-64 flex flex-col flex-1">
            <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button id="mobile-menu-open-btn" type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-2 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search anything</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="search-field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search anything" type="search" name="search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const openMobileMenu = () => {
            const mobileMenuOverlay = document.getElementById("mobile-menu-overlay");
            const mobileMenu = document.getElementById("mobile-menu");
            const mobileMenuCloseBtn = document.getElementById("mobile-menu-close-btn");
            
            mobileMenuOverlay.classList.remove("-translate-x-full", "opacity-0");
            mobileMenuOverlay.classList.add("translate-x-0", "opacity-100");
        };

        const closeMobileMenu = () => {
            const mobileMenuOverlay = document.getElementById("mobile-menu-overlay");
            const mobileMenu = document.getElementById("mobile-menu");
            const mobileMenuCloseBtn = document.getElementById("mobile-menu-close-btn");
            
            mobileMenuOverlay.classList.remove("translate-x-0", "opacity-100");
            mobileMenuOverlay.classList.add("-translate-x-full", "opacity-0");
        };

        document.getElementById("mobile-menu-open-btn").addEventListener("click", openMobileMenu);
        document.getElementById("mobile-menu-close-btn").addEventListener("click", closeMobileMenu);
    </script>

    @yield('scripts')
</body>

</html>
