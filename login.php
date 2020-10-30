<?php
require_once('check.php');
$a = $_GET['names'];
$b = $_GET['second'];
$admin = null;
foreach ($users as $key => $user) {
    if ($a == $user['login'] && $b == $user['password']) {
        session_start();
        $admin = new $roles[$user['role']]($user['name'],$user['surname'],$user['role'], $user['language'],$user['login'],$user['password']);
        $_SESSION['id']=$user['id'];
        $_SESSION['lang']=$user['language'];
        break;
    }
}
if ($admin){
    $admin->gotoNext();
} else {
    echo 'Неверный логин и\или пароль.';
}
?>