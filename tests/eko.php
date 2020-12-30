<!DOCTYPE html>
<html lang="sv">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php ROOT_PATH ?>/https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    form {
      display: flex;
      width: 50%;
    }
  </style>
  <title>Räkna ord</title>
</head>

<body>
  <div class="container">
    <h1>Räkna ord</h1>

    <form method="post">
      <input class="form-control" type="text" name="text">
      <input class="btn btn-primary" type="submit" name="submit" value="Beräkna">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $text = $_POST["text"];

      $antalord = str_word_count($text);
      echo "<h2>Texten innehåller {$antalord}st ord.</h2>";
    }
    ?>
  </div>
</body>

</html>
