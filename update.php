<?php
require_once("check.php");
function edit_users_personal($conn, $name, $surname, $login, $password, $id, $language)
{
    $sql = "UPDATE `users` SET `name`='$name', `surname`='$surname', `login`='$login', `password`='$password', `language`='$language' WHERE `users`.`id`='$id'";
    mysqli_query($conn, $sql);
}
?>