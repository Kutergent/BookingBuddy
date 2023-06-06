<x-guest-layout>
<!-- component -->
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
    <form action="{{ route('postReserve')  }}" method="POST">
      @csrf

      <div class="-mx-3 flex flex-wrap">


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
        
        @if ($data->phone_number == 1)
        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="phone_number" :value="__('Phone')" />
              <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required/>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
        </div>
        @endif
        
        @if ($data->dob == 1)
        <div class="w-full px-3">
          <div class="mt-4">             
              <x-input-label for="dob" :value="__('Date of birth')"/>
              <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required/>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
        </div>
        @endif
      

        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="reserve_date" :value="__('Reservation Date')" />
              <x-text-input id="reserve_date" class="block mt-1 w-full" type="date" name="reserve_date" :value="old('reserve_date')" required/>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
        </div>


        <div class="w-full px-3">
          <div class="mt-4">
              <x-input-label for="reserve_duration" :value="__('Reservation Duration')" />
              <x-text-input id="reserve_duration" class="block mt-1 w-full" type="text" name="reserve_duration" :value="old('reserve_duration')" required />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
        </div>

        <script>
            document.getElementById(dob).setAttribute('max', new Date().toLocaleDateString('id'))
        </script>




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


