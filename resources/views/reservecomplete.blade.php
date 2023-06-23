<!-- reservationcomplete.blade.php -->
<x-guest-layout>

    <div class="min-h-screen p-6 flex items-center justify-center bg-gray-950"
    style="background-size: cover; background-position: center center;">
        <div class="flex flex-col items-center justify-center p-4 rounded-lg mx-auto w-full max-w-[550px] shadow-xl bg-gray-200"
        style="box-shadow: rgba(0, 0, 0, 0.4) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
            
            <h2 class="text-3xl font-bold mb-4">Reservation Complete</h2>
            <p class="text-lg text-gray-800 mb-8">Thank you for your reservation!</p>
            <p class="text-center text-lg text-gray-800 mb-8">
                You can see your reservations below
            </p>            
            <a href="{{ route("myReservations") }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">See my Reservations</a>
       
        </div>
    </div>
        


</x-guest-layout>
