<x-guest-layout>


    <div class="min-h-screen flex items-center justify-center p-12 bg-gray-950">
        <div class="p-4 rounded-lg mx-auto w-full max-w-[550px] shadow-xl bg-gray-200" style="background-size: cover; background-position: center center; box-shadow: rgba(0, 0, 0, 0.4) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
            <form action="{{ route('postInvoice')  }}" method="POST">
            @csrf
                <div class="-mx-3 flex flex-wrap">

                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="dp" :value="__('Down Payment Amount')" />
                            <x-text-input id="dp" class="block mt-1 w-full" type="number" min="25000" max="1000000" placeholder="Rp. {{ $dp }}" step="5000" name="dp" :value="old('dp')" required autofocus autocomplete="dp" disabled />
                            <x-input-error :messages="$errors->get('dp')" class="mt-2" />
                        </div>
                    </div>

                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="tax" :value="__('Tax')" />
                            <x-text-input id="tax" class="block mt-1 w-full" type="number" min="0" max="100" placeholder="{{ $tax }}%" step="1" name="tax" :value="old('tax')" required autofocus autocomplete="tax" disabled />
                            <x-input-error :messages="$errors->get('tax')" class="mt-2" />
                        </div>
                    </div>

                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="total" :value="__('Total')" />
                            <x-text-input id="total" class="block mt-1 w-full" type="number" min="0" placeholder="Rp. {{ $total }}" step="1" name="total" :value="old('total')" required autofocus autocomplete="total" disabled />
                            <x-input-error :messages="$errors->get('total')" class="mt-2" />
                        </div>
                    </div>

                </div>


                <div class="container flex flex-wrap">
                    <x-primary-button class="mt-4">
                        {{ __('Checkout Now!') }}
                    </x-primary-button>
                </div>

            </form>

        </div>
    </div>



</x-guest-layout>
