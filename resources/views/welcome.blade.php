<x-guest-layout>

<!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

<section
  class="relative bg-[url(https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80)] bg-cover bg-center bg-no-repeat"
  style="background-size: cover; background-position: center center;"
>
  <div
    class="absolute inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"
  ></div>

  <div
    class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8"
  >
    <div class="max-w-xl text-left ltr:sm:text-left rtl:sm:text-right">
      <h1 class="text-3xl font-extrabold sm:text-5xl text-white">
        <strong class="block font-extrabold text-gray-900 text-6xl">
          SoundQuake
        </strong>
        Experience the majestic sound of Music
      </h1>

      <p class="mt-4 max-w-lg sm:text-xl/relaxed">
        <h5>
          
        </h5> 
      </p>

      <div class="mt-8 flex flex-wrap gap-4 text-center">
        <a
          href="{{ route('reserve') }}"
          class="block w-full rounded bg-gunmetal px-12 py-3 text-sm font-medium text-white shadow hover:bg-gray-500 focus:outline-none focus:ring active:bg-rose-500 sm:w-auto"
        >
          Reserve Now
        </a>

        <a
          href="{{ route('aboutus') }}"
          class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-gunmetal shadow hover:text-gray-500 focus:outline-none focus:ring active:text-rose-500 sm:w-auto"
        >
          Learn More
        </a>
      </div>
    </div>
  </div>
</section>
</x-guest-layout>




