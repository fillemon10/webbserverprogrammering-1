<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8" />
    <title><?php echo "{$blogpost['title']} - Läxhjälpens -> blogg"; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='http://fonts.googleapis.com/css?family=merienda+One'
    rel='stylesheet' />
    <link href="css/laxhjalpen.css" rel="stylesheet" />
</head>

<body class="subpage">
   <?php
   require "masthead.php";
   require "menu.php";

   echo <<<MAIN
<div role "main">
 <article class="singleblogpost">
   <h2>{$blogpost['title']}</h2>
   <p><small>Postad {$blogpost['pubdate']} av
{$blogpost['username']}</small></p>
   <div class="blogtext">
    {$blogpost['text']}
   </div>
   <!-- här ska kommentarer listas i framtiden samt ett formulär för att skriva kommentarer -->
   </article>
</div>
MAIN;

   require "footer.php";
   ?>
</body>