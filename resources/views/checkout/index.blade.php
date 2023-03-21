@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
<div class="bg-gray-50">
    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Checkout</h2>
        <form action="{{ route('post_checkout') }}" method="POST" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
            @csrf
            <div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>
                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name *</label>
                            <div class="mt-1">
                                <input maxlength="30" required value="{{ $user->name ?? '' }}" type="text" id="name" name="name" autocomplete="given-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address *</label>
                            <div class="mt-1">
                                <input required value="{{ $user->shipping_address->address ?? '' }}" type="text" name="address" id="address" autocomplete="street-address" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="apartment" class="block text-sm font-medium text-gray-700">Apartment, suite, etc.</label>
                            <div class="mt-1">
                                <input type="text" name="apartment" id="apartment" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City *</label>
                            <div class="mt-1">
                                <input maxlength="30" required value="{{ $user->shipping_address->city ?? '' }}" type="text" name="city" id="city" autocomplete="address-level2" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country *</label>
                            <div class="mt-1">
                                <select id="country" required name="country" autocomplete="country-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($countries_of_opreations as $country)
                                    @if ($user->shipping_address?->country == $country)
                                    <option selected value="{{ $country }}" >{{ $country }}</option>
                                    @else
                                    <option value="{{ $country }}" >{{ $country }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                            <div class="mt-1">
                                <input maxlength="30" value="{{ $user->shipping_address->state ?? '' }}" type="text" name="state" id="state" autocomplete="address-level1" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal code *</label>
                            <div class="mt-1">
                                <input maxlength="10" required value="{{ $user->shipping_address->postal_code ?? '' }}" type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone *</label>
                            <div class="mt-1">
                                <input maxlength="20" required value="{{ $user->shipping_address->phone_number ?? '' }}" type="text" name="phone_number" id="phone_number" autocomplete="tel" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 border-t border-gray-200 pt-10">
                    <fieldset>
                        <legend class="text-lg font-medium text-gray-900">Delivery method</legend>
                        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <label class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                                <input checked type="radio" name="shipping_method" value="Standard" class="sr-only" aria-labelledby="delivery_method_0_label" aria-describedby="delivery-method-0-description-0 delivery-method-0-description-1">
                                <div class="flex-1 flex">
                                    <div class="flex flex-col">
                                        <span id="delivery_method_0_label" class="block text-sm font-medium text-gray-900"> Standard </span>
                                        <span id="delivery-method-0-description-0" class="mt-1 flex items-center text-sm text-gray-500"> 1-4 business days </span>
                                        <span id="delivery-method-0-description-1" class="mt-6 text-sm font-medium text-gray-900"> {{ $currency ?? 'Rs.' }}{{ $delivery_charges }} </span>
                                    </div>
                                </div>
                                <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                            </label>
                            <!--
                Checked: "border-transparent", Not Checked: "border-gray-300"
                Active: "ring-2 ring-indigo-500"
              -->
                            <!-- <label class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                                <input type="radio" name="delivery-method" value="Express" class="sr-only" aria-labelledby="delivery-method-1-label" aria-describedby="delivery-method-1-description-0 delivery-method-1-description-1">
                                <div class="flex-1 flex">
                                    <div class="flex flex-col">
                                        <span id="delivery-method-1-label" class="block text-sm font-medium text-gray-900"> Express </span>
                                        <span id="delivery-method-1-description-0" class="mt-1 flex items-center text-sm text-gray-500"> 2–5 business days </span>
                                        <span id="delivery-method-1-description-1" class="mt-6 text-sm font-medium text-gray-900"> $16.00 </span>
                                    </div>
                                </div> -->
                                <!--
                  Not Checked: "hidden"

                  Heroicon name: solid/check-circle
                -->
                                <!-- <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg> -->
                                <!--
                  Active: "border", Not Active: "border-2"
                  Checked: "border-indigo-500", Not Checked: "border-transparent"
                -->
                                <!-- <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div> -->
                            <!-- </label> -->
                        </div>
                    </fieldset>
                </div>
                <!-- Payment -->
                <div class="mt-10 border-t border-gray-200 pt-10">
                    <h2 class="text-lg font-medium text-gray-900">Payment</h2>
                    <fieldset class="mt-4">
                        <legend class="sr-only">Payment type</legend>
                        <div id="payment-method-wrapper" class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                            <div class="flex items-center cursor-pointer">
                                <input selected value="Credit Card" id="credit-card" name="payment_method" type="radio" checked class="focus:ring-indigo-500 cursor-pointer h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="credit-card" class="ml-3 block text-sm font-medium text-gray-700"> Credit card </label>
                            </div>
                            <div class="flex items-center">
                                <input value="Bank Transfer" id="bank-transfer" name="payment_method" type="radio" class="focus:ring-indigo-500 cursor-pointer h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="etransfer" class="ml-3 block text-sm font-medium text-gray-700"> Bank Transfer </label>
                            </div>
                        </div>
                    </fieldset>
                    <div id="credit-card-wrapper" class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                        <div class="col-span-4">
                            <label for="card_number" class="block text-sm font-medium text-gray-700">Card number *</label>
                            <div class="mt-1">
                                <input required value="{{ $user->shipping_address->card_number ?? '' }}" type="number" id="card_number" name="card_number" autocomplete="cc-number" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="col-span-4">
                            <label for="name_on_card" class="block text-sm font-medium text-gray-700">Name on card *</label>
                            <div class="mt-1">
                                <input required value="{{ $user->shipping_address->name_on_card ?? '' }}" type="text" id="name_on_card" name="name_on_card" autocomplete="cc-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="col-span-3">
                            <label for="card_expiry" class="block text-sm font-medium text-gray-700">Expiration date (MM/YY) *</label>
                            <div class="mt-1">
                                <input required value="{{ $user->shipping_address->card_expiry ?? '' }}" type="month" name="card_expiry" id="card_expiry" autocomplete="cc-exp" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="cvc" class="block text-sm font-medium text-gray-700">CVC *</label>
                            <div class="mt-1">
                                <input required value="{{ $user->shipping_address->cvc ?? '' }}" type="number" name="cvc" id="cvc" autocomplete="csc" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                    <div id="bank-transfer-wrapper" class="hidden mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                        <div class="col-span-4">
                            <span class="mt-4 px-4 py-2 rounded-md text-gray-700 bg-gray-200">
                                {{ App\Models\Site::first()->iban }}
                            </span>
                            <p class="text-gray-700 mt-6">
                                Transfer the total amount to the above IBAN number and attach the Transaction ID below and confirm the order.
                            </p>
                        </div>
                        <div class="col-span-4">
                            <label for="tid" class="block text-sm font-medium text-gray-700">Transaction ID *</label>
                            <div class="mt-1">
                                <input required type="text" id="tid" name="tid" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order summary -->
            <div class="mt-10 lg:mt-0">
                <h2 class="text-lg font-medium text-gray-900">Order summary</h2>
                <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <h3 class="sr-only">Items in your cart</h3>
                    <ul id="item-wrapper" role="list" class="divide-y divide-gray-200">
                        @foreach ($cart as $item)
                        <li class="flex py-6 px-4 sm:px-6">
                            <div class="flex-shrink-0">
                                <img src="{{ asset($item->product->images[0]->url) }}" alt="{{ $item->product->name }}" class="w-20 rounded-md">
                            </div>
                            <div class="ml-6 flex-1 flex flex-col">
                                <div class="flex">
                                    <div class="min-w-0 flex-1">
                                        <h4 class="text-sm">
                                            <a href="{{ route('product', ['id' => $item->product->id]) }}" class="font-medium text-gray-700 hover:text-gray-800">{{ $item->product->name }}</a>
                                        </h4>
                                        <p class="mt-1 text-sm text-gray-500">{{ $item->color->name }}</p>
                                        <p class="mt-1 text-sm text-gray-500">{{ $item->size->name }}</p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0 flow-root">
                                        <a data-item-id="{{ $item->id }}" title="Remove item from cart" class="cursor-pointer -m-2.5 bg-white p-2.5 flex items-center justify-center text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Remove</span>
                                            <!-- Heroicon name: solid/trash -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex-1 pt-2 flex items-end justify-between">
                                    <p class="mt-1 text-sm font-medium text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format($item->quantity * $item->product->unit_price) }}</p>
                                    <div class="ml-4">
                                        <label for="quantity" class="sr-only">Quantity</label>
                                        <select onchange="handleQuantityChange(event)" data-item-id="{{ $item->id }}" name="quantity" title="Select Quantity" class="cursor-pointer rounded-md border border-gray-300 text-base font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @for ($i = 1; $i <= 10; $i++)
                                            @if ($i == $item->quantity)
                                            <option selected value="{{ $i }}">{{ $i }}</option>
                                            @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        <!-- More products... -->
                    </ul>
                    <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Subtotal</dt>
                            <dd id="sub-total" class="text-sm font-medium text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format($sub_total) }}</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Delivery Charges</dt>
                            <dd id="delivery-charges" class="text-sm font-medium text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format($delivery_charges) }}</dd>
                        </div>
                        @if ($discount > 0)
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Discount
                                <span class="rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 ml-2">{{ $discount_text }}</span>
                            </dt>
                            <dd id="taxes" class="text-sm font-medium text-gray-900">-{{ $currency ?? 'Rs.' }}{{ number_format(($discount / 100) * $sub_total) }} ({{ $discount }}%)</dd>
                        </div>
                        @endif
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Taxes</dt>
                            <dd id="taxes" class="text-sm font-medium text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format($taxes) }}</dd>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                            <dt class="text-base font-medium">Total</dt>
                            <dd id="total" class="text-base font-medium text-gray-900">{{ $currency ?? 'Rs.' }}{{ number_format($total) }}</dd>
                        </div>
                    </dl>
                    <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                        <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Confirm order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const handleQuantityChange = async ({ target }) => {
        const id = target.dataset.itemId;
        const quantity = target.value;

        const payload = {
            action: "update",
            id,
            quantity
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

    document.getElementById("item-wrapper").addEventListener("click", (e) => {
        const path = e.composedPath();

        path.map((elem) => {
            
            if (elem.nodeName === "A" && elem.dataset.itemId) {
                removeItemFromCart(elem.dataset.itemId);
            }
        });
    });

    document.getElementById("payment-method-wrapper").addEventListener("click", (e) => {
        const path = e.composedPath();

        path.map((elem) => {
            
            if (elem.nodeName === "INPUT") {

                if (elem.id === "bank-transfer") {
                    document.getElementById("credit-card-wrapper").classList.add("hidden");
                    document.getElementById("bank-transfer-wrapper").classList.remove("hidden");
                } else {
                    document.getElementById("credit-card-wrapper").classList.remove("hidden");
                    document.getElementById("bank-transfer-wrapper").classList.add("hidden");
                }
            }
        });
    });
</script>
@endsection
