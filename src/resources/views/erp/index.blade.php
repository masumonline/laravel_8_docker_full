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
                                <a href="/apiproducts" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">ERP Products</a>
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
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">ERP products</h1>
            </div>
            <div class="block sm:flex items-center md:divide-x md:divide-gray-100">
                <form class="sm:pr-3 mb-4 sm:mb-0" action="/apiproductssearch" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="mt-1 relative sm:w-64 xl:w-96">
                        <input type="text" name="name" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for products">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="p-3">{{$erps->links()}}</div>
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    ID
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Product ID
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Name
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Qty
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Price
                                </th>
                                <th scope="col" class="p-4">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($erps as $erp)
                            <tr class="hover:bg-gray-100">
                                <td class="p-4 w-4">
                                    <div class="text-sm font-normal text-gray-500">
                                        {{ $erp->id }}
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                    {{ $erp->product_id }}
                                </td>
                                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                    <div class="text-base font-semibold text-gray-900"> {{ \Illuminate\Support\Str::limit($erp->name, 55, $end='...') }}</div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                    @if($erp->status==1)
                                    Active
                                    @else
                                    Inactive
                                    @endif
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                    {{ $erp->qty }}
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                    {{ $erp->retailprice }}
                                </td>

                                <td class="p-4 whitespace-nowrap space-x-2">
                                    <form class="inline" method="POST" action="{{route('erpput', $erp->id)}}">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <input type="hidden" value="{{$erp->id}}" name="id">
                                        <button type="submit" class="text-white @if($erp->status==1) bg-red-700 hover:bg-red-800 @else bg-blue-700 hover:bg-blue-800 @endif focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            @if($erp->status==0)
                                            Active
                                            @else
                                            Deactive
                                            @endif
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-3">{{$erps->links()}}</div>
        </div>
    </div>
</x-app-layout>