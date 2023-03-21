@extends('layouts.master')

@section('title', 'Policy')

@section('content')
<div class="relative py-16 bg-white overflow-hidden">
    <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
        <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
            <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
            </svg>
            <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
            </svg>
            <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
            </svg>
        </div>
    </div>
    <div class="relative px-4 sm:px-6 lg:px-8">
        <div class="text-lg max-w-prose mx-auto">
            <h1>
                <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">UbInn 365 Apparel</span>
                <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">TERMS OF SERVICE</span>
            </h1>
        </div>
        <div class="mt-4 prose prose-indigo prose-lg text-gray-500 mx-auto">
            <ol role="list">
                <li class="mt-8 text-gray-600">Acceptance of Terms:</li>
                <p class="my-1">
                    By accessing or using our website, you agree to be bound by these terms and conditions.
                </p>
                <li class="mt-8 text-gray-600">Payment:</li>
                <p class="my-1">
                    Payment is due at the time of purchase. We accept all major credit cards, and Bank Transfer.
                </p>
                <li class="mt-8 text-gray-600">Shipping:</li>
                <p class="my-1">
                    Orders are typically processed within 1-2 business days and shipped via Fedex, DHL, M&P or TCS. Please allow 1-4 business days for delivery.
                </p>
                <li class="mt-8 text-gray-600">Returns and Exchanges:</li>
                <p class="my-1">
                    We accept returns and exchanges within 7 days of purchase. All items must be in new, unworn condition with the tags attached. Returns and exchanges can be made by mail. If you choose to mail your item, you will be responsible for the cost of shipping.
                </p>
                <li class="mt-8 text-gray-600">Refunds:</li>
                <p class="my-1">
                    Refunds will be issued to the original form of payment within 7 business days of receiving the returned item. Please note that shipping fees are non-refundable.
                </p>
                <li class="mt-8 text-gray-600">Sales:</li>
                <p class="my-1">
                    All sales are final. We do not offer price adjustments on previous purchases. We reserve the right to modify or cancel any promotion at any time.
                </p>
                <li class="mt-8 text-gray-600">Sizes:</li>
                <p class="my-1">
                    We offer a size chart to help you find the best fit. Please refer to our size chart before making a purchase. If you are unsure about the size, please <a href="{{ route('contact-us') }}">contact us</a> for assistance.
                </p>
            </ol>
            <h3 class="text-gray-700 mt-24">CONTACT US:</h3>
            <p class="my-1">
                If you have any questions or concerns, please <a href="{{ route('contact-us') }}">contact us.</a> We are always happy to assist you.
            </p>
            <p>Thank you for shopping with us!</p>
        </div>
    </div>
</div>
@endsection
