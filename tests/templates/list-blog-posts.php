<?php
/**
 * Mall för listning av blogginlägg
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8" />
    <title>De senaste blogginläggen - Läxhjälpen </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='http://fonts.googleapis.com/css?family=merienda+One'
    rel='stylesheet' />
    <link href="css/laxhjalpen.css" rel="stylesheet" />
</head>
<body class="subpage">
<?php
require "masthead.php";
require "menu.php";
?>
<div role="main">
<h2>De senaste blogginläggen</h2>
<?php
foreach ( $temporary as $slug => $blogpost) {
    $slug = urlencode($slug);
    echo <<<ARTICLE
  <article class="blogpostlist">
    <h3><a href="blog.php?slug={$slug}">{$blogpost['title']}</a></h3>
    <p><small>Postad {$blogpost['pubdate']} av
{$blogpost['username']}</small></p>
   <div class="blogtext">
    {$blogpost['text']}
   </div>
  </article>
ARTICLE;
}
echo "</div>\n";

require "footer.php";
?>
</body>
</html>
