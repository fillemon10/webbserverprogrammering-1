<!DOCTYPE html>
<html lang="sv">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text eller siffra?</title>
</head>
<body>
<form method="post">
    <input type="text" name="text">
    <input type="submit" name="submit" value="Beräkna">
    
</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $text = $_POST["text"];

    if(is_numeric($text)) {
        echo "<h2>Det är siffra: {$text}</h2>";
     }else {
        echo"<h2>Det är text:{$text}</h2>";
    }
}
?>
</body>
</html>