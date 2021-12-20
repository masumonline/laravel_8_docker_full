          <table class="table-auto w-full">
            <thead>
              <tr>
                <th>ID</th>
                <th>label</th>
              </tr>
            </thead>
            <tbody>
              @foreach($menus as $menu)
              <tr class="border">
                <td class="p-2">
                  {{ $menu->id }}
                </td>
                <td class="p-2">
                  {{ $menu->label }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>