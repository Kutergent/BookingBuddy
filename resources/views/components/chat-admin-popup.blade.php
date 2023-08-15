<!-- Button thing -->
<div class="z-10 fixed bottom-4 right-4">
    <button class="p-3 rounded-full bg-indigo-600 text-white hover:bg-indigo-500" onclick="toggleUsersPopup()">
        <svg fill="#FFFFFF" class="h-6 w-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" xml:space="preserve">
        <path d="M30,1.5c-16.542,0-30,12.112-30,27c0,5.205,1.647,10.246,4.768,14.604c-0.591,6.537-2.175,11.39-4.475,13.689
                    c-0.304,0.304-0.38,0.769-0.188,1.153C0.276,58.289,0.625,58.5,1,58.5c0.046,0,0.093-0.003,0.14-0.01
                    c0.405-0.057,9.813-1.412,16.617-5.338C21.622,54.711,25.738,55.5,30,55.5c16.542,0,30-12.112,30-27S46.542,1.5,30,1.5z"/>
        </svg>
    </button>
</div>

<div class="flex h-fit">
    <!-- User List -->
    <div class="hidden z-40 bg-white rounded-lg shadow-lg mr-2 bottom-4 right-4 users-popup fixed max-h-96">
        <div class="bg-gunmetal text-white p-4 rounded-t-lg">
            <div class="flex items-center justify-between">
                <div class="cursor-pointer toggle-users-list">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.646 9.646a.5.5 0 0 1 .708 0L10 14.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </div>
                <div class="text-white">Chat</div>
                <div></div>
            </div>
        </div>

        <div class="bg-white rounded-b-lg overflow-y-auto max-h-64">
            <div class="p-4">
                <ul class="space-y-2">
                    @foreach ($user as $user)
                    <li>
                        <button class="w-full text-left hover:bg-gray-100 p-3 rounded-lg transition duration-300 ease-in-out focus:outline-none" onclick="openChat({{ $user->id }})">
                            <div class="flex items-center">
                                <div class="flex-1">
                                    <h3 class="font-semibold">{{ $user->name }}</h3>
                                </div>
                            </div>
                        </button>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>



    <!-- Chat Window -->
    <div class="hidden z-50 chat-popup fixed bottom-4 right-4 bg-gunmetal rounded-lg shadow-lg p-4">
        <div class="flex items-center justify-between">
            <div class="cursor-pointer toggle-chat">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white hover:text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.646 9.646a.5.5 0 0 1 .708 0L10 14.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </div>
            <div class="text-white">Chat with
                <span id="selected-user">User</span>
            </div>
            <div></div>
        </div>
        <div class="chat-container h-64 overflow-y-auto" id="chat-container">
            @include('components.chat-messages', ['messages' => $messages])
        </div>
        <form id="chat-form" method="POST">
            @csrf
            <div class="p-4">
                <div class="flex">
                    <input type="hidden" name="user_id" value="" id="user_id_input">
                    <input type="text" name="message" class="w-full rounded-lg border p-2" placeholder="Enter your message">
                    <button class="ml-2 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500" type="submit">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const UsersPopup = document.querySelector('.users-popup')
    const chatPopup = document.querySelector('.chat-popup')
    const toggleUsers = document.querySelectorAll('.toggle-users-list')
    const toggleChat = document.querySelectorAll('.toggle-chat')

    toggleUsers.forEach(button => {
        button.addEventListener('click', () => {
            UsersPopup.classList.toggle('hidden')
        })
    })
    toggleChat.forEach(button => {
        button.addEventListener('click', () => {
            chatPopup.classList.toggle('hidden')
        })
    })

    function toggleUsersPopup() {
                const UsersPopup = document.querySelector('.users-popup')
                UsersPopup.classList.toggle('hidden')
            }
    function scrollToBottom() {
        var chatContainer = document.getElementById('chat-container')
        chatContainer.scrollTop = chatContainer.scrollHeight
    }
    function refreshChat(){
        const userId = document.getElementById('user_id_input').value
        const chatPopup = document.querySelector('.chat-popup')

        if (!chatPopup.classList.contains('hidden')) {
            openChat(userId)
        }
    }
    function openChat(userId) {
        const chatPopup = document.querySelector('.chat-popup')
        chatPopup.classList.remove('hidden')

        const userInputElement = document.getElementById('user_id_input')
        userInputElement.value = userId

        fetch('{{ route('getUserData') }}?id=' + userId)
            .then(response => response.json())
            .then(userData => {
                const selectedUserElement = document.getElementById('selected-user')
                selectedUserElement.textContent = userData.name
            })

        fetch('{{ route('getChat') }}?id=' + userId)
            .then(response => response.text())
            .then(data => {
                document.getElementById('chat-container').innerHTML = data
                scrollToBottom()
            })
    }
    window.onload = function() {
        scrollToBottom()
        setInterval(refreshChat, 10000)
    }

    document.getElementById('chat-form').addEventListener('submit', function (e) {
        e.preventDefault()
        fetch('{{ route('chat.store') }}', {
            method: 'POST',
            body: new FormData(document.getElementById('chat-form'))
        }).then(response => {
            document.querySelector('input[name="message"]').value = ''
            const userId = document.getElementById('user_id_input').value
            openChat(userId)
        }).catch(error => {
        })
    })

    document.addEventListener('DOMContentLoaded', function() {
        scrollToBottom()
    })
</script>
