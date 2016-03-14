<?php
require '../classes/Autoloader.php';

if(User::isLogedin())
{
    $user = new User();
    $user->logout();
}
Header('Location: login.php');
