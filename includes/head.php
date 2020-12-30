<?php header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
?>
<?php
//get the last-modified-date of this very file
$lastModified = filemtime(__FILE__);
//get a unique hash of this file (etag)
$etagFile = md5_file(__FILE__);
//get the HTTP_IF_MODIFIED_SINCE header if set
$ifModifiedSince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
//get the HTTP_IF_NONE_MATCH header if set (etag: unique file hash)
$etagHeader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);

//set last-modified header
header("Last-Modified: " . gmdate("D, d M Y H:i:s", $lastModified) . " GMT");
//set etag-header
header("Etag: $etagFile");
//make sure caching is turned on
header('Cache-Control: public');

//check if page has changed. If not, send 304 and exit
if (@strtotime($ifModifiedSince) == $lastModified || $etagHeader == $etagFile) {
  header("HTTP/1.1 304 Not Modified");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php ROOT_PATH ?>/assets/img/favicon.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="<?php ROOT_PATH ?>/assets/css/animate.css" />
  <link rel="stylesheet" href="<?php ROOT_PATH ?>/assets/css/main.css" />
  <title><?php echo $title ?> | Cinemania</title>
  <meta name="description" content="" />
</head>
<?php require_once("registration_login.php");
?>
