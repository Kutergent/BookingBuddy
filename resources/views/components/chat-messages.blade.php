

<div class="space-y-2 h-fit">
    @foreach ($messages as $message)
    <div class="flex @if ($message->role === 'Admin') justify-end @else justify-start @endif">
        <div class="p-3 @if ($message->role === 'Admin') bg-indigo-800 text-white ml-2 @else bg-indigo-600 text-white mr-2 @endif rounded-lg">
            {{ $message->message }}
        </div>
    </div>
    @endforeach
</div>

