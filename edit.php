<?php
require_once("check.php");
if(!$user->isAdmin()){
    header('Location: index.php');
}
else {
    $id=$_GET['id'];
    $temp_user=mysqli_query($conn,"SELECT * FROM `users` WHERE `id` = '$id'");
    $temp_user = mysqli_fetch_assoc($temp_user);
    ?>
    <html>
    <body>

    <h1><?=$translate[$lang]['Change user data']?></h1>
    <form action="users.php" method="GET">
        <?=$translate[$lang]['Name']?> :
        <br>
        <input type="hidden" name="id" value="<?=$temp_user['id']?>">
        <input name='name' type="text" value="<?=$temp_user['name']?>"/>
        <br>
        <?=$translate[$lang]['Surname']?> :
        <br>
        <input name='surname' type="text" value="<?=$temp_user['surname']?>"/>
        <br>
        <?=$translate[$lang]['Login']?> :
        <br>
        <input name='login' type="text" value="<?=$temp_user['login']?>"/>
        <br>
        <?=$translate[$lang]['Password']?> :
        <br>
        <input name='password' type="password" value="<?=$temp_user['password']?>"/>
        <br>
        <?=$translate[$lang]['Language']?> :
        <br>
        <select name="language">
            <option value="<?=$temp_user['language']?>"><?=$temp_user['language']?></option>
            <option value="ru">ru</option>
            <option value="ua">ua</option>
            <option value="it">it</option>
            <option value="en">en</option>
        </select>
        <br>
        <?=$translate[$lang]['Role']?> :
        <br>
        <select name="role">
            <option value="<?=$temp_user['role']?>"><?=$temp_user['role']?></option>
            <option value="admin">admin</option>
            <option value="manager">manager</option>
            <option value="client">client</option>
        </select>
        <br>
        <a href="users.php"><input type="submit" val='send!'/></a>
    </form>
    </body>
    </html>
<?php } ?>