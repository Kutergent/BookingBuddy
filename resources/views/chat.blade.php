<x-app-layout>
        <div class="flex mt-2 h-screen">
            <div class="w-1/4 bg-white rounded-lg shadow-lg mr-2">
                <div class="p-4 border-b">
                    <h2 class="text-lg font-semibold">User List</h2>
                </div>
                <div class="p-4 h-screen overflow-auto">
                    <ul class="space-y-2">
                        @foreach ($user as $user)
                        <li class="cursor-pointer hover:text-blue-500" onclick="selectUser({{ $user->id }})">
                            {{ $user->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w-3/4 bg-white rounded-lg shadow-lg h-screen">
                <div class="bg-gray-100 p-4 border-b">
                    Chat with <span id="selected-user">User</span>
                </div>
                <div class="p-4 h-fit overflow-y-auto" id="chat-container">

                </div>
                <form id="chat-form" method="post">
                    @csrf
                    <div class="p-4 flex items-center">
                        <input type="hidden" name="user_id" value="" id="user_id_input">
                        <input type="text" name="message" class="flex-1 rounded-lg border p-2" placeholder="Enter your message">
                        <button class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>

    <script>
        function scrollToBottom() {
            var chatContainer = document.getElementById('chat-container')
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        function refreshChat(){
            const userId = document.getElementById('user_id_input').value
            selectUser(userId)
        }

        window.onload = function() {
            scrollToBottom()
            setInterval(refreshChat, 10000)
        };

        document.getElementById('chat-form').addEventListener('submit', function (e) {
            e.preventDefault();
            fetch('{{ route('chat.store') }}', {
                method: 'POST',
                body: new FormData(document.getElementById('chat-form'))
            }).then(response => {
                document.querySelector('input[name="message"]').value = '';
                const userId = document.getElementById('user_id_input').value
                selectUser(userId)
            }).catch(error => {
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            scrollToBottom();
        });

        function selectUser(userId) {
            document.getElementById('user_id_input').value = userId;
            const selectedUserElement = document.getElementById('selected-user');
            const userElement = document.querySelector(`[onclick="selectUser(${userId})"]`);
            selectedUserElement.textContent = userElement.textContent;

            fetch('{{ route('getUserChat') }}?id=' + userId)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('chat-container').innerHTML = data;
                    scrollToBottom();
                });
        }
    </script>
</x-app-layout>
