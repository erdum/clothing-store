@extends('admin-panel.master')

@section('content')
<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Site Settings</h3>
        <p class="mt-1 text-sm text-gray-600">Edit all the settings and public details visible to the users.</p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form id="add_shipping_method" action="{{ route('save-product') }}" method="POST">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="grid grid-cols-6 gap-6 px-4 py-5 bg-white sm:p-6">

            <div class="col-span-6 sm:col-span-3">
              <label for="brand-name" class="block text-sm font-medium text-gray-700">Brand Name</label>
              <input type="text" required value="" name="brand-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('brand-name') border border-red-500 @enderror">
            </div>

            <div class="col-span-6">
              <label class="block text-sm font-medium text-gray-700">Brand Logo</label>
              <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-24 rounded overflow-hidden bg-gray-100">
                  <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </span>
                <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</button>
              </div>
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
              <input type="tel" required value="" name="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('phone') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="email" class="block text-sm font-medium text-gray-700">Contact Email</label>
              <input type="email" required value="" name="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('email') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook Link</label>
              <input type="url" required value="" name="facebook" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('facebook') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram Link</label>
              <input type="url" required value="" name="instagram" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('instagram') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter Link</label>
              <input type="url" required value="" name="twitter" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('twitter') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label For="youtube" Class="block Text-sm Font-medium Text-gray-700">Youtube Link</label>
              <input type="url" required value="" name="youtube" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('youtube') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="google-client-id" class="block text-sm font-medium text-gray-700">Google Client ID</label>
              <input type="text" required value="" name="google-client-id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('google-client-id') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="google-client-secret" class="block text-sm font-medium text-gray-700">Google Client Secret</label>
              <input type="text" required value="" name="google-client-secret" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('google-client-secret') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="facebook-client-id" class="block text-sm font-medium text-gray-700">Facebook Client ID</label>
              <input type="text" required value="" name="facebook-client-id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('facebook-client-id') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="facebook-client-secret" class="block text-sm font-medium text-gray-700">Facebook Client Secret</label>
              <input type="text" required value="" name="facebook-client-secret" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('facebook-client-secret') border border-red-500 @enderror">
            </div>

            <div class="col-span-6">
              <label for="about" class="block text-sm font-medium text-gray-700">Terms</label>
              <div class="mt-1">
                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">Write terms of service for your site.</p>
            </div>

            <div class="col-span-6">
              <label for="about" class="block text-sm font-medium text-gray-700">Privacy Policy</label>
              <div class="mt-1">
                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">Write privacy policy for your site.</p>
            </div>

            <h4 class="col-span-6 mt-8 text-center text-gray-400 font-medium text-lg">
              Currency and Payments
            </h4>

            <div class="col-span-6 sm:col-span-3">
              <label for="discount-text" class="block text-sm font-medium text-gray-700">Allover Store Discount Text</label>
              <input type="text" required value="" name="discount-text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('discount-text') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="discount-percentage" class="block text-sm font-medium text-gray-700">Allover Store Discount Percentage</label>
              <input type="number" required value="" name="discount-percentage" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('discount-percentage') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label For="tax" Class="block text-sm Font-medium Text-gray-700">Tax</label>
              <input type="number" required value="" name="tax" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tax') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="country" class="block text-sm font-medium text-gray-700">Store Default Currency</label>
              <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option selected value="USD">USD $</option>
                <option value="EUR">EUR</option>
                <option value="PKR">PKR Rs.</option>
              </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label For="iban" Class="block text-sm Font-medium Text-gray-700">IBAN for receiving payments</label>
              <input type="text" required value="" name="iban" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('iban') border border-red-500 @enderror">
            </div>

            <h4 class="col-span-6 mt-8 text-center text-gray-400 font-medium text-lg">
              Manage Shipping Methods
            </h4>

            <div class="col-span-6 sm:col-span-2">
              <input type="text" placeholder="Method Name (Standard)" id="shipping_method_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2 flex items-end">
              <input type="number" placeholder="Charges (300)" id="shipping_method_charges" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2 flex items-end">
              <input type="text" placeholder="ETA (1-2 days)" id="shipping_method_eta" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 flex items-end justify-end">
              <button type="button" id="add_shipping_method_btn" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add</button>
            </div>

            <div id="shipping_method_template" class="hidden">
              <div class="col-span-6 sm:col-span-2 flex items-end">
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-2">
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-2">
                <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 flex items-center justify-start px-2">
                <button type="button" class="text-indigo-600 hover:text-indigo-500" name="remove-btn">Remove</button>
              </div>
            </div>

            <h4 class="col-span-6 mt-8 text-center text-gray-400 font-medium text-lg">
              Stripe Details
            </h4>

            <div class="col-span-6 sm:col-span-2">
              <label for="stripe-secret-key" class="block text-sm font-medium text-gray-700">Stripe Secret Key</label>
              <input type="text" required value="" name="stripe-secret-key" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('stripe-secret-key') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="stripe-client-id" class="block text-sm font-medium text-gray-700">Stripe Client ID</label>
              <input type="text" required value="" name="stripe-client-id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('stripe-client-id') border border-red-500 @enderror">
            </div>

            <div class="col-span-6 sm:col-span-2">
              <label for="stripe-client-secret" class="block text-sm font-medium text-gray-700">Stripe Client Secret</label>
              <input type="text" required value="" name="stripe-client-secret" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('stripe-client-secret') border border-red-500 @enderror">
            </div>

          </div>
          <div class="px-4 py-3 bg-gray-50 sm:px-6 flex justify-between">
            <p class="text-red-500">
              @if ($errors->any())
                {{ $errors->all()[0] }}
              @endif
            </p>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script defer>

  const addShippingMethod = () => {
    const methodName = document.getElementById("shipping_method_name");
    const methodCharges = document.getElementById("shipping_method_charges");
    const methodETA = document.getElementById("shipping_method_eta");
    const template = document.getElementById("shipping_method_template");

    if (
      methodName.value === ""
      || methodCharges.value === ""
      || methodETA.value === ""
    ) return;

    const methodNameElem = template.children[0].cloneNode(true);
    const methodChargesElem = template.children[1].cloneNode(true);
    const methodETAElem = template.children[2].cloneNode(true);
    const removeBtnElem = template.children[3].cloneNode(true);

    methodNameElem.firstElementChild.setAttribute("value", methodName.value);
    methodChargesElem.firstElementChild.setAttribute("value", methodCharges.value);
    methodETAElem.firstElementChild.setAttribute("value", methodETA.value);

    methodNameElem.firstElementChild.setAttribute("name", "shipping_method_name[]");
    methodChargesElem.firstElementChild.setAttribute("name", "shipping_method_charges[]");
    methodETAElem.firstElementChild.setAttribute("name", "shipping_method_eta[]");

    methodNameElem.firstElementChild.setAttribute("readonly", "");
    methodChargesElem.firstElementChild.setAttribute("readonly", "");
    methodETAElem.firstElementChild.setAttribute("readonly", "");

    methodNameElem.setAttribute("name", methodName.value);
    methodChargesElem.setAttribute("name", methodName.value);
    methodETAElem.setAttribute("name", methodName.value);
    removeBtnElem.setAttribute("name", methodName.value);

    template.after(removeBtnElem);
    template.after(methodETAElem);
    template.after(methodChargesElem);
    template.after(methodNameElem);

    methodName.value = "";
    methodCharges.value = "";
    methodETA.value = "";
  };

  const removeShippingMethod = (event) => {
    const btn = event.composedPath()[0];

    if (btn.tagName !== "BUTTON" || btn.getAttribute("name") !== "remove-btn") return;

    const elementsToRemove = document.querySelectorAll(`[name=${btn.parentElement.getAttribute("name")}]`);
    for (elem of elementsToRemove) {
      elem.remove();
    }
  };

  document.getElementById("add_shipping_method_btn").addEventListener("click", addShippingMethod);
  document.getElementById("add_shipping_method").addEventListener("click", removeShippingMethod);

</script>

@endsection
