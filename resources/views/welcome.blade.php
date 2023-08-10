<x-guest-layout>
    <section class="relative bg-[url(https://images.unsplash.com/photo-1588058365815-c96ac30ee30f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80)] bg-cover bg-center bg-no-repeat" style="background-size: cover; background-position: center center;">
        <div class="absolute inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25">
        </div>

        <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
            <div class="max-w-xl text-left ">
                <h1 class="text-3xl font-extrabold sm:text-5xl text-white">
                    <strong class="block font-extrabold text-black text-8xl">
                        BookingBuddy
                    </strong>
                    Your Ultimate Flexible Companion
                </h1>

                <div class="mt-8 flex flex-wrap gap-4 text-center">
                    <a href="{{ route('reserve') }}" class="block w-full rounded bg-gunmetal px-12 py-3 text-sm font-medium text-white shadow hover:bg-gray-500 focus:outline-none focus:ring active:bg-rose-500 sm:w-auto">
                        Reserve Now
                    </a>

                    <a href="{{ route('aboutus') }}" class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-gunmetal shadow hover:text-gray-500 focus:outline-none focus:ring active:text-rose-500 sm:w-auto" >
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>




