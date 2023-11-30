// const socket = new WebSocket('ws://localhost:8080');
const socket = new WebSocket('ws://localhost:8080');

socket.addEventListener('open', function (event) {
    console.log('WebSocket connected');
});

socket.addEventListener('message', function (event) {
    const receivedMessage = event.data;
    displayMessage(receivedMessage); // Implement this function to display messages in the chat interface
});

function sendMessage(message) {
    socket.send(message);
}

function displayMessage(message) {
    // Implement this function to display the message in the chat interface
    const chatMessages = document.getElementById('chat-messages');

    // Create a new <div> to display the message
    const messageDiv = document.createElement('div');
    messageDiv.textContent = message;

    // Append the message to the chat messages container
    chatMessages.appendChild(messageDiv);

    // Optional: Scroll to the bottom to show the latest message
    chatMessages.scrollTop = chatMessages.scrollHeight;
}
