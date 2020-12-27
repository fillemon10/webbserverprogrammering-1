<!DOCTYPE html>
<html lang="sv">
  <head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multiarray</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <h2>Multiarray</h2>
  <form method ="post">
    <input name="bilmarke1" type="textornumber" placeholder="Bilmärke">
    <input name="bilfarg1" type="textornumber" placeholder="Färg">
    <br>
    <input name="bilmarke2" type="textornumber" placeholder="Bilmärke">
    <input name="bilfarg2" type="textornumber" placeholder="Färg">
    <br>
    <input name="bilmarke3" type="textornumber" placeholder="Bilmärke">
    <input name="bilfarg3" type="textornumber" placeholder="Färg"> <br>
    <input type="submit" value="Sortera efter bilmärke" name="submitcar"><br>
    <input type="submit" value="Sortera efter bilfärg" name="submitcolor">
  </form>
  <br>

  <?php
$bilMarke1 = $_POST['bilmarke1'];
$bilFarg1 = $_POST['bilfarg1'];
$bilMarke2 = $_POST['bilmarke2'];
$bilFarg2 = $_POST['bilfarg2'];
$bilMarke3 = $_POST['bilmarke3'];
$bilFarg3 = $_POST['bilfarg3'];

$cars=[
  ["car"=>$bilMarke1,"color"=>$bilFarg1],
  ["car"=>$bilMarke2,"color"=>$bilFarg2],
  ["car"=>$bilMarke3,"color"=>$bilFarg3]
];

if (isset($_POST['submitcar'])) {

  $carsort = array_column($cars, 'car');
  array_multisort($carsort, SORT_ASC, $cars);

  echo $cars[0]["car"]." ".$cars[0]["color"]."<br>";
  echo $cars[1]["car"]." ".$cars[1]["color"]."<br>";
  echo $cars[2]["car"]." ".$cars[2]["color"]."<br>";

}

if (isset($_POST['submitcolor'])) {

  $colorsort = array_column($cars, 'color');
  array_multisort($colorsort, SORT_ASC, $cars);

echo $cars[0]["color"]." ".$cars[0]["car"]."<br>";
echo $cars[1]["color"]." ".$cars[1]["car"]."<br>";
echo $cars[2]["color"]." ".$cars[2]["car"]."<br>";

}
	
?>
</head>
</html>