<x-guest-layout>


    <div class="min-h-screen flex items-center justify-center p-12 bg-gray-950">
        <div class="p-4 rounded-lg mx-auto w-full max-w-[550px] shadow-xl bg-gray-200" style="background-size: cover; background-position: center center; box-shadow: rgba(0, 0, 0, 0.4) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
            <form action="{{ route('rescheduleRes', ['id' => $res->id]) }}" method="POST">
             @csrf

                <div class="-mx-3 flex flex-wrap">

                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="reserve_date" :value="__('Reservation Date')" />
                            <x-text-input id="reserve_date" class="block mt-1 w-full" type="date" name="reserve_date" :value="old('reserve_date')" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addDays($form->range)->format('Y-m-d') }}" required/>
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


                    {{-- @foreach ($formextra as $da)
                        @if ($da->enabled == 1)
                            <div class="w-full px-3">
                                <div class="mt-4">
                                    <x-input-label for="{{ $da->id }}" :value="$da->name" />
                                    <x-text-input id="{{ $da->id }}" class="block mt-1 w-full" type="text" name="{{ $da->id }}" :value="old('{{ $da->id }}')" required autofocus autocomplete="{{ $da->id }}" />
                                </div>
                            </div>
                        @endif
                    @endforeach --}}
                </div>

                <div class="container flex flex-wrap">
                    <x-primary-button class="mt-4">
                        {{ __('Update Reservation!') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>


    </x-guest-layout>


