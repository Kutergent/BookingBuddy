<x-app-layout>

    <!-- component -->
    <div class="min-h-screen p-6 flex items-center justify-center">

      <div class="container max-w-screen-lg mx-auto">


          <div class="bg-white rounded shadow-2xl p-4 px-4 md:p-8 mb-6"
          style="box-shadow: rgba(0, 0, 0, 0.45) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">

          <h2 class="mb-4 text-2xl font-semibold leading-tight">Edit Registration Form</h2>
          <hr class="my-4">

            <form action="{{ route('editUpdate') }}" method="post">
                @csrf

              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">



                  <div class="lg:col-span-3">
                    <!-- Fixed Form -->
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                      <div class="md:col-span-2"></div>

                      <div class="md:col-span-1">
                        <label for="full_name">Full Name</label>
                      </div>

                      <div class="md:col-span-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                        <input name="name" type="hidden" value="0" class="sr-only peer">
                        <input name="name" type="checkbox" value="1" class="sr-only peer" @if ($data->name) checked  @endif >
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-600 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                        @if ($data->name)
                        {{ __('Enabled') }}
                        @else
                        {{ __('Disabled') }}
                        @endif</span>
                        </label>
                      </div>

                      <div class="md:col-span-2"></div>

                      <div class="md:col-span-1">
                        <label for="email">Email Address</label>
                      </div>

                      <div class="md:col-span-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                        <input name="email" id="isMail"  type="hidden" value="0" class="sr-only peer">
                        <input name="email" id="isMail"  type="checkbox" value="1" class="sr-only peer" @if ($data->email) checked  @endif >
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-600 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300" id="mailtxt" >
                        @if ($data->email)
                        {{ __('Enabled') }}
                        @else
                        {{ __('Disabled') }}
                        @endif
                        </span>
                        </label>
                      </div>

                      <div class="md:col-span-2"></div>

                      <div class="md:col-span-1">
                        <label for="address">Phone Number</label>
                      </div>

                      <div class="md:col-span-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                        <input name="phone_number" type="hidden" value="0" class="sr-only peer">
                        <input name="phone_number" type="checkbox" value="1" class="sr-only peer" @if ($data->phone_number) checked  @endif >
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-600 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                        @if ($data->phone_number)
                        {{ __('Enabled') }}
                        @else
                        {{ __('Disabled') }}
                        @endif
                        </span>
                        </label>
                      </div>

                      <div class="md:col-span-2"></div>

                      <div class="md:col-span-1">
                        <label for="city">Date of Birth</label>
                      </div>

                      <div class="md:col-span-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                        <input name="dob" type="hidden" value="0" class="sr-only peer">
                        <input name="dob" type="checkbox" value="1" class="sr-only peer" @if ($data->dob) checked  @endif >
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-600 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                        @if ($data->dob)
                        {{ __('Enabled') }}
                        @else
                        {{ __('Disabled') }}
                        @endif</span>
                        </label>
                      </div>
                    </div>

                    <hr class="my-4">

                    <!-- Additional Form -->
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-4 md:grid-cols-5">

                      @foreach ($dataAdd as $da)
                        <div class="md:col-span-1"></div>

                        <div class="md:col-span-1">
                            {{-- <x-text-input id="{{ $da->id }}_input" class="block mt-1 w-full" type="text" name="{{ $da->id }}_in" :value="$da->name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                <div class="md:col-span-1">
                                    <label for="city"> {{$da->name}} </label>
                                </div>
                        </div>

                        <div class="md:col-span-1">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input name="{{ $da->id }}" type="hidden" value="0" class="sr-only peer">
                                <input name="{{ $da->id }}" type="checkbox" value="1" class="sr-only peer" @if ($da->enabled) checked @endif>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-600 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    @if ($da->enabled)
                                        {{ __('Enabled') }}
                                    @else
                                        {{ __('Disabled') }}
                                    @endif
                                </span>
                            </label>
                        </div>

                        <div class="md:col-span-1">
                            <!-- <x-primary-button class="ml-2">
                                {{ __('Remove') }}
                            </x-primary-button> -->
                            <a href="{{ route('deleteField', ['id' => $da->id]) }}" class="ml-2 bg-red-800 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Remove') }}
                            </a>
                        </div>

                        <div class="md:col-span-1"></div>

                      @endforeach

                      <div class="md:col-span-2"></div>

                      <div class="md:col-span-1">
                          <button type="button" id="addField" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                              {{ __('Add new Field') }}
                      </button>
                      </div>

                      <div class="md:col-span-3">
                        <x-primary-button class="ml-2">
                            {{ __('Save') }}
                        </x-primary-button>
                      </div>

                    </div>

                  </div>

              </div>
            </form>

            <div id="addFieldModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
              <div class="bg-white p-4 rounded-lg w-1/2">
              <h2 class="text-xl font-bold mb-4">Add New Field</h2>
              <form action="{{ route('addField') }}" method="post">
                @csrf
                <div class="mt-4">
                    <label for="fieldName" class="block text-sm font-medium text-gray-700">New Field Name</label>
                    <input id="fieldName" type="text" name="fieldName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                    <a href="#" id="cancelButton" class="ml-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Cancel</a>
                    <!-- {{ route('addField') }} -->
                </div>
              </form>
              </div>
            </div>

          </div>


      </div>
    </div>

    <x-slot name="scripts">
        <script>
          document.addEventListener('DOMContentLoaded', function() {
              addFieldButton = document.getElementById('addField');
              var createUserModal = document.getElementById('addFieldModal');
              var cancelButton = document.getElementById('cancelButton');

              addFieldButton.addEventListener('click', function() {
                  createUserModal.classList.remove('hidden');
              });

              cancelButton.addEventListener('click', function() {
                  createUserModal.classList.add('hidden');
              });
          });

        </script>
    </x-slot>

</x-app-layout>


