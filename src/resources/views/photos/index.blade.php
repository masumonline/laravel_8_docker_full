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
                <a href="/brands" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Gallery</a>
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
        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Gallerys Photo</h1>
      </div>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto">
    <div class="p-3">{{$photos->links()}}</div>
      <div class="align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden">
          <table class="table-fixed min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
              <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  ID
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  product_is
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  Photo
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                  Created At
                </th>
                <th scope="col" class="p-4">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($photos as $photo)
              <tr class="hover:bg-gray-100">
                <td class="p-4 w-4">
                  <div class="text-sm font-normal text-gray-500">
                    {{ $photo->id }}
                  </div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> {{$photo->product?->name}}</div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> 
                    <img class="w-64" src="{{$photo->photo}}">
                  </div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> {{$photo->created_at}}</div>
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                  <div class="text-base font-semibold text-gray-900"> {{$photo->updated_at}}</div>
                </td>
                <td class="p-4 whitespace-nowrap space-x-2">
                  
                  <form class="inline" method="POST" action="{{route('gallerys.destroy', $photo->id)}}">
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
      <div class="p-3">{{$photos->links()}}</div>
    </div>
  </div>
</x-app-layout>