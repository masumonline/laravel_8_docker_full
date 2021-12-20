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
                <a href="/payments" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Payments</a>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Create</span>
              </div>
            </li>
          </ol>
        </nav>
        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Create Payment</h1>
      </div>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto">
      <div class="align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden">
          <form method="post" action="{{route('payments.store')}}">
            @csrf
            <table class="table-fixed min-w-full divide-y divide-gray-200">
              <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> Title</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Title" value="">
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> subtitle</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="subtitle" id="subtitle" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Sub Title" value="">
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> details</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="details" id="details" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Details" value="">
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> url</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="url" id="url" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="url" value="">
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> sandurl</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="sandurl" id="sandurl" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="sandurl" value="">
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> Status</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <select name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> option</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <select name="option">
                        <option value="1">Live</option>
                        <option value="0">Sandbox</option>
                      </select>
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> access_code</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="access_code" id="access_code" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="access_code" value="">
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> shop_id</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="shop_id" id="shop_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="shop_id" value="">
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> Short name</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="short_name" id="short_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="short_name" value="">
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900"> secret_key</div>
                  </td>
                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">
                      <input type="text" name="secret_key" id="secret_key" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="secret_key" value="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="p-4 whitespace-nowrap space-x-2">
                    <button type="submit" data-modal-toggle="delete-product-modal" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                      <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
                      </svg>
                      Update
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>