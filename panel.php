<?php
require_once("check.php");
if ($_POST['lang']) {
    $_SESSION['lang'] = $_POST['lang'];

}
if ($user->getLang()) {
    echo $translate[$lang]['Hello'] . ' ' . $user->name . ' ' . $user->surname . '. ' . $translate[$lang]['You'] . ' ' . $translate[$lang]['can'] . ' ' . $translate[$lang]['change'] . ' ' . $translate[$lang]['language'] . ' ' . $translate[$lang]['below'];
}
if (!$user->getLang()) {
    echo 'Change language to continue';
}
?>

<?php
if(!$user->isClient()){
    ?>
    <br>
    <br><a href="logs/logs.php">Логи</a></th></br>
    <br><th><a href="personal.php"><?php echo $translate[$lang]['Personal cabinet']?></a></th></br>
    <br><th><a href="control_panel.php"><?php echo $translate[$lang]['Control panel']?></a></th></br>
    <br><th><a href="users.php"><?php echo $translate[$lang]['User edit']?></a></th></br>
    <br><th><a href="find.php"><?=$translate[$lang]['Search']?></a></th></br>
    <?php
}
?>
<br>
<a href="index.php"><?=$translate[$lang]['Sign out']?></a>
<br>
<br>
<form method="POST">
    <select name="lang">
        <option value="ru">ru</option>
        <option value="ua">ua</option>
        <option value="it">it</option>
        <option value="en">en</option>
    </select>
    <input type="submit"/>
</form>

