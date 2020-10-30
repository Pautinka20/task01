<?php
require_once("check.php");
$lang=$_SESSION['lang'];
session_destroy();
?>
<html>
<body>

<h1><?=$translate[$lang]['Registration']?>!</h1>
<form action="index.php" method="GET">
    <?=$translate[$lang]['Name']?> :
    <br>
    <input name='name' type="text"/>
    <br>
    <?=$translate[$lang]['Surname']?> :
    <br>
    <input name='surname' type="text"/>
    <br>
    <?=$translate[$lang]['Login']?> :
    <br>
    <input name='login' type="text"/>
    <br>
    <?=$translate[$lang]['Password']?> :
    <br>
    <input name='password' type="password"/>
    <br>
    <?=$translate[$lang]['Language']?> :
    <br>
    <select name="language">
        <option value="ru">ru</option>
        <option value="ua">ua</option>
        <option value="it">it</option>
        <option value="en">en</option>
    </select>
    <br>
    <a href="index.php"><input type="submit" val='send!'/>
    </a>
</form>
</body>
</html>