        {{-- Toggle chat popup --}}
        <div class="fixed bottom-4 right-4">
            <button class="p-3 rounded-full bg-indigo-600 text-white hover:bg-indigo-500" onclick="toggleChatPopup()">


                <svg fill="#FFFFFF" class="h-6 w-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" xml:space="preserve">
                <path d="M30,1.5c-16.542,0-30,12.112-30,27c0,5.205,1.647,10.246,4.768,14.604c-0.591,6.537-2.175,11.39-4.475,13.689
                    c-0.304,0.304-0.38,0.769-0.188,1.153C0.276,58.289,0.625,58.5,1,58.5c0.046,0,0.093-0.003,0.14-0.01
                    c0.405-0.057,9.813-1.412,16.617-5.338C21.622,54.711,25.738,55.5,30,55.5c16.542,0,30-12.112,30-27S46.542,1.5,30,1.5z"/>
                </svg>
            </button>
        </div>

        {{-- Chat Popup --}}
        <div class="hidden customer-chat-popup fixed bottom-4 right-4 bg-gunmetal rounded-lg shadow-lg p-4">
            <div class="flex items-center justify-between">
                <div class="cursor-pointer toggle-customer-chat">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white hover:text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.646 9.646a.5.5 0 0 1 .708 0L10 14.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </div>
                <div class="text-white">Chat with Admin</div>
                <div>
                </div>
            </div>
            <div class="chat-container h-64 overflow-y-auto" id="chat-container">
                @include('components.chat-messages-dark', ['messages' => $messages])
            </div>
            <form id="chat-form" method="POST">
                @csrf
                <div class="p-4">
                    <div class="flex">
                        <input type="text" name="message" class="w-full rounded-lg border p-2" placeholder="Enter your message">
                        <button class="ml-2 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function toggleChatPopup() {
                const chatPopup = document.querySelector('.customer-chat-popup')
                chatPopup.classList.toggle('hidden');
            }

            function scrollToBottom() {
                var chatContainer = document.getElementById('chat-container')
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
            function refreshChat(){
                const userId = '{{auth()->id()}}'
                getChatData(userId)
            }
            function getChatData(userId) {

            fetch('{{ route('getUserChat') }}?id=' + userId)
            .then(response => response.text())
            .then(data => {
                document.getElementById('chat-container').innerHTML = data;
                scrollToBottom();
            });
            }

            document.getElementById('chat-form').addEventListener('submit', function (e) {
                e.preventDefault();
                fetch('{{ route('chat.cstore') }}', {
                    method: 'POST',
                    body: new FormData(document.getElementById('chat-form'))
                }).then(response => {
                    document.querySelector('input[name="message"]').value = ''
                    var userId = '{{auth()->id()}}'
                    getChatData(userId)

                }).catch(error => {

                });
            });


            window.onload = function() {
                scrollToBottom()
                setInterval(refreshChat, 10000)
            };

            document.addEventListener('DOMContentLoaded', function() {
                scrollToBottom()
            });
            const customerChatPopup = document.querySelector('.customer-chat-popup');
            const toggleCustomerChat = document.querySelectorAll('.toggle-customer-chat');

            toggleCustomerChat.forEach(button => {
                button.addEventListener('click', () => {
                    customerChatPopup.classList.toggle('hidden');
                });
            });


        </script>
