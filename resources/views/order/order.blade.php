@extends('layouts.master')

@section('title', 'My Order #' $order->id)

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/clientDes.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="order-title">
            <h3>Order Number # <span id="uniqueId">{{ $order->id }}</span></h3>
            <h4>Status: <span id="status">{{ $order->status }}</span></h4>
        </div>
        <div class="printing">
            <i class="fa-solid fa-print"></i> Print Invoice
        </div>
        <div class="addresses">
            <span id="general">General</span>
            <div class="container-box">
                <h4>Order Info</h4>
                <div class="container-address">
                    <div class="billing-address add-main">
                        <h5>Billing Details:</h5>
                        <p class="name">Payment ID: {{ $order->payment_id }}</p>
                        <p class="email">Payment Method: {{ $order->payment_method }}</p>
                        <p class="number">Sub-Total: {{ $order->sub_total }}</p>
                        <p class="cl-address">Delivery Charges: {{ $order->delivery_charges }}</p>
                        <p class="cl-address">Tax: {{ $order->tax }}</p>
                        <p class="cl-address">Discount: {{ $order->discount }}</p>
                        <p class="cl-address">Total: {{ $order->total }}</p>
                    </div>
                    <div class="shipping-address add-main">
                        <h5>Shipping Details:</h5>
                        <p class="name">{{ $order->user->name }}</p>
                        <p class="email">{{ $order->user->email }}</p>
                        <p class="number">{{ $order->shipping_address->phone_number }}</p>
                        <p class="cl-address">{{ $order->shipping_address->address }}</p>
                        <p class="province">{{ $order->shipping_address->state }}</p>
                        <p class="country">{{ $order->shipping_address->country }}</p>
                        <p class="country">{{ $order->shipping_method }}</p>
                        <p class="name">{{ $order->tracking_id }}</p>
                        <p class="name">{{ $order->shipping_eta }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-info">
            <h4>Products</h4>
            <div class="des-product">
                <div class="main-des des">
                    <h5>Product Information:</h5>
                    <div class="products-des">
                        <img src="./images/girls-carousel/Girls_Pret_3_4.jpg" alt="product img">
                        <div class="item-des">
                            <h5>Girls Uniform Tshirt Well designed</h5>
                            <p>Product Code# <span>AJQ41232334</span></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="price-des des">
                    <h5>Price:</h5>
                    <p>Rs: <span class="pr">450</span></p>
                </div>
                <hr>
                <div class="quant des">
                    <h5>Quantity:</h5>
                    <p>1</p>
                </div>
                <hr>
                <div class="subtotal des">
                    <h5>Subtotal</h5>
                    <p>Rs: <span class="pr">450</span></p>
                </div>
            </div>
        </div>
        <!-- <div class="summary">
            <h4>Summary</h4>
            <div class="summary-box">
                <div class="pay-method method">
                    <p>Payment Method</p>
                    <p>Cash on delivery</p>
                </div>
                <div class="ship-method method">
                    <p>Shipment Method</p>
                    <p>Cash on delivery</p>
                </div>
                <div class="tracking-method method">
                    <p>Tracking Id</p>
                    <p><span id="track-num">Aj9874375987</span></p>
                </div>
                <div class="sub-total method">
                    <p>Subtotal:</p>
                    <p>Rs: <span id="sub-pr">9590</span></p>
                </div>
                <div class="shipping-cost method">
                    <p>Shipping Cost</p>
                    <p>Rs: <span id="ship-pr">350</span></p>
                </div>
                <div class="total-pr method">
                    <p>Total</p>
                    <p>Rs: <span id="sum-pr">9940</span></p>
                </div>
            </div>
        </div> -->
    </div>
@endsection

@section('scripts')
    <script>
        const print = document.querySelector(".printing");
        print.addEventListener("click", () => {
            window.print();
        })
    </script>
@endsection
