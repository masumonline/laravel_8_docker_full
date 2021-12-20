<x-app-layout>
  <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
    <div class="mb-1 w-full">
      <div class="mb-4">
        <nav class="flex mb-5" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
              <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                Home
              </a>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="/products" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Product</a>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Show</span>
              </div>
            </li>
          </ol>
        </nav>
        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Show products</h1>
      </div>
      <div class="block sm:flex items-center md:divide-x md:divide-gray-100">
        <form class="sm:pr-3 mb-4 sm:mb-0" action="#" method="GET">
          <label for="products-search" class="sr-only">Search</label>
          <div class="mt-1 relative sm:w-64 xl:w-96">
            <input type="text" name="email" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for products">
          </div>
        </form>
        <div class="flex items-center sm:justify-end w-full">
          <div class="hidden md:flex pl-2 space-x-1">
            <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
              </svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
              </svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
              </svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto">
      <div class="align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden">

          <table class="table-fixed min-w-full divide-y divide-gray-200">
            <tbody class="bg-gray-100">
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ID</td>
                <td class="p-4 w-4">{{ $product->id }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Name</td>
                <td class="p-4 w-4">
                  {{ $product->name }}
                </td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Sku</td>
                <td class="p-4 w-4">{{ $product->sku }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Slug</td>
                <td class="p-4 w-4">{{ $product->slug }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Model</td>
                <td class="p-4 w-4">{{ $product->model }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Category</td>
                <td class="p-4 w-4">{{ $product->category->name }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Main Photo</td>
                <td class="p-4 w-4">
                  <img class="w-64" src="{{ $product->photo }}">
                </td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Gallery Photo</td>
                <td class="p-4 w-4">
                  @foreach($galleries as $gallery)
                  <img class="inline-block w-64" src="{{ $gallery->photo }}">
                  @endforeach
                </td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Details</td>
                <td class="p-4 w-4">{!! $product->details !!}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Status</td>
                <td class="p-4 w-4">@if($product->status ==1) Active @else Inactive @endif </td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Tag</td>
                <td class="p-4 w-4">{{ $product->tag }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Features</td>
                <td class="p-4 w-4">{{ $product->features }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Meta Tag</td>
                <td class="p-4 w-4">{{ $product->meta_tag }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Meta Description</td>
                <td class="p-4 w-4">{{ $product->meta_description }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Youtube</td>
                <td class="p-4 w-4">{{ $product->youtube }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Featured</td>
                <td class="p-4 w-4">{{ $product->featured }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Brands</td>
                <td class="p-4 w-4">{{ $product->brands }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Short</td>
                <td class="p-4 w-4">{!! $product->short !!}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">Specification</td>
                <td class="p-4 w-4">{!! $product->specification !!}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Data ID</td>
                <td class="p-4 w-4">{{ $product->api?->id }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product ID</td>
                <td class="p-4 w-4">{{ $product->remote_data_id }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product SKU</td>
                <td class="p-4 w-4">{{ $product->api?->sku }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product QTY</td>
                <td class="p-4 w-4">{{ $product->api?->qty }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product Vendor Price</td>
                <td class="p-4 w-4">{{ $product->api?->vendorprice }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product Retail Price</td>
                <td class="p-4 w-4">{{ $product->api?->retailprice }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product Short Des</td>
                <td class="p-4 w-4">{{ $product->api?->short_des }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product Brand Name</td>
                <td class="p-4 w-4">{{ $product->api?->brand_name }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product Category Name</td>
                <td class="p-4 w-4">{{ $product->api?->category_name }}</td>
              </tr>
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">ERP Product Sub Category Name</td>
                <td class="p-4 w-4">{{ $product->api?->subCategory_name }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>