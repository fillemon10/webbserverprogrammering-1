<title><?php echo "{$blogpost['title']} - Läxhjälpens -> blogg"; ?></title>

<body class="subpage">
<?php
require "masthead.php";
require "menu.php";

echo <<<MAIN
<div role "main">
 <article class="singleblogpost">
   <h2>{$blogpost['title']}</h2>
   <p><small>Postad{$blogpost['pubdate']} av
{$blogpost['username']}</small></p>
   <div class="blogtext">
    {$blogpost['text']}
   </div>
   <!-- här ska kommentarer listas i framtiden samt ett formulär för att skriva kommentarer
   </article>
</div>
MAIN;

require "footer.php";
?>
</body>
