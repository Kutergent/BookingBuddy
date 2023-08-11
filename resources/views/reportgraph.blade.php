
<x-app-layout>



    <div class="w-full h-fit mt-2 bg-white rounded shadow-sm p-4 px-4 relative">
        <!-- Your content goes here -->

        <h2 class="mb-4 text-2xl font-semibold leading-tight">Customer Report</h2>

        <!-- Dropdown for selecting a year -->
        <div class="absolute top-0 right-0">
            <select id="yearDropdown" class="px-2 py-1 border rounded w-48 mt-2 mr-2">
                <option value="2023" {{ request()->query('year') == '2023' ? 'selected' : '' }}>2023</option>
                <option value="2024" {{ request()->query('year') == '2024' ? 'selected' : '' }}>2024</option>
                <option value="2025" {{ request()->query('year') == '2025' ? 'selected' : '' }}>2025</option>
            <!-- Add more options as needed -->
                <!-- Add more options as needed -->
            </select>
        </div>
    </div>

        <div class="flex flex-row h-3/6 mt-2">
            <div class="w-2/3 mr-2 bg-white rounded shadow-sm p-4 px-4">
                {!! $mr->container() !!}
            </div>
            <div class="w-1/3 bg-white rounded shadow-sm p-4 px-4">
                {!! $rs->container() !!}
            </div>
        </div>
        <div class="w-full h-2/6 mt-2 bg-white rounded shadow-sm p-4 px-4">
            {!! $rf->container() !!}
        </div>
        <div class="flex flex-row mt-2 h-3/6">
            <div class="w-1/2 mr-2 bg-white rounded shadow-sm p-4 px-4">
                {!! $dr->container() !!}
            </div>
            <div class="w-1/2 bg-white rounded shadow-sm p-4 px-4">

                {!! $cr->container() !!}
            </div>
        </div>

        <x-chat-admin-popup>
            @slot('messages', $messages)
            @slot('user', $chat)
        </x-chat-admin-popup>




    {!! $mr->script() !!}
    {!! $rs->script() !!}
    {!! $dr->script() !!}
    {!! $cr->script() !!}
    {!! $rf->script() !!}

    @php
        $local = route('reportgraph')
    @endphp
    <script>
        const yearDropdown = document.getElementById('yearDropdown');

        yearDropdown.addEventListener('change', function () {
            const selectedYear = yearDropdown.value;
            window.location.href = '{{$local}}' + '?year=' + selectedYear;
        });
    </script>




</x-app-layout>
