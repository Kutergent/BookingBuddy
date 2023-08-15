<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="min-w-64 max-w-64 bg-gunmetal shadow-lg flex flex-col justify-between rounded-r-lg shadow-lg">
        <div class="">

            {{-- Profileman --}}
            <div class="py-4 px-4">
                @if (Auth::check())
                <div class="flex items-center text-gray-300">


                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button type="button" class="flex text-sm font-medium text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-left flex-grow" viewBox="0 -960 960 960" width="20" height="20">
                                    <path style="fill: white" d="M222-255q63-44 125-67.5T480-346q71 0 133.5 23.5T739-255q44-54 62.5-109T820-480q0-145-97.5-242.5T480-820q-145 0-242.5 97.5T140-480q0 61 19 116t63 109Zm257.814-195Q422-450 382.5-489.686q-39.5-39.686-39.5-97.5t39.686-97.314q39.686-39.5 97.5-39.5t97.314 39.686q39.5 39.686 39.5 97.5T577.314-489.5q-39.686 39.5-97.5 39.5Zm.654 370Q398-80 325-111.5q-73-31.5-127.5-86t-86-127.266Q80-397.532 80-480.266T111.5-635.5q31.5-72.5 86-127t127.266-86q72.766-31.5 155.5-31.5T635.5-848.5q72.5 31.5 127 86t86 127.032q31.5 72.532 31.5 155T848.5-325q-31.5 73-86 127.5t-127.032 86q-72.532 31.5-155 31.5ZM480-140q55 0 107.5-16T691-212q-51-36-104-55t-107-19q-54 0-107 19t-104 55q51 40 103.5 56T480-140Zm0-370q34 0 55.5-21.5T557-587q0-34-21.5-55.5T480-664q-34 0-55.5 21.5T403-587q0 34 21.5 55.5T480-510Zm0-77Zm0 374Z"/>
                                </svg>

                                <span class="ml-2 w-auto text-sm">{{ Auth::user()->name }}</span>

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
                    <li>
                        <x-side-link :href="route('usermanage')" :active="request()->routeIs('usermanage')">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 -960 960 960" width="16" class="fill-current">
                                <path d="M38-160v-94q0-35 18-63.5t50-42.5q73-32 131.5-46T358-420q62 0 120 14t131 46q32 14 50.5 42.5T678-254v94H38Zm700 0v-94q0-63-32-103.5T622-423q69 8 130 23.5t99 35.5q33 19 52 47t19 63v94H738ZM358-481q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42Zm360-150q0 66-42 108t-108 42q-11 0-24.5-1.5T519-488q24-25 36.5-61.5T568-631q0-45-12.5-79.5T519-774q11-3 24.5-5t24.5-2q66 0 108 42t42 108ZM98-220h520v-34q0-16-9.5-31T585-306q-72-32-121-43t-106-11q-57 0-106.5 11T130-306q-14 6-23 21t-9 31v34Zm260-321q39 0 64.5-25.5T448-631q0-39-25.5-64.5T358-721q-39 0-64.5 25.5T268-631q0 39 25.5 64.5T358-541Zm0 321Zm0-411Z"/>
                            </svg>
                            <span class="ml-2 hover:text-blackink text-base">User Management</span>
                        </x-side-link>

                    </li>
                    @endif

                    <li>
                        <x-side-link :href="route('calendar')" :active="request()->routeIs('calendar')">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 -960 960 960" width="16" class="fill-current">
                                <path d="M180-80q-24 0-42-18t-18-42v-620q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600v-430H180v430Zm0-490h600v-130H180v130Zm0 0v-130 130Zm300 230q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/>
                            </svg>
                            <span class="ml-2 hover:text-blackink text-base">Calendar</span>
                        </x-side-link>
                    </li>

                    <li>
                        <x-side-link :href="route('report')" :active="request()->routeIs('report')">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 -960 960 960" width="16" class="fill-current">
                                <path d="M320-490v-60h320v60H320Zm0-160v-60h320v60H320ZM220-390h320q26.43 0 49.215 12Q612-366 628-346l112 146v-620H220v430Zm0 250h490L581-309q-7.565-9.882-18.283-15.441Q552-330 540-330H220v190Zm520 60H220q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h520q24 0 42 18t18 42v680q0 24-18 42t-42 18Zm-520-60v-680 680Zm0-190v-60 60Z"/>                            </svg>
                            <span class="ml-2 hover:text-blackink text-base">Customer Data</span>
                        </x-side-link>
                    </li>

                    <li>
                        <x-side-link :href="route('reportgraph')" :active="request()->routeIs('reportgraph')">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 -960 960 960" width="16" class="fill-current"><path d="M120-120v-76l60-60v136h-60Zm165 0v-236l60-60v296h-60Zm165 0v-296l60 61v235h-60Zm165 0v-235l60-60v295h-60Zm165 0v-396l60-60v456h-60ZM120-356v-85l280-278 160 160 280-281v85L560-474 400-634 120-356Z"/></svg>
                            <span class="ml-2 hover:text-blackink text-base">Customer Report</span>
                        </x-side-link>
                    </li>

                    <li>
                        <x-side-link :href="route('edit')" :active="request()->routeIs('edit')">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 -960 960 960" width="16" class="fill-current">
                                <path d="M319-250h322v-60H319v60Zm0-170h322v-60H319v60ZM220-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm331-554v-186H220v680h520v-494H551ZM220-820v186-186 680-680Z"/>
                            </svg>
                            <span class="ml-2 hover:text-blackink text-base">Edit Registration Form</span>
                        </x-side-link>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="flex items-center mb-2 ml-2">
            {{-- Logoman --}}
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />

            <div class="ml-2">
                <span class="text-xs text-gray-500">Powered by</span>
                <span class="text-gray-300">Booking Buddy</span>
            </div>
        </div>
    </aside>
    <div class="flex-1 flex flex-col">
        <main class="flex-1 p-4 overflow-y-auto">
            {{ $slot }}
        </main>

    </div>
</div>
