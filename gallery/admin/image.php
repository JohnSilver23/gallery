<?php
require '../classes/Autoloader.php';
if( ! User::isLogedin())
{
    Header('Location: login.php');
    die();
}

$image = base64_decode($_GET['image']);

$gallerij = new Gallery();
$image = $gallerij->get($image);
?>
<div style="margin-left:auto;margin-right: auto;">
    <img src="<?=$image->webPath()?>">
</div>
<a href="index.php">Back</a>
