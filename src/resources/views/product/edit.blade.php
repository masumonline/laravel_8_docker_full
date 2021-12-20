@section('jsfile')
<script src="https://cdn.tiny.cloud/1/dzo0jzddbl31vt9t7om8sswzsmc0rscxo5p7pfvaxe3y5vd4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
  var editor_config = {
    path_absolute: "/",
    selector: '.tinymce',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback: function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'media?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url: cmsURL,
        title: 'Filemanager',
        width: x * 0.8,
        height: y * 0.8,
        resizable: "yes",
        close_previous: "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection
<x-app-layout>
  <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
    <div class="mb-1 w-full">
      <div class="mb-4">
        <nav class="flex mb-5" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
              <a href="{{route('dashboard')}}" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
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
                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Edit</span>
              </div>
            </li>
          </ol>
        </nav>
        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Edit products</h1>
      </div>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto">
      <div class="align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden">
          <form action="{{route('products.update',$product->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <table class="table-fixed min-w-full divide-y divide-gray-200">
              <tbody class="bg-gray-100">
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">ID</td>
                  <td class="p-4 w-4">
                    {{ $product->id }}
                    <input type="hidden" name="page" value="{{ url()->previous() }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Name</td>
                  <td class="p-4 w-4">
                    <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Name" required="" value="{{ $product->name }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Sku</td>
                  <td class="p-4 w-4">
                    <input type="text" name="sku" id="sku" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="SKU" required="" value="{{ $product->sku }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Slug</td>
                  <td class="p-4 w-4">
                    <input type="text" name="slug" id="slug" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Slug" required="" value="{{ $product->slug }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Model</td>
                  <td class="p-4 w-4">
                    <input type="text" name="model" id="model" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Model" required="" value="{{ $product->model }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Category</td>
                  <td class="p-4 w-4">
                    <input list="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" name="category_id" value=" {{$product->category->name}} ">
                    <datalist id="category" if="category">
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
                    </datalist>

                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Main Photo</td>
                  <td class="p-4 w-4">
                    <img class="max-h-44" src="{{ $product->photo }}" />
                    {{ $product->photo }}
                    <div class="flex w-full items-center justify-left bg-grey-lighter">
                      <label id="lfm" data-input="thumbnail" data-preview="holder" class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input id="thumbnail" class="hidden" type="text" name="photo" value="{{$product->photo}}">
                      </label>
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Gallery Photo</td>
                  <td class="p-4 w-4">
                    @foreach($galleries as $gallery)
                    <img class="inline-block w-64" src="{{ $gallery->photo }}">
                    @endforeach
                    <div class="flex w-full items-center justify-left bg-grey-lighter">
                      <label id="lfm2" data-input="thumbnail2" data-preview="holder" class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input id="thumbnail2" class="hidden" type="text" name="gallery" multiple>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Details</td>
                  <td class="p-4 w-4">
                    <textarea class="tinymce" name="details" rows="20">
                    {!! $product->details !!}
                    </textarea>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Status</td>
                  <td class="p-4 w-4">
                    <select name="status">
                      <optgroup label="Current Value">
                        <option value="{{$product->status}}">@if($product->status ==1) Active @elseif($product->status==2) Coming Soon @else Inactive @endif</option>
                      </optgroup>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                      <option value="2">Coming Soon</option>
                    </select>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Tag</td>
                  <td class="p-4 w-4">
                    <input type="text" name="tags" id="tags" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Ex: tag1, tag2, tag3" value="{{ $product->tags }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Features</td>
                  <td class="p-4 w-4">
                    <input type="text" name="features" id="features" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Features" value="{{ $product->features }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">SEO Meta Tag</td>
                  <td class="p-4 w-4">
                    <input type="text" name="meta_tag" id="meta_tag" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Meta Tag" value="{{ $product->meta_tag }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">SEO Meta Description</td>
                  <td class="p-4 w-4">
                    <input type="text" name="meta_description" id="meta_description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Meta Description" value="{{ $product->meta_description }}">
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Youtube</td>
                  <td class="p-4 w-4">
                    <input type="text" name="youtube" id="youtube" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Youtube Link" value="{{ $product->youtube }}">
                  </td>

                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Featured</td>
                  <td class="p-4 w-4">
                    <select name="featured">
                      <optgroup label="Current Value">
                        <option value="{{ $product->featured }}">@if($product->featured ==1) Featured @else NotFeatured @endif</option>
                      </optgroup>
                      <option value="1">Featured</option>
                      <option value="0">NotFeatured</option>
                    </select>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Brands</td>
                  <td class="p-4 w-4">
                    <select name="brands">
                      <optgroup label="Current Value">
                        <option value="{{$product->brands}}">{{$product->brands}}</option>
                      </optgroup>
                      @foreach($brands as $brand)
                      <option value="{{$brand->name}}">{{$brand->name}}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Short</td>
                  <td class="p-4 w-4">
                    <textarea class="tinymce" name="short" rows="10">
                  {!! $product->short !!}
                    </textarea>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Specification</td>
                  <td class="p-4 w-4">
                    <textarea class="tinymce" name="specification" rows="20">
                      {!! $product->specification !!}
                    </textarea>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">Current Erp Product</td>
                  <td class="p-4 w-4">
                    {!! $product->api?->name !!}
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">ERP Product List</td>
                  <td class="p-4 w-4">
                    <select class="select2-dropdown shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block p-2.5" style="width: 100%" name="livesearch"></select>
                  </td>
                </tr>
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4"></td>
                  <td class="p-4 w-4">
                    <button type="submit" data-modal-toggle="delete-product-modal" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                      <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
                      </svg>
                      Update
                    </button>
                    <button type="submit" data-modal-toggle="delete-product-modal" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center fixed bottom-10 right-10">
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
  <script type="text/javascript">
    $(document).ready(function() {
      $('.select2-dropdown').select2({
        placeholder: 'Select ERP Product',
        ajax: {
          url: '/erpdata',
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(item) {
                return {
                  text: item.name,
                  id: item.product_id
                }
              })
            };
          },
          cache: true
        }
      });
    });
  </script>
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script>
    $('#lfm').filemanager('image');
    $('#lfm2').filemanager('image');
  </script>
</x-app-layout>