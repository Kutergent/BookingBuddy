<x-app-layout>
    <div id="calendar" class="mx-auto w-2/3 mt-4"></div>

    <x-slot name="scripts">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

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
                            },
                        @endforeach
                    ],
                    eventDidMount: function(info) {
                        // Wrap the text of the event title
                        var eventTitleEl = info.el.querySelector('.fc-event-title');
                        eventTitleEl.classList.add('whitespace-normal');
                    },
                    eventClick: function(info) {
                        // Show the popup with reservation details
                        var reservation = info.event.extendedProps;
                        var popupContent = `
                            <div class="p-4">
                                <h2 class="text-lg font-bold mb-2">${reservation.name}</h2>
                                <p class="mb-1"><strong>Email:</strong> ${reservation.email}</p>
                                <p class="mb-1"><strong>Phone:</strong> ${reservation.phone}</p>
                                <p class="mb-1"><strong>Status:</strong> ${reservation.status}</p>
                            </div>
                        `;
                        Swal.fire({
                            title: 'Reservation Details',
                            html: popupContent,
                            showCancelButton: false,
                            showConfirmButton: false,
                        });
                    },
                });

                calendar.render();
            });
        </script>
    </x-slot>
</x-app-layout>
