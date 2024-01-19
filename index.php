<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chat with GPT</title>
    <script>
        async function sendMessage() {
            let userInput = document.getElementById("userInput").value;
            let response = await fetch('/send_message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: userInput })
            });
            let data = await response.json();
            document.getElementById("gptResponse").textContent = "ChatGPT: " + data.response;
        }
    </script>
</head>
<body>
    <input type="text" id="userInput" />
    <button onclick="sendMessage()">Send</button>
    <p id="gptResponse"></p>
    <h1>Welcome to Dashboard</h1>
    <a href="logout.php" class="btn btn-warning">Logout</a>
    
</body>
</html>