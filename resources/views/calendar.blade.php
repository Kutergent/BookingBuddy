<x-app-layout>

    <div class="mx-auto w-auto mt-4 bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="flex">
            <div class="w-1/3 bg-gray-200 mr-4 rounded text-center">
                <h3 class="mb-4 mt-4 text-2xl font-semibold leading-tight">Canceled</h3>
                <ul>
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
                <ul>
                    @foreach ($reservations as $res)
                        @if ($res->status === 'pending')
                            <li>
                                <div class="bg-gray-200 p-3 rounded shadow-md flex justify-between items-center my-2 mx-2">
                                    <div class="text-left">
                                        <span class="mb-2">{{$res->name}}</span>
                                        <span class="text-sm text-gray-500">{{\Carbon\Carbon::parse($res->reserve_date)->format('d F Y')}}</span>
                                    </div>
                                    <div class="flex justify-center">
                                        <button type="button" id="pendingConfirmButton" class="confirm-button mr-2 bg-gray-800 border border-transparent font-semibold text-xs text-white py-2 px-4 rounded tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            data-reservation-id="{{$res->id}}"
                            data-reservation-name="{{$res->name}}"
                            data-reservation-date="{{\Carbon\Carbon::parse($res->reserve_date)->format('d F Y')}}">
                        <svg class="h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 11l2-2 5 5L20 3l2 2L7 20z" />
                        </svg>
                    </button>
                    <button type="button" id="cancel-button pendingCancelButton" class="bg-red-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto py-2 px-4 rounded"
                            data-reservation-id="{{$res->id}}"
                            data-reservation-name="{{$res->name}}"
                            data-reservation-date="{{\Carbon\Carbon::parse($res->reserve_date)->format('d F Y')}}">
                        <svg class="h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                        </svg>
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
                <ul>
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


    <div id="confirmationModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-4 rounded-lg">
            <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>
            <p id="modalMessage"></p>
            <div class="mt-4 flex justify-end">
                <button id="confirmButton" class="mr-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto py-2 px-4 rounded">Confirm</button>
                <button id="cancelButton" class="mr-2 bg-red-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-auto py-2 px-4 rounded">Cancel</button>
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
                var confirmButtons = document.querySelectorAll('.confirm-button');
                var cancelButtons = document.querySelectorAll('.cancel-button');

                confirmButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        console.log('Confirm button clicked');
        var reservationId = button.getAttribute('data-reservation-id');
        var reservationName = button.getAttribute('data-reservation-name');
        var reservationDate = button.getAttribute('data-reservation-date');

        // Update the content of the confirmation modal
        modalTitle.textContent = 'Confirmation';
        modalMessage.textContent = 'Are you sure you want to confirm the reservation for ' + reservationName + ' on ' + reservationDate + '?';

        // Display the confirmation modal
        var confirmationModal = document.getElementById('confirmationModal');
        confirmationModal.classList.remove('hidden');

        confirmButton.addEventListener('click', function(){
            fetch('https://api.example.com/reservations/' + reservationId, {
    method: 'POST', // or 'GET', 'PUT', 'DELETE', etc. depending on your API
    headers: {
      'Content-Type': 'application/json',
      // Include any required headers for your API
    },
    // Include any request body or additional options as needed
  })
  .then(function(response) {
    // Handle the API response
    if (response.ok) {
      // API call was successful
      return response.json(); // or response.text() or other response format
    } else {
      // API call failed
      throw new Error('API request failed');
    }
  })
  .then(function(data) {
    // Handle the API response data
    console.log(data);
    // Perform any desired actions with the response data
  })
  .catch(function(error) {
    // Handle any errors that occurred during the API call
    console.error(error);
  });
        })
    });
});

cancelButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        console.log('Confirm button clicked');
        var reservationId = button.getAttribute('data-reservation-id');
        var reservationName = button.getAttribute('data-reservation-name');
        var reservationDate = button.getAttribute('data-reservation-date');

        // Update the content of the confirmation modal
        modalTitle.textContent = 'Cancellation';
        modalMessage.textContent = 'Are you sure you want to cancel the reservation for ' + reservationName + ' on ' + reservationDate + '?';

        // Display the confirmation modal
        var confirmationModal = document.getElementById('confirmationModal');
        confirmationModal.classList.remove('hidden');
    });
});


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
                                    status: '{{ $reservation->status }}',
                                },
                            },
                        @endforeach
                    ],
                    // eventClick: function(info) {
                    //     // Show confirmation modal
                    //     confirmationModal.classList.remove('hidden');

                    //     // Handle confirm button click
                    //     confirmButton.addEventListener('click', function() {
                    //         // Perform confirmation action (you can make an API request or any other action)
                    //         // You can access the reservation ID using `info.event.id` and handle the confirmation accordingly

                    //         // Close the modal
                    //         confirmationModal.classList.add('hidden');
                    //     });

                    //     // Handle cancel button click
                    //     cancelButton.addEventListener('click', function() {
                    //         // Close the modal
                    //         confirmationModal.classList.add('hidden');
                    //     });
                    // },
                });

                calendar.render();
            });
        </script>
    </x-slot>
</x-app-layout>
