<x-guest-layout>


<div class="flex items-center justify-center p-12 bg-gray-900">
  <div class="p-4 rounded-lg mx-auto w-full max-w-[550px] shadow-xl" style="background-image: url('{{ asset('images/bgReserve2.jpg') }}'); background-size: cover; background-position: center center; box-shadow: rgba(0, 0, 0, 5) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
    <form action="{{ route('postReserve')  }}" method="POST">
      @csrf

      <div class="-mx-3 flex flex-wrap">

@guest



        @if ($data->name == 1)
        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="name" :value="__('Name')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
        </div>
        @endif

        @if ($data->email == 1)
        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="email" :value="__('Email')" />
              <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
        </div>
        @endif

        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="password" :value="__('Password')" />
              <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required autocomplete="password" />
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        </div>

        @if ($data->phone_number == 1)
        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="phone_number" :value="__('Phone')" />
              <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required/>
              <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
          </div>
        </div>
        @endif

        @if ($data->dob == 1)
        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="dob" :value="__('Date of birth')"/>
              <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" max="{{ Carbon\Carbon::now()->subYears(14)->format('Y-m-d') }}" required/>
              <x-input-error :messages="$errors->get('dob')" class="mt-2" />
          </div>
        </div>
        @endif

        @endguest

        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="reserve_date" :value="__('Reservation Date')" />
              <x-text-input id="reserve_date" class="block mt-1 w-full" type="date" name="reserve_date" :value="old('reserve_date')" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addWeeks(2)->format('Y-m-d') }}" required/>
              <x-input-error :messages="$errors->get('reserve_date')" class="mt-2" />
          </div>
        </div>

        <div class="w-full px-3">
            <div class="mt-4">
                <x-input-label for="reserve_time" :value="__('Reservation Time')" />
                <x-text-input id="reserve_time" class="block mt-1 w-full" type="time" step="1800" name="reserve_time" :value="old('reserve_time')" min="10:00" max="18:00" required/>
                <x-input-error :messages="$errors->get('reserve_time')" class="mt-2" />
            </div>
          </div>


        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="reserve_duration" :value="__('Reservation Duration')" />
              <x-text-input id="reserve_duration" class="block mt-1 w-full" type="text" name="reserve_duration" :value="old('reserve_duration')" required />
              <x-input-error :messages="$errors->get('reserve_duration')" class="mt-2" />
          </div>
        </div>






        @foreach ($dataAdd as $da)
        @if ($da->enabled == 1)
        <div class="w-full px-3">
            <div class="mt-4">
                <x-input-label for="{{ $da->id }}" :value="$da->name" />
                <x-text-input id="{{ $da->id }}" class="block mt-1 w-full" type="text" name="{{ $da->id }}" :value="old('textbox')" required autofocus autocomplete="textbox" />
                <x-input-error :messages="$errors->get('textbox')" class="mt-2" />
            </div>
        </div>
        @endif
        @endforeach




      </div>
      <div class="container flex flex-wrap">
      <x-primary-button class="mt-4">
                {{ __('Reserve Now!') }}
            </x-primary-button>
      </div>
    </form>
  </div>
</div>
</x-guest-layout>


