<form id="checkout_form" action="{{ $action_url }}" method="POST">
    <input type="hidden" name="sid" value="{{ $sid }}">
    <input type="hidden" name="mode" value="2CO">
    
    <!-- Shipping Information -->
    <input type="hidden" name="ship_name" value="{{ $user->name }}">
    <input type="hidden" name="ship_street_address" value="{{ $user->shipping_address->address }}">
    <input type="hidden" name="ship_city" value="{{ $user->shipping_address->city }}">
    <input type="hidden" name="ship_state" value="{{ $user->shipping_address->state }}">
    <input type="hidden" name="ship_zip" value="{{ $user->shipping_address->postal_code }}">
    <input type="hidden" name="ship_country" value="{{ $user->shipping_address->country }}">
    
    <!-- Billing Information -->
    <input type="hidden" name="card_holder_name" value="{{ $user->name }}">
    <input type="hidden" name="street_address" value="{{ $user->shipping_address->address }}">
    <input type="hidden" name="city" value="{{ $user->shipping_address->city }}">
    <input type="hidden" name="state" value="{{ $user->shipping_address->state }}">
    <input type="hidden" name="zip" value="{{ $user->shipping_address->postal_code }}">
    <input type="hidden" name="country" value="{{ $user->shipping_address->country }}">
    <input type="hidden" name="email" value="{{ $user->email }}">
    <input type="hidden" name="phone" value="{{ $user->shipping_address->phone_number }}">

    <!-- Product Information -->
    @foreach ($products as $cart)
        <input type="hidden" name="li_{{ $loop->index }}_type" value="product">
        <input type="hidden" name="li_{{ $loop->index }}_name" value="{{ $cart->product->name }}">
        <input type="hidden" name="li_{{ $loop->index }}_price" value="{{ $cart->product->unit_price }}">
        <input type="hidden" name="li_{{ $loop->index }}_quantity" value="{{ $cart->quantity }}">
        <input type="hidden" name="li_{{ $loop->index }}_tangible" value="Y">
    @endforeach
</form>

<script>
    document.getElementById("checkout_form").submit();
</script>