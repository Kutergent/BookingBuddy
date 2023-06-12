<!-- reservationcomplete.blade.php -->
<x-guest-layout>
    <div class="flex flex-col items-center justify-center h-screen">
        <h2 class="text-3xl font-bold mb-4">Reservation Complete</h2>
        <p class="text-lg text-gray-700 mb-8">Thank you for your reservation!</p>
        <p class="text-lg text-gray-700 mb-8">Please wait for an email confirmation at <strong class="text-blue-500">{{ $email }}</strong>.</p>
        <a href="{{ route("welcome") }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Go back to home</a>
    </div>
</x-guest-layout>
