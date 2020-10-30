<?php
require_once(realpath('../check.php'));
require_once 'logs_connect.php';
$sql = "SELECT * FROM logs";
$result = mysqli_query($connection, $sql);
$logs = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <caption>Логи</caption>
        <table border="1">
        <tr>
            <th>id</th>
            <th>Действие</th>
            <th>Дата</th>
        </tr>
<?php
array_reverse($logs);
foreach ($logs as $key => $logs1) {
        ?>
        <tr>
            <td><?php echo $logs1['user'] ?></td>
            <td><?php echo $logs1['act'] ?></td>
            <td><?php echo $logs1['time'] ?></td>
        </tr>
        <?php
}
?>
            <br>
            <a href="../<?=$user->role?>.php"><?=$translate[$lang]['Back']?></a>
