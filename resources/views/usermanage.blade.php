<x-app-layout>

  <div class="container mx-auto sm:p-4 text-gray-900 bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6 mt-4">

      <!-- Title -->
    <h2 class="mb-4 text-2xl font-semibold leading-tight">Manage All Users</h2>
    <hr class="my-4">

      <!-- Add new User -->
    <form action="" method="get">
		  <div date-rangepicker class="flex items-center mb-2 item">
        <span class="mx-4 text-gray-700">
          <!-- <x-primary-button class="ml-2" id="adduser">
              {{ __('Add New User') }}
          </x-primary-button> -->
          <button type="button" class="ml-2  inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" id="addUser">Add New User</button>
        </span>
      </div>
    </form>


    <div class="overflow-x-auto">
      <table class="min-w-full text-xs">
        <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col class="w-26">
        </colgroup>
        <thead class="bg-gray-200 ">
          <tr class="text-left">
            <th class="p-3 font-medium text-base">ID No</th>
            <th class="p-3 font-medium text-base">Name</th>
            <th class="p-3 font-medium text-base">Email</th>
            <th class="p-3 font-medium text-base text-center">Status</th>
            <th class="p-3 font-medium text-base text-right"> </th>
          </tr>
        </thead>
				<tbody>
					@foreach ($usermanage as $us)
					  <tr class="border-b border-opacity-20 bg-white">
              <td class="p-3 font-medium text-sm">
                <p>{{ $us->id }}</p>
              </td>
              <td class="p-3 font-medium text-sm">
                <p>{{ $us->name }}</p>
              </td>
              <td class="p-3 font-medium text-sm">
                <p>{{ $us->email }}</p>
              </td>
              <td class="p-3 font-medium text-sm text-center">
                @if ($us->role == 'User Manager')
                <span class="px-3 py-1 font-semibold rounded-md bg-blue-300 text-gray-900">
                  <span>{{ $us->role }}</span>
                </span>
                @else
                <span class="px-3 py-1 font-semibold rounded-md bg-teal-400 text-gray-900">
                  <span>{{ $us->role }}</span>
                </span>
                @endif
              </td>

                <td class="p-3 font-medium text-sm text-center">
                  @if (Auth::id() == $us->id)
                  <a href="{{ route('deleteUser', ['id' => $us->id]) }}" class="ml-2 bg-gray-800 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 pointer-events-none">
                    {{ __('Remove')}}
                  </a>

                  @else
                  <a href="{{ route('deleteUser', ['id' => $us->id]) }}" class="ml-2 bg-red-800 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Remove')}}
                  </a>
                  @endif

                </td>

					  </tr>
					@endforeach
				</tbody>
			</table>
			{{ $usermanage->links() }}
		</div>
	</div>

    <div id="createUserModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-4 rounded-lg w-1/2">
            <h2 class="text-xl font-bold mb-4">Create User</h2>
            <!-- todo form action -->
            <form action="{{ route('addUser') }}" method="POST">
                @csrf
                <div class="mt-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mt-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mt-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="User Manager">User Manager</option>
                        <option value="Admin" selected>Admin</option>
                    </select>
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto">Submit</button>
                    <button type="button" id="cancelButton" class="ml-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto">Cancel</button>
                </div>
            </form>
        </div>
    </div>

  <x-slot name="scripts">
        <script>
          document.addEventListener('DOMContentLoaded', function() {
              var addUserButton = document.getElementById('addUser');
              var createUserModal = document.getElementById('createUserModal');
              var cancelButton = document.getElementById('cancelButton');

              addUserButton.addEventListener('click', function() {
                  createUserModal.classList.remove('hidden');
              });

              cancelButton.addEventListener('click', function() {
                  createUserModal.classList.add('hidden');
              });
          });

        </script>
    </x-slot>


</x-app-layout>




