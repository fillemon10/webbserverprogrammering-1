<html>
<head>
<title>Square root of a number</title>
</head>
<body>
<form method="post" action="">
<label>Enter a number</label>
<input type="text" name="input" value="" />
<input type="submit" name="submit" value="Submit" />
</form>
<?php
if(isset($_POST['submit'])) {
$input = $_POST['input'];
$ans = sqrt($input);
echo 'The square root of '.$input.'='.$ans;
}
?>
</body>
</html>