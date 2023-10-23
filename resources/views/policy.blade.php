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
                <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">{{ App\Models\SiteSetting::first()->name ?? 'Store Name' }}</span>
                <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">PRIVACY POLICY</span>
            </h1>
        </div>
        <div class="mt-4 prose prose-indigo prose-lg text-gray-500 mx-auto">
            <ol role="list">
                <li class="mt-8 text-gray-600">Collection of Personal Information:</li>
                <p class="my-1">
                    We may collect personal information such as your name, address, email address, and phone number when you make a purchase or sign up. We will not share this information with third parties unless required by law.
                </p>
                <li class="mt-8 text-gray-600">Use of Personal Information:</li>
                <p class="my-1">
                    We use your personal information to process your orders, communicate with you about your purchases.
                </p>
                <li class="mt-8 text-gray-600">Security of Personal Information:</li>
                <p class="my-1">
                    We take reasonable measures to protect your personal information from unauthorized access or disclosure. However, no security measures are 100% effective and we cannot guarantee the security of your information.
                </p>
                <li class="mt-8 text-gray-600">Cookies:</li>
                <p class="my-1">
                    We use cookies to enhance your browsing experience and personalize your content. You may disable cookies in your browser settings if you prefer.
                </p>
                <li class="mt-8 text-gray-600">Third-Party Links:</li>
                <p class="my-1">
                    Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these websites.
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
