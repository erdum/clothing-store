@extends('layouts.master')

@section('title', 'Checkout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/check.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="input">
            <div class="headings">
                <h2>Getting Your Order!</h2>
                <h3>Shipment Information</h3>
            </div>
            <div class="main">
                <form action="{{ route('post_checkout') }}" method="POST">
                    @csrf
                    <div class="details">
                        <label for="first-name">Name @error('name') ({{ $message }}) @enderror</label>
                        <input class="@error('name') invalid @enderror" name="name" type="text" value="{{ $user->name ?? '' }}">
                    </div>
                    <div class="details">
                        <label for="address">Country @error('country') ({{ $message }}) @enderror</label>
                        <input class="@error('country') invalid @enderror" name="country" type="text" value="{{ $user->shipping_address->country ?? '' }}">
                    </div>
                    <div class="details">
                        <label for="city">City @error('city') ({{ $message }}) @enderror</label>
                        <input class="@error('city') invalid @enderror" name="city" type="text" value="{{ $user->shipping_address->city ?? '' }}">
                    </div>
                    <div class="details">
                        <label for="state">State @error('state') ({{ $message }}) @enderror</label>
                        <input class="@error('state') invalid @enderror" name="state" type="text" value="{{ $user->shipping_address->state ?? '' }}">
                    </div>
                    <div class="details">
                        <label for="address">Address @error('address') ({{ $message }}) @enderror</label>
                        <input class="@error('address') invalid @enderror" name="address" type="text" value="{{ $user->shipping_address->address ?? '' }}">
                    </div>
                    <div class="details">
                        <label for="zip">Postal Code @error('postal_code') ({{ $message }}) @enderror</label>
                        <input class="@error('postal_code') invalid @enderror" name="postal_code" type="text" value="{{ $user->shipping_address->postal_code ?? '' }}">
                    </div>
                    <h3>Contact Information</h3>
                    <div class="contact-info">
                        <div class="details">
                            <label for="email">Email Address @error('email') ({{ $message }}) @enderror</label>
                            <input class="@error('email') invalid @enderror" name="email" type="email" value="{{ $user->email ?? '' }}">
                        </div>
                        <div class="details">
                            <label for="number">Phone Number @error('phone_number') ({{ $message }}) @enderror</label>
                            <input class="@error('phone_number') invalid @enderror" name="phone_number" type="text" value="{{ $user->shipping_address->phone_number ?? '' }}">
                        </div>
                        <div class="details">
                            <button type="submit">Confirm Shipping Details</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="info">
            <!-- <h2>Products Detail</h2> -->
            @foreach ($user->in_cart_items as $item)
                <div class="info-main">
                    <img src="{{ asset($item->product->images[0]->url) }}" alt="{{ $item->product->name }}">
                    <div class="describe">
                        <div class="character">
                            <h3>{{ $item->product->name }}</h3>
                            <p>{{ $item->product->description }}</p>
                        </div>
                        <div class="price-each">
                            <h3><pre>Price: </pre></h3>
                            <span class="price"> <span>$</span> {{ $item->product->unit_price }}</span>
                        </div>
                        <div class="price-each">
                            <h3><pre>Quantity: </pre></h3>
                            <span class="price">{{ $item->quantity }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="price-sec">
                <div class="final">
                    <h4>Sub Total: </h4>
                    <span class="price"><span>$</span> {{ $sub_total }}</span>
                </div>
                <hr>
                <div class="final">
                    <h4>Delivery Charges: </h4>
                    <span class="price"><span>$</span> {{ $delivery_charges }}</span>
                </div>
                <hr>
                <div class="final">
                    <h4>Total: </h4>
                    <span class="price"><span>$</span> {{ $total }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
