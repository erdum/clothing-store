@extends('layouts.master')

@section('content')
<div class="bg-white">

  <main>
    <!-- Hero section -->
    <div class="relative">
      <!-- Background image and overlap -->
      <div aria-hidden="true" class="hidden absolute inset-0 sm:flex sm:flex-col">
        <div class="flex-1 relative w-full bg-gray-800">
          <div class="absolute inset-0 overflow-hidden">
            <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt="" class="w-full h-full object-center object-cover">
          </div>
          <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
        </div>
        <div class="w-full bg-white h-32 md:h-40 lg:h-48"></div>
      </div>

      <div class="relative max-w-3xl mx-auto pb-96 px-4 text-center sm:pb-0 sm:px-6 lg:px-8">
        <!-- Background image and overlap -->
        <div aria-hidden="true" class="absolute inset-0 flex flex-col sm:hidden">
          <div class="flex-1 relative w-full bg-gray-800">
            <div class="absolute inset-0 overflow-hidden">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt="" class="w-full h-full object-center object-cover">
            </div>
            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
          </div>
          <div class="w-full bg-white h-48"></div>
        </div>
        <div class="relative py-32">
          <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">Mid-Season Sale</h1>
          <div class="mt-4 sm:mt-6">
            <a href="{{ route('categories') }}" class="inline-block bg-indigo-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-indigo-700">Shop Collection</a>
          </div>
        </div>
      </div>

      <section aria-labelledby="collection-heading" class="-mt-96 relative sm:mt-0">
        <h2 id="collection-heading" class="sr-only">Collections</h2>
        <div class="max-w-md mx-auto grid grid-cols-1 gap-y-6 px-4 sm:max-w-7xl sm:px-6 sm:grid-cols-3 sm:gap-y-0 sm:gap-x-6 lg:px-8 lg:gap-x-8">
          
          @foreach ($categories as $category)
            <div class="group relative h-96 bg-white rounded-lg shadow-xl sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
              <div>
                <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
                  <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                    <img src="{{ asset($category->sub[0]->products[0]->images[0]->url) }}" alt="{{ $category->name }}" class="w-full h-full object-center object-cover">
                  </div>
                  <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                </div>
                <div class="absolute inset-0 rounded-lg p-6 flex items-end">
                  <div>
                    <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                    <h3 class="mt-1 font-semibold text-white">
                      <a href="{{ route('home', ['category' => $category->name]) }}">
                        <span class="absolute inset-0"></span>
                        {{ $category->name }}
                      </a>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    </div>

    <section aria-labelledby="trending-heading">
      <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:pt-32 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
          <h2 id="favorites-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">Trending Products</h2>
          <a href="{{ route('categories') }}" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">Shop the collection<span aria-hidden="true"> &rarr;</span></a>
        </div>

        <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
          <div class="group relative">
            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-trending-product-02.jpg" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">
              <a href="#">
                <span class="absolute inset-0"></span>
                Leather Long Wallet
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Natural</p>
            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
          </div>

          <div class="group relative">
            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-trending-product-02.jpg" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">
              <a href="#">
                <span class="absolute inset-0"></span>
                Leather Long Wallet
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Natural</p>
            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
          </div>

          <div class="group relative">
            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-trending-product-02.jpg" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">
              <a href="#">
                <span class="absolute inset-0"></span>
                Leather Long Wallet
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Natural</p>
            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
          </div>

          <div class="group relative">
            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-trending-product-02.jpg" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">
              <a href="#">
                <span class="absolute inset-0"></span>
                Leather Long Wallet
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Natural</p>
            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
          </div>

          <!-- More products... -->
        </div>

        <div class="mt-8 text-sm md:hidden">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Shop the collection<span aria-hidden="true"> &rarr;</span></a>
        </div>
      </div>
    </section>

    <section aria-labelledby="perks-heading" class="bg-gray-50 border-t border-gray-200">
      <h2 id="perks-heading" class="sr-only">Our perks</h2>

      <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:px-8">
        <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-0">
          <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
            <div class="md:flex-shrink-0">
              <div class="flow-root">
                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg" alt="">
              </div>
            </div>
            <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
              <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">Free returns</h3>
              <p class="mt-3 text-sm text-gray-500">Not what you expected? Place it back in the parcel and our rider will pick it up from your doorstep.</p>
            </div>
          </div>

          <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
            <div class="md:flex-shrink-0">
              <div class="flow-root">
                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg" alt="">
              </div>
            </div>
            <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
              <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">Same day delivery</h3>
              <p class="mt-3 text-sm text-gray-500">We offer a delivery service that has never been done before. Checkout today and receive your products within hours.</p>
            </div>
          </div>

          <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
            <div class="md:flex-shrink-0">
              <div class="flow-root">
                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-gift-card-light.svg" alt="">
              </div>
            </div>
            <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
              <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">All year discount</h3>
              <p class="mt-3 text-sm text-gray-500">Looking for a deal? You can use the code &quot;ALLYEAR&quot; at checkout and get money off all year round.</p>
            </div>
          </div>

          <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
            <div class="md:flex-shrink-0">
              <div class="flow-root">
                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg" alt="">
              </div>
            </div>
            <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
              <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">For the humanity</h3>
              <p class="mt-3 text-sm text-gray-500">We’ve pledged 1% of sales to the education of orphaned children.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

</div>

@endsection
