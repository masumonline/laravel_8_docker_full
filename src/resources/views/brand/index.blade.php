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
                <a href="/brands" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Brands</a>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Index</span>
              </div>
            </li>
          </ol>
        </nav>
        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Brands</h1>
      </div>
      <div class="block sm:flex items-center md:divide-x md:divide-gray-100">
        <div class="flex items-center sm:justify-end w-full">
          <div class="hidden md:flex pl-2 space-x-1">
            <a href="{{route('brands.create')}}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
              <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
              </svg>
              Add
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto">
      <div class="p-3">{{$brands->links()}}</div>
      <div class="align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden">
          <table class="table-fixed min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
              <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  ID
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  Name
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  Logo
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  Image
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  In Home
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  Status
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  Sort
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  Updated At
                </th>
                <th scope="col" class="p-4">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($brands as $brand)
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">
                  <div class="text-sm font-normal text-gray-500">
                    {{ $brand->id }}
                  </div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> {{$brand->name}}</div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900">
                    <img class="w-48" src="{{$brand->logo}}">
                  </div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900">
                    <img class="w-48" src="{{$brand->image}}">
                  </div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> 
                    @if($brand->in_home==1) Yes @else No @endif
                  </div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> 
                    @if($brand->status==1) Active @else Inactive @endif
                  </div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> {{$brand->sort}}</div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> {{$brand->updated_at}}</div>
                </td>
                <td class="p-4 whitespace-nowrap space-x-2">
                  <a href="{{route('brands.edit', $brand->id)}}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                      <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                    </svg>
                    Edit item
                  </a>
                  <form class="inline" method="POST" action="{{route('brands.destroy', $brand->id)}}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('Are you sure you want to Delete?')" data-modal-toggle="delete-product-modal" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                      <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                      </svg>
                      Delete item
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="p-3">{{$brands->links()}}</div>
    </div>
  </div>
</x-app-layout>