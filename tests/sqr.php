<!DOCTYPE html>
<html lang="sv">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php ROOT_PATH ?>/https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    form {
      display: flex;
      width: 50%;
    }
  </style>
  <title>Kvadratrot</title>
</head>

<body>
  <div class="container">
    <h1>Kvadratroten kalkylator</h1>
    <form method="post">
      <input class="form-control" type="number" name="nummer">
      <input class="btn btn-primary" type="submit" name="submit" value="Kvadrera">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nummer = $_POST["nummer"];

      $kvadratrot = sqrt($nummer);

      echo "<h1>Kvadratroten av {$nummer} är {$kvadratrot}</h1>";
    }
    ?>
  </div>
</body>

</html>
