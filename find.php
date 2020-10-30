<?php
require_once("check.php");
if(!$user->isAdmin()){
    header('Location: index.php');
}
else {
    ?>
    <?=$translate[$lang]['Enter this data to search']?> :
    <form action="find.php" method="GET">
        <br>
        <?=$translate[$lang]['Name']?> : <input name="name">
        <br>
        <br>
        <?=$translate[$lang]['Surname']?> : <input name="surname">
        <br>
        <br>
        <a href="find.php"><input type="submit" val='send!'/></a>
    </form>
    <?php
    if(isset($_GET)){
        $name=$_GET['name'];
        $surname=$_GET['surname'];
        foreach ($users as $key => $user1) {
            if ($name == $user1['name'] && $surname == $user1['surname']) {
                ?>
                <table border="1">
                <caption><?=$translate[$lang]['Searched user']?></caption>
                <tr>
                    <th>id</th>
                    <th><?=$translate[$lang]['Name']?></th>
                    <th><?=$translate[$lang]['Surname']?></th>
                    <th><?=$translate[$lang]['Login']?></th>
                    <th><?=$translate[$lang]['Language']?></th>
                    <th><?=$translate[$lang]['Role']?></th>
                </tr>
                <tr>
                    <td><?php echo $user1['id'] ?></td>
                    <td><?php echo $user1['name'] ?></td>
                    <td><?php echo $user1['surname'] ?></td>
                    <td><?php echo $user1['login'] ?></td>
                    <td><?php echo $user1['language'] ?></td>
                    <td><?php echo $user1['role'] ?></td>
                </tr>
                <?php
            }
        }
    }
    ?>
    </table>
    <br>
    <a href="<?=$user->role?>.php"><?=$translate[$lang]['Back']?></a>
<?php } ?>