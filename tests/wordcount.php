<!DOCTYPE html>
<html lang="sv">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    form {
      display: flex;
      width: 50%;
    }
  </style>
  <title>Är det text eller siffra? </title>
</head>

<body>
  <div class="container">
    <h1>Är det text eller siffra? (decimal tal skrivs med punkt)</h1>

    <form method="post">
      <input class="form-control" type="text" name="text">
      <input class="btn btn-primary" type="submit" name="submit" value="Beräkna">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $text = $_POST["text"];

      if (is_numeric($text)) {
        echo "<h2>Det är siffra: {$text}</h2>";
      } else {
        echo "<h2>Det är text: {$text}</h2>";
      }
    }
    ?>
  </div>
</body>

</html>