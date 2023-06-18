<x-app-layout>

@php
    $calendarRoute = route('calendar');
    $rid = "nol";
@endphp

    <div class="mx-auto w-auto mt-4 bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="flex">
            <div class="w-1/3 bg-gray-200 mr-4 rounded text-center">
                <h3 class="mb-4 mt-4 text-2xl font-semibold leading-tight">Canceled</h3>
                <ul class="max-h-64 overflow-y-auto">
                    @foreach ($reservations as $res)
                        @if ($res->status === 'canceled')
                            <li>
                                <div class="bg-gray-100 p-4 rounded shadow-md flex justify-between items-center my-2 mx-2">
                                    <span class="mb-2">{{$res->name}}</span>
                                    <span class="text-sm text-gray-500">{{\Carbon\Carbon::parse($res->reserve_date)->format('d F Y')}}</span>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="w-1/3 bg-gray-300 rounded text-center">
                <h3 class="mb-4 mt-4 text-2xl font-semibold leading-tight">Pending</h3>
                <ul class="max-h-64 overflow-y-auto">
                    @foreach ($reservations as $res)
                        @if ($res->status === 'pending')
                            <li>
                                <div class="bg-gray-200 p-3 rounded shadow-md flex justify-between items-center my-2 mx-2">
                                    <div class="text-left">
                                        <span class="mb-2">{{$res->name}}</span>
                                        <span class="text-sm text-gray-500">{{\Carbon\Carbon::parse($res->reserve_date)->format('d F Y')}}</span>
                                    </div>
                                    <div class="flex justify-center">
                                        <button type="button" id="pendingConfirmButton" class="confirm-button mr-2 bg-yellow-600 border border-transparent font-semibold text-white py-2 px-4 rounded tracking-widest hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 text-lg"
                                                data-reservation-id="{{$res->id}}"
                                                data-reservation-name="{{$res->name}}"
                                                data-reservation-date="{{\Carbon\Carbon::parse($res->reserve_date)->format('d F Y')}}">
                                            !
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>



            <div class="w-1/3 bg-gray-400 ml-4 rounded text-center">
                <h3 class="mb-4 mt-4 text-2xl font-semibold leading-tight">Upcoming</h3>
                <ul class="max-h-64 overflow-y-auto">
                    @foreach ($reservations as $res)
                        @if ($res->status === 'confirmed' && \Carbon\Carbon::parse($res->reserve_date)->isFuture())
                            <li>
                                <div class="bg-gray-300 p-4 rounded shadow-md flex justify-between items-center my-2 mx-2">
                                    <span class="mb-2">{{$res->name}}</span>
                                    <span class="text-sm text-gray-500">{{\Carbon\Carbon::parse($res->reserve_date)->format('d F Y')}}</span>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>




    <div id="calendar" class="mx-auto w-auto mt-4 bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6"></div>

    {{-- Modal for Confirm/Cancel --}}
    <div id="confirmationModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

        <div class="bg-white p-4 rounded-lg relative">
            <button id="closeconfirmationModal" class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:text-gray-800 focus:text-gray-800 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>
            <p id="modalMessage"></p>
            <div class="mt-4 flex justify-end">
                <button id="cancelButton" class="mr-2 bg-red-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto py-2 px-4 rounded">No</button>
                <button id="confirmButton" class="mr-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto py-2 px-4 rounded">Yes</button>

            </div>
        </div>
    </div>

    {{-- Modal for showDetail --}}

    <div id="reservationModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-4 rounded-lg relative">
            <button id="closeReservationModal" class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:text-gray-800 focus:text-gray-800 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <h2 id="reservationModalTitle" class="text-xl font-bold mb-4">Order Details</h2>
            <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <p class="font-semibold">Name:</p>
                <p id="reservationModalName"></p>
            </div>
            <div class="mb-4">
                <p class="font-semibold">Email:</p>
                <p id="reservationModalEmail"></p>
            </div>
            <div class="mb-4">
                <p class="font-semibold">Phone:</p>
                <p id="reservationModalPhone"></p>
            </div>
            <div class="mb-4">
                <p class="font-semibold">Date of Birth:</p>
                <p id="reservationModalDateOfBirth"></p>
            </div>
            <div class="mb-4">
                <p class="font-semibold">Reserve Date:</p>
                <p id="reservationModalDate"></p>
            </div>
            <div class="mb-4">
                <p class="font-semibold">Reserve Time:</p>
                <p id="reservationModalTime"></p>
            </div>
            <div id="reservationModalExtra" class="col-span-2"></div>
        </div>

        <div class="mt-4 flex justify-center">
            <button id="cancelReservationButton" class="mr-2 bg-red-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto py-2 px-4 rounded">Cancel</button>
            <button id="confirmReservationButton" class="mr-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto py-2 px-4 rounded">Confirm</button>

        </div>
    </div>
</div>





    <x-slot name="scripts">
        <script>
            var calendarRoute = "{{ $calendarRoute }}";
            //Convert thing
            function convertTo12HourFormat(time) {
                var parts = time.split(':');
                var hours = parseInt(parts[0]);
                var minutes = parseInt(parts[1]);
                var seconds = parseInt(parts[2]);

                var meridiem = hours >= 12 ? 'PM' : 'AM';
                var twelveHourFormatHours = hours % 12 || 12;

                return twelveHourFormatHours + ':' + (minutes < 10 ? '0' : '') + minutes + ' ' + meridiem;
            }

            function fetchReservation(reservationId, type) {
                fetch('http://localhost/BookingBuddy/public/reservation/' + reservationId)
                    .then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    throw new Error('API request failed');
                    })
                    .then(data => {
                    confirmationModal.classList.remove('hidden');
                    var date = new Date(data.reserve_date);
                    var options = { day: '2-digit', month: 'long', year: 'numeric' };
                    var reservationDate = date.toLocaleDateString('en-GB', options);

                    if (type == "cancel") {
                        modalTitle.textContent = 'Cancellation';
                        modalMessage.textContent = 'Are you sure you want to cancel the reservation for ' + data.name + ' on ' + reservationDate + ' at ' + convertTo12HourFormat(data.reserve_time) + '?';
                        confirmButton.addEventListener('click', function() {
                            confirmationModal.classList.add('hidden');
                            fetchCancellation(reservationId, calendarRoute)
                        })
                    }else{
                        modalTitle.textContent = 'Confirmation';
                        modalMessage.textContent = 'Are you sure you want to confirm the reservation for ' + data.name + ' on ' + reservationDate + ' at ' + convertTo12HourFormat(data.reserve_time) + '?';
                        confirmButton.addEventListener('click', function() {
                            fetchConfirmation(reservationId, calendarRoute)
                        })
                    }






                    })
                    .catch(error => {
                    console.error(error);
                    });
            }

            function fetchConfirmation(reservationId, calendarRoute) {

                fetch('http://localhost/BookingBuddy/public/confirmation/' + reservationId, {
                    method: 'GET',
                })
                    .then(response => {
                    if (response.ok) {
                        window.location.href = calendarRoute;
                        return response.json();
                    }
                    throw new Error('API request failed');
                    })
                    .then(data => {
                    // Handle the response data or display an alert
                    })
                    .catch(error => {
                    console.error(error);
                    });
            }

            function fetchCancellation(reservationId, calendarRoute) {
                fetch('http://localhost/BookingBuddy/public/cancelation/' + reservationId, {
                    method: 'GET',
                })
                    .then(response => {
                    if (response.ok) {
                        window.location.href = calendarRoute;
                        return response.json();
                    }
                    throw new Error('API request failed');
                    })
                    .then(data => {
                    // make alert or something
                    })
                    .catch(error => {
                    console.error(error);
                    });
            }


            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var confirmationModal = document.getElementById('confirmationModal');
                var confirmButton = document.getElementById('confirmButton');
                var cancelButton = document.getElementById('cancelButton');
                // var confirmButtons = document.querySelectorAll('.confirm-button');
                var cancelButtons = document.querySelectorAll('.cancel-button');
                var pendingConfirmButtons = document.querySelectorAll('#pendingConfirmButton');




                var extraContainer = document.getElementById('reservationModalExtra');
                var reservationModal = document.getElementById('reservationModal')
                var closeReservationModal = document.getElementById('closeReservationModal');

                var cancelReservationButton = document.getElementById('cancelReservationButton')
                var confirmReservationButton = document.getElementById('confirmReservationButton')






                closeconfirmationModal.addEventListener ('click', function() {

                    reservationModal.classList.add('hidden')
                    confirmationModal.classList.add('hidden')
                })

                closeReservationModal.addEventListener ('click', function() {

                    reservationModal.classList.add('hidden')
                    confirmationModal.classList.add('hidden')
                })

                cancelButton.addEventListener ('click', function() {

                reservationModal.classList.add('hidden')
                confirmationModal.classList.add('hidden')
                })








                // confirmButtons.forEach(function(button) {
                //     button.addEventListener('click', function() {
                //         var reservationId = button.getAttribute('data-reservation-id');
                //         fetchReservation(reservationId, "confirm")
                //     });
                // });

                // cancelButtons.forEach(function(button) {
                //     button.addEventListener('click', function() {
                //         var reservationId = button.getAttribute('data-reservation-id');
                //         fetchReservation(reservationId, "cancel")

                //     });
                // });

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap5',
                    events: [
                        @foreach($reservations as $reservation)
                        {
                            title: '{{ ucfirst($reservation->name) }} - '+ convertTo12HourFormat('{{ $reservation->reserve_time }}' ),
                            start: '{{ $reservation->reserve_date }}',
                            end: '{{ $reservation->reserve_date }}',
                            @if ($reservation->status === 'confirmed')
                            classNames: 'bg-indigo-600 bg-indigo-600 text-white whitespace-normal',
                            @elseif ($reservation->status === 'pending')
                            classNames: 'bg-yellow-600 border-yellow-600 text-black whitespace-normal',
                            @elseif ($reservation->status === 'canceled')
                            classNames: 'bg-red-800 border-red-800 text-white whitespace-normal',
                            @endif
                            extendedProps: {
                                name: '{{ $reservation->name }}',
                                email: '{{ $reservation->email }}',
                                phone: '{{ $reservation->phone_number }}',
                                dob: '{{ $reservation->dob }}',
                                date: '{{ $reservation->reserve_date }}',
                                time: '{{ $reservation->reserve_time }}',
                                status: '{{ $reservation->status }}',
                                id: '{{ $reservation->id }}'

                            },

                        },
                        @endforeach
                    ],
                    eventClick: function(info) {
                                console.log("Clicked the event");
                                var reservation = info.event.extendedProps.id;
                                epicModal(reservation);
                            },
                });

                calendar.render();

                function epicModal(reservationId){

                    var modalTitle = document.getElementById('reservationModalTitle');
                    const nameField = document.getElementById('reservationModalName');
                    const emailField = document.getElementById('reservationModalEmail');
                    const phoneField = document.getElementById('reservationModalPhone');
                    const dateOfBirthField = document.getElementById('reservationModalDateOfBirth');
                    const dateField = document.getElementById('reservationModalDate');
                    const timeField = document.getElementById('reservationModalTime');
                    var reservationModal = document.getElementById('reservationModal')



                    fetch('http://localhost/BookingBuddy/public/reservation/' + reservationId)
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('API request failed');
                    })
                    .then(data => {
                        console.log(data)
                        // Update the reservationModal with data
                        document.getElementById('reservationModalTitle').textContent = "Reservation Details"
                        document.getElementById('reservationModalName').textContent = data.name;
                        document.getElementById('reservationModalEmail').textContent = data.email;
                        document.getElementById('reservationModalPhone').textContent = data.phone_number;
                        document.getElementById('reservationModalDateOfBirth').textContent = data.dob;
                        document.getElementById('reservationModalDate').textContent = data.reserve_date;
                        document.getElementById('reservationModalTime').textContent = convertTo12HourFormat(data.reserve_time);

                        if(data.status != 'pending'){
                            confirmReservationButton.classList.add('hidden')
                            cancelReservationButton.classList.add('hidden')
                        }else{
                            confirmReservationButton.classList.remove('hidden')
                            cancelReservationButton.classList.remove('hidden')
                        }
                        // ...

                        // Show the reservationModal
                        reservationModal.classList.remove('hidden');
                    })
                    .catch(error => {
                        console.error(error);
                    });

                    fetch('{{ route('check-reservation') }}?fieldReservationId=' + reservationId, {
                        method: 'GET'
                    })
                    .then(function(response) {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error('Request failed.');
                        }
                    })
                    .then(function(data) {
                        if (data.data.length > 0) {
                            console.log(data.data);
                            const extraWrapper = document.createElement('div');
                            extraWrapper.classList.add('grid', 'grid-cols-2', 'gap-4', 'mb-4');

                            Object.values(data.data).forEach((f) => {
                                const extraTitleElement = document.createElement('p');
                                extraTitleElement.classList.add('font-semibold');
                                extraTitleElement.textContent = f.name;

                                const extraContentElement = document.createElement('p');
                                extraContentElement.textContent = f.textbox;

                                extraWrapper.appendChild(extraTitleElement);
                                extraWrapper.appendChild(extraContentElement);
                            });

                            extraContainer.appendChild(extraWrapper);


                            var closeReservationModal = document.getElementById('closeReservationModal');

                            closeReservationModal.addEventListener ('click', function() {
                                if (extraContainer.contains(extraWrapper)) {
                                    extraContainer.removeChild(extraWrapper);
                                }
                                reservationModal.classList.add('hidden')
                                confirmationModal.classList.add('hidden')
                            })
                            closeConfirmationModal.addEventListener ('click', function() {
                                if (extraContainer.contains(extraWrapper)) {
                                    extraContainer.removeChild(extraWrapper);
                                }
                                reservationModal.classList.add('hidden')
                                confirmationModal.classList.add('hidden')
                            })
                        }
                    })
                    .catch(function(error) {
                        console.error(error);
                    });

                    confirmReservationButton.addEventListener ('click', function(){
                    reservationModal.classList.add('hidden')
                    fetchReservation(reservationId,"confirm")
                    })

                    cancelReservationButton.addEventListener ('click', function(){
                    reservationModal.classList.add('hidden')
                    fetchReservation(reservationId,"cancel")
                    })




                }

                pendingConfirmButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var reservationId = button.getAttribute('data-reservation-id');
                        epicModal(reservationId);
                    });
                });
            });
        </script>

    </x-slot>

</x-app-layout>
