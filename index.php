<?php
session_start();
session_destroy();
require_once ("check.php");
$lang='en';
if(isset($_GET['lang'])){
$lang=$_GET['lang'];
}
$_SESSION['lang']=$lang;
if (isset($_GET['name'])) {
    $name=$_GET['name'];
    $surname=$_GET['surname'];
    $login=$_GET['login'];
    $password=$_GET['password'];
    $language=$_GET['language'];
    $role='client';
    $a=0;
    foreach ($users as $key => $user) {
        if ($login == $user['login']) {
            $id = $user['id'];
            edit_users($conn, $name, $surname, $login, $password, $id, $language, $role);
            $a=1;
        }
    }
    if($a==0) {
        add_users($conn, $name, $surname, $login, $password, $language, $role);
    }
}
?>
<html>
<body>
<h1><?=$translate[$lang]['Hello Guest']?>!</h1>
<br>
<?=$translate[$lang]['Enter login and password for authorization']?> :
<form action="login.php" method="get">
    <input name='names' type="text"/>
    <input name='second' type="password"/>
    <input type="submit" val='send!'/>
</form>
<a href="register.php"><?=$translate[$lang]['Registration']?></a>

<form action="index.php" method="GET">
    <select name="lang">
        <option value="ru">ru</option>
        <option value="ua">ua</option>
        <option value="it">it</option>
        <option value="en">en</option>
    </select>
    <input type="submit"/>
</form>
</body>
</html>