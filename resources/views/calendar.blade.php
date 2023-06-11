<x-app-layout>
    <div id="calendar" class="mx-auto w-2/3 mt-4"></div>
    <div id="confirmationModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-4 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Confirmation</h2>
            <p>Are you sure you want to confirm this reservation?</p>
            <div class="mt-4 flex justify-end">
                <button id="confirmButton" class="px-4 py-2 bg-green-500 text-white rounded-md">Confirm</button>
                <button id="cancelButton" class="px-4 py-2 bg-red-500 text-white rounded-md ml-4">Cancel</button>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var confirmationModal = document.getElementById('confirmationModal');
                var confirmButton = document.getElementById('confirmButton');
                var cancelButton = document.getElementById('cancelButton');


                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap5',
                    events: [
                        @foreach($reservations as $reservation)
                            {
                                title: '{{ ucfirst($reservation->name) }} - {{ ucfirst($reservation->status) }}',
                                start: '{{ $reservation->reserve_date }}',
                                end: '{{ $reservation->reserve_date }}',
                                @if ($reservation->status === 'confirmed')
                                    classNames: 'bg-green-500 border-green-500 text-white whitespace-normal',
                                @elseif ($reservation->status === 'pending')
                                    classNames: 'bg-yellow-500 border-yellow-500 text-black whitespace-normal',
                                @elseif ($reservation->status === 'canceled')
                                    classNames: 'bg-red-500 border-red-500 text-white whitespace-normal',
                                @endif
                                extendedProps: {
                                    name: '{{ $reservation->name }}',
                                    email: '{{ $reservation->email }}',
                                    phone: '{{ $reservation->phone_number }}',
                                    status: '{{ $reservation->status }}',
                                },
                            },
                        @endforeach
                    ],
                    eventClick: function(info) {
                        // Show confirmation modal
                        confirmationModal.classList.remove('hidden');

                        // Handle confirm button click
                        confirmButton.addEventListener('click', function() {
                            // Perform confirmation action (you can make an API request or any other action)
                            // You can access the reservation ID using `info.event.id` and handle the confirmation accordingly

                            // Close the modal
                            confirmationModal.classList.add('hidden');
                        });

                        // Handle cancel button click
                        cancelButton.addEventListener('click', function() {
                            // Close the modal
                            confirmationModal.classList.add('hidden');
                        });
                    },
                });

                calendar.render();
            });
        </script>
    </x-slot>
</x-app-layout>
