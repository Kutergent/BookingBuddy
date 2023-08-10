<x-app-layout>
    <div class="container">
        <div class="flex mt-8">
            <div class="w-1/4 bg-white rounded-lg shadow-lg">
                <div class="p-4 border-b">
                    <h2 class="text-lg font-semibold">User List</h2>
                </div>
                <div class="p-4 h-96 overflow-auto">
                    <ul class="space-y-2">
                        @foreach ($user as $user)
                        <li class="cursor-pointer hover:text-blue-500" onclick="selectUser({{ $user->id }})">
                            {{ $user->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w-3/4 bg-white rounded-lg shadow-lg">
                <div class="bg-gray-100 p-4 border-b">
                    Chat with <span id="selected-user">User</span>
                </div>
                <div class="p-4 h-64 overflow-y-auto" id="chat-container">

                </div>
                <form action="{{ route('chat.store') }}" method="post">
                    @csrf
                    <div class="p-4">
                        <div class="flex">
                            <input type="hidden" name="id" value="1" id="user_id_input">
                            <input type="text" name="message" class="w-full rounded-lg border p-2" placeholder="Enter your message">
                            <button class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function scrollToBottom() {
            var chatContainer = document.getElementById('chat-container');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        window.onload = function() {
            scrollToBottom();
        };

        document.addEventListener('DOMContentLoaded', function() {
            scrollToBottom();
        });

        function selectUser(userId) {
            document.getElementById('user_id_input').value = userId;
            const selectedUserElement = document.getElementById('selected-user');
            const userElement = document.querySelector(`[onclick="selectUser(${userId})"]`);
            selectedUserElement.textContent = userElement.textContent;

            // Fetch and update chat messages based on selected user
            fetch('{{ route('getUserChat') }}?id=' + userId)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('chat-container').innerHTML = data;
                    scrollToBottom();
                });
        }
    </script>
</x-app-layout>
