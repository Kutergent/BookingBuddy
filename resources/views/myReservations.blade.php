<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gray-950">
    <div class="container mx-auto sm:p-4 text-gray-900 bg-gray-200 rounded shadow-lg p-4 px-4 md:p-8 mb-6 mt-4">
        <h2 class="mb-4 text-2xl font-semibold leading-tight">My Reservations History</h2>

        <hr class="my-4">
        <!-- Datepicker -->
        <form action="{{ route('myReservations') }}" method="GET">
            <div date-rangepicker class="flex items-center mb-2 item">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input name="start" type="text"
                        class="bg-gray-50 border border-gray-50 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                        placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-700">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input name="end" type="text"
                        class="bg-gray-50 border border-gray-50 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                        placeholder="Select date end">
                </div>

                <span class="mx-4 text-gray-700">
                    <x-primary-button class="ml-2">
                        {{ __('Filter') }}
                    </x-primary-button>
                </span>

            </div>
        </form>

        <div class="overflow-x-auto">
            <div class="table-container">
                <table class="min-w-full text-xs">
                    </colgroup>
                    <thead class="bg-gray-400">
                        <tr class="text-left">
                            <th class="p-3 font-medium text-base text-left">Reservation ID</th>
                            <th class="p-3 font-medium text-base text-left">@sortablelink('reserve_date', 'Reserve Date')</th>
                            <th class="p-3 font-medium text-base text-left">Reserve Time</th>
                            <th class="p-3 font-medium text-base text-left">Invoice</th>
                            <th class="p-3 font-medium text-base text-center">@sortablelink('status', 'Status')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $r)
                            <tr class="border-b border-opacity-20 bg-white">
                                <td class="p-3 font-medium text-sm text-left">
                                    <p>{{ $r->id }}</p>
                                </td>
                                <td class="p-3 font-medium text-sm text-left">
                                    <p>{{\Carbon\Carbon::parse($r->reserve_date)->format('d F Y')}}</p>
                                    <p class="text-gray-400">{{\Carbon\Carbon::parse($r->reserve_date)->format('l')}}</p>
                                </td>
                                <td class="p-3 font-medium text-sm text-left">
                                    <p>{{ carbon\Carbon::createFromFormat('H:i:s', $r->reserve_time)->format('H:i A')  }}</p>
                                </td>
                                <td class="p-3 font-medium text-sm text-left">
                                    <p>{{ $r->invoice }}</p>
                                </td>
                                <td class="p-3 font-medium text-sm text-center">
                                    @if ($r->status == 'confirmed')
                                        <span class="px-3 py-1 font-semibold rounded-md bg-indigo-600 text-gray-100">
                                            <span>{{ ucfirst($r->status)  }}</span>
                                        </span>
                                    @elseif ($r->status == 'pending')
                                        <span class="px-3 py-1 font-semibold rounded-md bg-yellow-600 text-gray-100">
                                            <span>{{ ucfirst($r->status)  }}</span>
                                        </span>
                                    @else
                                        <span class="px-3 py-1 font-semibold rounded-md bg-red-800 text-gray-100">
                                            <span>{{ ucfirst($r->status) }}</span>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- pagination -->
            {{-- {{ $reservations->links() }} --}}
            {!! $reservations->appends(Request::except('page'))->render() !!}
        </div>
    </div>
    </div>


</x-guest-layout>
