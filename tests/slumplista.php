<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        form {
            width: 50%;
        }
    </style>
    <title>Slumplista</title>
</head>

<body>
    <div class="container">
        <h1>Slumplista</h1>
        <form method="post">
            <div class="form-group">
                <label class="control-label" for="antalTal">Hur många tal</label>
                <input class="form-control" type="number" name="nummer" value="10">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Slumpa</button>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nummer = $_POST["nummer"];

            $lista = [];

            echo "<h1>Lista</h1>";

            echo "<ul class=\"list-group\">";

            for ($i = 0; $i < $nummer; $i++) {
                $lista[$i] = rand(1, 100);
                echo "<li  class=\"list-group-item\">{$lista[$i]}</li>";
            }
            echo "</ul>";

            $största = max($lista);

            echo "<h3>Största värdet är: {$största}</h3>\n";

            $minsta = min($lista);

            echo "<h3>Minsta värdet är: {$minsta}</h3>";
        }
        ?>
    </div>
</body>

</html>