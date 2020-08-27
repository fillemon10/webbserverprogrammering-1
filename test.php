<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <?php
    echo (strftime("%B %D %Y %X", mktime(10, 0, 0, 11, 21, 2004)) . "<br />");
    echo (strftime("%b %d %Y %X", mktime(20, 0, 0, 12, 31, 98)) . "<br />");
    echo (strftime("Today is %a on %b %d, %Y, %X time zone: %Z", time()));
    echo 
    ?>
</body>

</html>