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

        .btn {
            margin-top: 10px;
            margin-right: 10px;
        }
    </style>
    <title>Multiarray</title>
</head>

<body>
    <div class="container">
        <h1 class="display-4">Uthyrda bilar</h1>

        <form method="post">
            <div class="form-group ">
                <label>Märke</label>
                <input class="form-control" type="text" name="märke">
                <label>Färg</label>
                <input class="form-control" type="text" name="färg">
                <label>Uthyrd till</label>
                <input class="form-control" type="text" name="till">
                <input class="btn btn-primary " type="submit" name="submit" value="Lägg till">
                <input class="btn btn-danger" type="submit" name="rensa" value="Rensa hela tabellen">
            </div>
        </form>
        <p>Märke är i alfabetisk ordning, bara bokstäver tillåtna i tabellen</p>
        <table class="table table-bordered">
            <tr>
                <th>Märke</th>
                <th>Färg</th>
                <th>Uthyrd till</th>
            <tr>

                <?php
                session_start();
                error_reporting(0);

                if (isset($_SESSION['bilar']) && !is_array($_SESSION['bilar'])) {
                    $_SESSION['bilar'] = array();
                }
                if (isset($_POST['rensa'])) {
                    unset($_SESSION['bilar']);
                }

                if (isset($_POST['submit']) && trim($_POST['märke']) != '' && trim($_POST['färg']) != '' && trim($_POST['till']) != '' && preg_replace("/[^a-zA-Z]+/", "", $_POST['märke']) != '' && preg_replace("/[^a-zA-Z]+/", "", $_POST['färg']) != '' && preg_replace("/[^a-zA-Z]+/", "", $_POST['till']) != '') {

                    $_SESSION['bilar'][] = array(preg_replace("/[^a-zA-ZåäöÅÄÖ ]+/", "", $_POST['märke']), preg_replace("/[^a-zA-ZåäöÅÄÖ ]+/", "", $_POST['färg']), preg_replace("/[^a-zA-ZåäöÅÄÖ ]+/", "", $_POST['till']));
                }

                foreach ($_SESSION['bilar'] as $key => $row) {
                    $bil[$key]  = $row[0];
                }

                array_multisort($bil, SORT_ASC, $_SESSION['bilar']);
                foreach ($_SESSION['bilar'] as $row) {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "</tr>";
                }
                ?>
    </div>
</body>

</html>