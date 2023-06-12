<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gunmetal shadow-lg flex flex-col justify-between rounded-r-lg shadow-lg">
        <div class="p-4">

            {{-- Profileman --}}
            <div class="py-4 px-4">
                @if (Auth::check())
                <div class="flex items-center text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-left flex-grow" viewBox="0 -960 960 960" width="48"><path style="fill: white" d="M222-255q63-44 125-67.5T480-346q71 0 133.5 23.5T739-255q44-54 62.5-109T820-480q0-145-97.5-242.5T480-820q-145 0-242.5 97.5T140-480q0 61 19 116t63 109Zm257.814-195Q422-450 382.5-489.686q-39.5-39.686-39.5-97.5t39.686-97.314q39.686-39.5 97.5-39.5t97.314 39.686q39.5 39.686 39.5 97.5T577.314-489.5q-39.686 39.5-97.5 39.5Zm.654 370Q398-80 325-111.5q-73-31.5-127.5-86t-86-127.266Q80-397.532 80-480.266T111.5-635.5q31.5-72.5 86-127t127.266-86q72.766-31.5 155.5-31.5T635.5-848.5q72.5 31.5 127 86t86 127.032q31.5 72.532 31.5 155T848.5-325q-31.5 73-86 127.5t-127.032 86q-72.532 31.5-155 31.5ZM480-140q55 0 107.5-16T691-212q-51-36-104-55t-107-19q-54 0-107 19t-104 55q51 40 103.5 56T480-140Zm0-370q34 0 55.5-21.5T557-587q0-34-21.5-55.5T480-664q-34 0-55.5 21.5T403-587q0 34 21.5 55.5T480-510Zm0-77Zm0 374Z"/></svg>

                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button type="button" class="text-sm font-medium text-white">


                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif
            </div>

            <nav class="mt-6 overflow-y-auto flex-1">
                <ul class="space-y-1">
                    @if (Auth::user()->role == 'User Manager')
                    <li class="pl-4">
                        <x-side-link :href="route('usermanage')" :active="request()->routeIs('usermanage')">
                            <span class="hover:text-blackink">User Management</span>
                        </x-side-link>
                    </li>
                    @endif

                    <li class="pl-4">
                        <x-side-link :href="route('calendar')" :active="request()->routeIs('calendar')">
                            <span class="hover:text-blackink">Calendar</span>
                        </x-side-link>
                    </li>

                    <li class="pl-4">
                        <x-side-link :href="route('report')" :active="request()->routeIs('report')">
                            <span class="hover:text-blackink">Customer Report</span>
                        </x-side-link>
                    </li>

                    <li class="pl-4">
                        <x-side-link :href="route('edit')" :active="request()->routeIs('edit')">
                            <span class="hover:text-blackink">Edit Registration Form</span>
                        </x-side-link>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="flex items-center">

            {{-- Logoman --}}
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
            <span class="ml-2 text-gray-300">Booking Buddy</span>
        </div>


    </aside>

    <!-- Content -->
    <div class="flex-1 flex flex-col">
        {{-- <header class="bg-white border-b border-gray-100 py-2 px-4">
        <h1 class="text-2xl text-gray-800">BRUH MOMENT</h1>
      </header> --}}

        <main class="flex-1 p-4 overflow-y-auto">
            <!-- Page content goes here -->
            {{ $slot }}
        </main>

        {{-- <footer class="bg-gainsboro">
        <div class="p-4">
          <h2 class="text-xl text-black">Footer</h2>
        </div>
      </footer> --}}
    </div>
</div>
