@extends('admin-panel.master')

@section('content')
<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Product Information</h3>
        <p class="mt-1 text-sm text-gray-600">Add all the Product details visible to the customers.</p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form id="add_product" action="{{ route('save-product') }}" method="POST">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-6 gap-6">

              <div class="col-span-6 sm:col-span-3">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="sub_category_id" class="block text-sm font-medium text-gray-700">Sub Category</label>
                <select id="sub_category_id" name="sub_category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  @foreach ($sub_categories as $sub_category)
                    <option name="{{ $sub_category->category->id }}" value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Product Title</label>
                <input type="text" required value="{{ old('name') }}" placeholder="Casual Rust T-Shirt" name="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                <input type="text" required value="{{ old('description') }}" placeholder="Upgrade your wardrobe with our Casual Rust T-Shirt and enjoy the perfect combination of style and comfort." name="description" id="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="details" class="block text-sm font-medium text-gray-700">Product Details</label>
                <div class="mt-1">
                  <textarea id="details" required name="details" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ old('details') }}</textarea>
                </div>
                <p class="mt-2 text-sm text-gray-500">Details about your product including material type, special instructions, highlights etc.</p>
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="unit_price" class="block text-sm font-medium text-gray-700">Unit Price in {{ $currency ?? 'Rs.' }}</label>
                <input type="number" required value="{{ old('unit_price') }}" placeholder="100" name="unit_price" id="unit_price" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" required value="{{ old('quantity') }}" placeholder="100" name="quantity" id="quantity" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="discount" class="block text-sm font-medium text-gray-700">Discount in %</label>
                <input type="number" required value="{{ old('discount') ?? 0 }}" placeholder="0" name="discount" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Product Gallery Images</label>
              <div id="catlog-image-container" class="mt-1 flex flex-col flex-wrap lg:flex-row items-center gap-4 mt-4">
                <div class="relative hidden" name="catlog-image">
                  <svg class="cursor-pointer absolute top-1 right-1 aspect-square w-4 before:block before:w-12 before:h-12 before:bg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                  <img class="object-cover w-full lg:w-44" style="aspect-ratio: 1/1" src="">
                </div>
              </div>
            </div>

            <div>
              <div id="catlog-image-dropbox" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span>Upload images</span>
                      <input id="images" name="product-images" type="file" accept="image/*" multiple class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                </div>
              </div>
              <p class="mt-2 text-sm text-gray-500">You can upload up to 8 images.</p>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
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

  const addImageHandler = ({ currentTarget: { files: raw_files } }) => {
    const files = Array.from(raw_files);
    files.forEach((file) => {
      const src = URL.createObjectURL(file);
      const newImage = document.querySelector("[name=catlog-image]").cloneNode(true);
      newImage.querySelector("img").setAttribute("src", src);
      newImage.classList.remove("hidden");
      document.getElementById("catlog-image-container").appendChild(newImage);
    });
  };

  const removeImageHandler = (event) => {
    const path = event.composedPath().filter(elem => elem.tagName === "svg");

    if (path.length === 0) return;

    const img = path[0].parentNode;
    URL.revokeObjectURL(img.querySelector("img").src);
    img.remove();
  };

  const handleCategoryChange = () => {
    const categoryId = document.getElementById("category_id").selectedOptions[0].value;

    const subCategoryOptions = Array.from(document.getElementById("sub_category_id").children);
    subCategoryOptions.map((option) => {

      console.log(categoryId, option.getAttribute("name"));

      if (option.getAttribute("name") != categoryId) {
        option.style.setProperty("display", "none");
      } else {
        option.style.setProperty("display", "block");
      }
    });
  };

  const handleProductSubmit = async (event) => {
    event.preventDefault();
    const formData = new FormData();
    formData.append("_token", "{{ csrf_token() }}");

    const images = Array.from(document.querySelectorAll("#catlog-image-container img"));
    images.shift();
    for (const img of images) {
      const req = await fetch(img.src);
      const blob = await req.blob();
      formData.append("images[]", blob);
    }

    const req = await fetch("{{ route('upload-product-images') }}", {
      method: "post",
      body: formData
    });

    if (req.status === 200) event.target.submit();
  };

  document.getElementById("images").addEventListener("change", addImageHandler);
  document.getElementById("catlog-image-container").addEventListener("click", removeImageHandler);

  handleCategoryChange();
  document.getElementById("category_id").addEventListener("change", handleCategoryChange);

  document.getElementById("add_product").addEventListener("submit", handleProductSubmit);
  
</script>

@endsection
