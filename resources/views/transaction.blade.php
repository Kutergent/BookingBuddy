<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-12 bg-gray-950">
        <div class="p-4 rounded-lg mx-auto w-full max-w-[550px] shadow-xl bg-gray-200">
            <form action="{{ route('postInvoice') }}" method="POST">
                @csrf
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="dp" :value="__('Down Payment Amount')" />
                            <x-text-input id="dp" class="block mt-1 w-full" type="number" min="25000" max="1000000"
                                          placeholder="Rp. {{ $dp }}" step="5000" name="dp"
                                          :value="old('dp')" required autofocus autocomplete="dp" disabled />
                            <x-input-error :messages="$errors->get('dp')" class="mt-2" />
                        </div>
                    </div>

                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="tax" :value="__('Tax')" />
                            <x-text-input id="tax" class="block mt-1 w-full" type="number" min="0" max="100"
                                          placeholder="{{ $tax }}%" step="1" name="tax"
                                          :value="old('tax')" required autofocus autocomplete="tax" disabled />
                            <x-input-error :messages="$errors->get('tax')" class="mt-2" />
                        </div>
                    </div>

                    <div class="w-full px-3">
                        <div class="mt-4">
                            <x-input-label for="total" :value="__('Total')" />
                            <x-text-input id="total" class="block mt-1 w-full" type="number" min="0"
                                          placeholder="Rp. {{ $total }}" step="1" name="total"
                                          :value="old('total')" required autofocus autocomplete="total" disabled />
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
