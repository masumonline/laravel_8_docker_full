<x-app-layout>
  @section('jsfile')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  @endsection
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
                <a href="#" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Menu</a>
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
        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Menus</h1>
      </div>

    </div>
  </div>
  <div class="grid grid-flow-col grid-cols-4 grid-rows-1 gap-4">
    <div>
      <h3>Category</h3>
      <form action="{{route('menu.save')}}" method="post">
        @csrf
        <div class="flex flex-col mb-5">
          <label for="menus" class="mb-1 text-xs tracking-wide text-gray-600">Select Menu</label>
          <div class="relative">
            <div class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
            </div>
            <select name="menus" class="text-sm pl-10 pr-4 rounded-2xl w-full">
              @foreach($menus as $menu)
              <option value="{{$menu->id}}">{{$menu->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="flex flex-col mb-5">
          <label for="category" class="mb-1 text-xs tracking-wide text-gray-600">Select Item</label>
          <div class="relative">
            <div class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
            </div>
            <select name="category" class="text-sm pl-10 pr-4 rounded-2xl w-full">
              @foreach($categories as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
              @if ($cat->sub->count())
              @foreach($cat->sub as $sub)
              <option value="{{$sub->id}}">-- {{$sub->name}}</option>
              @if($sub->sub->count())
              @foreach($sub->sub as $ch)
              <option value="{{$ch->id}}">-- -- {{$ch->name}}</option>
              @endforeach
              @endif
              @endforeach
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="flex w-full">
          <button type="submit" class="
                  flex
                  mt-2
                  items-center
                  justify-center
                  focus:outline-none
                  text-white text-sm
                  sm:text-base
                  bg-blue-500
                  hover:bg-blue-600
                  rounded-2xl
                  py-2
                  w-full
                  transition
                  duration-150
                  ease-in
                ">
            <span class="mr-2 uppercase">Save</span>
            <span>
              <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>
          </button>
        </div>
      </form>
    </div>
    <div class="col-span-3">
      {!! Menu::render() !!}
    </div>
  </div>
  @section('script')
  {!! Menu::scripts() !!}
  @endsection
</x-app-layout>