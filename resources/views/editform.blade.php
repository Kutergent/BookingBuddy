<x-app-layout>
    <div class="min-h-fit p-6 flex justify-center">
        <div class="container max-w-screen-lg mx-auto">

            <div class="bg-white rounded shadow-2xl p-4 px-4 md:p-8 mb-6">

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
                                    <label for="address">Phone Number</label>
                                </div>

                                <div class="md:col-span-3">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input name="phone_number" type="hidden" value="0" class="sr-only peer">
                                        <input name="phone_number" type="checkbox" value="1" class="sr-only peer" @if ($form->phone_number) checked  @endif >
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-600 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        @if ($form->phone_number)
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
                                    <input name="dob" type="checkbox" value="1" class="sr-only peer" @if ($form->dob) checked  @endif >
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-600 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    @if ($form->dob)
                                    {{ __('Enabled') }}
                                    @else
                                    {{ __('Disabled') }}
                                    @endif</span>
                                    </label>
                                </div>


                                <div class="md:col-span-2"></div>

                                <div class="md:col-span-1">
                                    <label for="email">{{ __('Reservation Range') }}</label>
                                </div>

                                <div class="md:col-span-3">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="range" class="accent-black" id="customRange1" min="1" max="365" value="{{$form->range}}" />

                                        <input type="number" name="range" class="mt-1 ml-2 block h-7 w-20 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="numberInput" min="1" max="365" value="{{$form->range}}" />

                                        <span class="ml-2"> Day(s) </span>

                                    </label>
                                </div>

                                <div class="md:col-span-2"></div>

                                <div class="md:col-span-1">
                                    <label for="reserve_limit">Reserve Limit per time</label>
                                </div>

                                <div class="md:col-span-2">
                                    <input type="number" name="limit" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" min="1" value="{{ $form->limit }}" />
                                </div>

                                <div class="md:col-span-2"></div>

                                <div class="md:col-span-1">
                                    <label for="reservation_interval">Reservation Duration</label>
                                </div>

                                <div class="md:col-span-2">
                                    <select autocomplete="off" name="interval" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="15" @if ($form->interval == 15) selected @endif>15 minutes</option>
                                        <option value="20" @if ($form->interval == 20) selected @endif>20 minutes</option>
                                        <option value="30" @if ($form->interval == 30) selected @endif>30 minutes</option>
                                        <option value="45" @if ($form->interval == 45) selected @endif>45 minutes</option>
                                        <option value="60" @if ($form->interval == 60) selected @endif>1 hour (60 minutes)</option>
                                        <option value="90" @if ($form->interval == 90) selected @endif>1.5 hours (90 minutes)</option>
                                        <option value="120" @if ($form->interval == 120) selected @endif>2 hours (120 minutes)</option>
                                        <option value="150" @if ($form->interval == 150) selected @endif>2.5 hours (150 minutes)</option>
                                        <option value="180" @if ($form->interval == 180) selected @endif>3 hours (180 minutes)</option>
                                    </select>

                                </div>

                                <div class="md:col-span-2"></div>

                                <div class="md:col-span-1">
                                    <label for="opening_hours">Opening Hours</label>
                                </div>

                                <div class="md:col-span-1">
                                    <select autocomplete="off" name="open" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    @for ($hour = 0; $hour < 24; $hour++)
                                        @for ($minute = 0; $minute < 60; $minute += 30)
                                        @php
                                            $time = sprintf('%02d:%02d', $hour, $minute);
                                            $formattedCloseTime = date('H:i', strtotime($form->open));
                                        @endphp
                                        <option value="{{ $time }}" @if ($formattedCloseTime == $time) selected @endif>{{ $time }}</option>
                                        @endfor
                                    @endfor
                                    </select>
                                </div>
                                <div class="md:col-span-1">
                                    <select autocomplete="off" name="close" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        @for ($hour = 0; $hour < 24; $hour++)
                                            @for ($minute = 0; $minute < 60; $minute += 30)
                                                @php
                                                    $time = sprintf('%02d:%02d', $hour, $minute);
                                                    $formattedCloseTime = date('H:i', strtotime($form->close));
                                                @endphp
                                                <option value="{{ $time }}" @if ($formattedCloseTime == $time) selected @endif>{{ $time }}</option>
                                            @endfor
                                        @endfor
                                    </select>

                                </div>


                                <div class="md:col-span-2"></div>
                                <div class="md:col-span-1">
                                    <label for="reserve_limit">Down Payment Amount (Rp.)</label>
                                </div>
                                <div class="md:col-span-2">
                                    <input type="number" name="dp_amt" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" min="20000" max="1000000" step="500" value="{{ $form->dp_amt }}" />
                                </div>

                                <div class="md:col-span-2"></div>
                                <div class="md:col-span-1">
                                    <label for="reserve_limit">Tax Amount (%)</label>
                                </div>
                                <div class="md:col-span-2">
                                    <input type="number" name="tax_amt" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" min="0" max="100" step="1" value="{{ $form->tax_amt }}" />
                                </div>

                                <div class="md:col-span-2"></div>
                                <div class="md:col-span-3">
                                    <x-input-error :messages="$errors->get('open')" class="mt-2" />
                                </div>
                            </div>


                            <hr class="my-4">


                            <!-- Additional Form -->
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-4 md:grid-cols-5">

                            @foreach ($formextra as $fe)
                                <div class="md:col-span-1"></div>

                                <div class="md:col-span-1">
                                    <div class="md:col-span-1">
                                        <label for="{{$fe->id }}"> {{$fe->name}} </label>
                                    </div>
                                </div>

                                <div class="md:col-span-1">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input name="{{$fe->id }}" type="hidden" value="0" class="sr-only peer">
                                        <input name="{{ $fe->id }}" type="checkbox" value="1" class="sr-only peer" @if ($fe->enabled) checked @endif>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-600 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            @if ($fe->enabled)
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
                                    <a href="{{ route('deleteField', ['id' => $fe->id]) }}" class="ml-2 bg-red-800 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
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

    {{-- PREVIEW --}}
    <div class="bg-white p-4 rounded-lg mx-auto w-full max-w-[550px] shadow-xl container" >
            <h2 class="mb-4 text-2xl font-semibold leading-tight">{{__("Form Preview")}}</h2>
            <hr class="my-4">
                <div class="-mx-3 flex flex-wrap">

                            <div class="w-full px-3">
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" disabled/>
                            </div>
                            </div>

                            <div class="w-full px-3">
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" disabled/>
                            </div>
                            </div>

                        <div class="w-full px-3">
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required autocomplete="password" disabled/>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" disabled/>
                            </div>
                        </div>

                        @if ($form->phone_number == 1)
                            <div class="w-full px-3">
                                <div class="mt-4">
                                    <x-input-label for="phone_number" :value="__('Phone')" />
                                    <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required disabled/>
                                </div>
                            </div>
                        @endif

                        @if ($form->dob == 1)
                            <div class="w-full px-3">
                                <div class="mt-4">
                                    <x-input-label for="dob" :value="__('Date of birth')"/>
                                    <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" max="{{ Carbon\Carbon::now()->subYears(14)->format('Y-m-d') }}" required/>
                                    <x-input-error :messages="$errors->get('dob')" class="mt-2" disabled/>
                                </div>
                            </div>
                        @endif



                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="reserve_date" :value="__('Reservation Date')" />
                            <x-text-input id="reserve_date" class="block mt-1 w-full" type="date" name="reserve_date" :value="old('reserve_date')" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addDays($form->range)->format('Y-m-d') }}" required />
                            <x-input-error :messages="$errors->get('reserve_date')" class="mt-2" />
                        </div>
                    </div>

                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="reserve_time" :value="__('Reservation Time')" />
                            <select id="reserve_time" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="reserve_time" required>
                                @php
                                    $currentTime = Carbon\Carbon::parse($form->open);
                                    $closingTime = Carbon\Carbon::parse($form->close);
                                    $selectedTime = old('reserve_time', $currentTime->format('H:i'));
                                @endphp
                                @while ($currentTime->lte($closingTime))
                                    <option value="{{ $currentTime->format('H:i') }}" @if ($selectedTime === $currentTime->format('H:i')) selected @endif>
                                        {{ $currentTime->format('h:i A') }}
                                    </option>
                                    @php
                                        $currentTime->addMinutes($form->interval);
                                    @endphp
                                @endwhile
                            </select>
                            <x-input-error :messages="$errors->get('reserve_time')" class="mt-2" />
                        </div>
                    </div>


                    @foreach ($formextra as $da)
                        @if ($da->enabled == 1)
                            <div class="w-full px-3">
                                <div class="mt-4">
                                    <x-input-label for="{{ $da->id }}" :value="$da->name" />
                                    <x-text-input id="{{ $da->id }}" class="block mt-1 w-full" type="text" name="{{ $da->id }}" :value="old('textbox')" required autofocus autocomplete="textbox" disabled/>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>



            <div class="container flex flex-wrap">
                <x-primary-button class="mt-4" disabled>
                    {{ __('Reserve Now!') }}
                </x-primary-button>
            </div>

    </div>

    <x-chat-admin-popup>
        @slot('messages', $messages)
        @slot('user', $chat)
    </x-chat-admin-popup>


    <x-slot name="scripts">
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            addFieldButton = document.getElementById('addField')
            var createUserModal = document.getElementById('addFieldModal')
            var cancelButton = document.getElementById('cancelButton')

            addFieldButton.addEventListener('click', function() {
                createUserModal.classList.remove('hidden')
            })

            cancelButton.addEventListener('click', function() {
                createUserModal.classList.add('hidden')
            })

            const slider = document.getElementById('customRange1')
            const numberInput = document.getElementById('numberInput')


            slider.addEventListener('input', function() {
                numberInput.value = slider.value
            })

            numberInput.addEventListener('input', function() {
                slider.value = numberInput.value
            })

          })

        </script>
    </x-slot>

</x-app-layout>


