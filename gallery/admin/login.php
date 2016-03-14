<?php
require '../classes/Autoloader.php';

if(isset($_POST['username']) && isset($_POST['password']))
{
    $user = new User();
    if($user->check($_POST['username'], $_POST['password']))
    {
        $user->login();
        header('Location: index.php');
    } else
    {
        $error = 'Wrong username or password';
    }
}
?>
<h1>Please Login.</h1>

<?php
if(isset($error)) {
    ?>
    <div class="errors">
        <?=$error?>
    </div>
    <?php
}
?>

<form action="#" method="post">
    <label for="username">Username:</label>
    <input name="username" id="username">
    <label for="password">Password:</label>
    <input name="password" id="password" type="password">
    <input type="submit">
</form>
