<?php
require '../classes/Autoloader.php';
if( ! User::isLogedin())
{
    Header('Location: login.php');
    die();
}

echo "Hallo : " . User::authenticated()->getUsername();
echo "<a href='logout.php'>Logout</a>";


$gallery = new Gallery();
?>

<table class="table" style="border:1px solid black;">
    <thead>
        <tr>
            <td>Name</td>
            <td>Path</td>
            <td>View</td>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($gallery->all() as $image)
    {
        ?>
        <tr>
            <td><?=$image->getName()?></td>
            <td><?=$image->getPath()?></td>
            <td><a href="image.php?image=<?=base64_encode($image->getName(true))?>">View</a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

