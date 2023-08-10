<div class="space-y-2">
    @foreach ($messages as $message)
    <div class="flex @if ($message->role === 'Admin') justify-start @else justify-end @endif">
        <div class="p-3 @if ($message->role === 'Admin') bg-red-600 text-white @else bg-blue-600 text-white @endif rounded-lg">
            {{ $message->message }}
        </div>
    </div>
    @endforeach
</div>
