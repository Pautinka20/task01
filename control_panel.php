<?php
require_once("check.php");
if($user->isAdmin() || $user->isManager()){
    $temp = $user->role;
    if ($_POST['profile']) {
        $user->role = $_POST['profile'];
    }
    if ($temp != $user->role && $_POST['profile']) {
        header("Location: index.php");
    }
    echo $translate[$lang]['You can change your role below :'];
    if ($user->isAdmin() || $user->isManager()) {
        ?>
        <form method="POST">
            <select name="profile">
                <?php if($user->isAdmin()){?><option value="admin">admin</option><?php } ?>
                <option value="manager">manager</option>
                <option value="client">client</option>
            </select>
            <input type="submit"/>
        </form>
        <br>
        <a href="<?=$user->role?>.php"><?=$translate[$lang]['Back']?></a>
        <?php
    }
}
else {
    header('Location: index.php');
}
?>