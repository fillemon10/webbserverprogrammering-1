<?php ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De senaste blogginläggen - Läxhjälpen</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Merienda+One">
    <link rel="stylesheet" href="css/laxhjalpen.css">
</head>
<body class="subpage">
<?php 
require "masthead.php";
require "menu.php";
?>
<div role=main>
    <h2>De senaste blogginläggen</h2>
    <?php 
    foreach ( $temporary as $slug => $blogpost) {
        $slug = urlencode($slug);
        echo <<<ARTICLE
        <article class="blogpostlist">
        <h3><a href='blog.php?slug={$slug}'>{$blogpost['title']}</h3>
        <p><small>Postad {$blogpost['pubdate']} av {$blogpost['username']}</small></p>
        <div class="blogtext"> {blogpost['text']}
        </div>
        </article>
        ARTICLE;
    }
    echo "</div>\n";
    require "footer.php";
    ?>
</div>
</body>
</html>