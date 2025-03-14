<?php

if (isset($_POST["size"])) {

    $size = $_POST["size"];
    function generatePassword($size){
        $caracters = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%&*+?";
        $password = "";
        for ($i = 0; $i < $size; $i++) {
            $password .= $caracters[rand(0, strlen($caracters) - 1)];
        }
        return 
        "<div id=\"outside-div\" class=\"flex\" style=\"flex-direction: column\">
            <p id=\"msg\">Copied!</p>
            <div class=\"flex\">
                <button id=\"copyButton\" onclick=\"copy()\">
                    <span class=\"material-symbols-outlined\">content_copy</span>
                </button>
                <p id='pwd'>$password</p>
            </div>   
        </div>";
    };
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="scr/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css?v=2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=content_copy" />
    <title>Password Generator</title>
</head>
<body class="flex">
<script>
    const copyButton = document.getElementById("copyButton");
    copyButton.style.setProperty('--copied', 'none');

    function copy() {
        var password = document.getElementById("pwd");
        navigator.clipboard.writeText(password.textContent);
        copyButton.style.setProperty('--copied', 'block');
    }

    copyButton.addEventListener("click", copy);
</script>
    <h1>Password Generator</h1>
    <form method="post" class="flex">
        <input type="number" name="size" min="4" max="30" placeholder="Password Length" required>
        <button type="submit">Gerar senha</button>
    </form>
        <?php 
            if (isset($_POST["size"])) {
                echo generatePassword($size);
            }
        ?>

</body>
</html>