<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = new mysqli($servername, $username, $password, logs);

function add_logs($connection, $logs2)
{
    $sql = $connection->prepare("INSERT INTO `logs` (`user`, `act`, `time`) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $logs2['id'], $logs2['act'], $logs2['time']);
    $sql->execute();
}

function delete_logs($connection, $logs2)
{
    $sql = $connection->prepare("INSERT INTO `logs` (`user`, `act`, `time`) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $logs2['id'], $logs2['act'], $logs2['time']);
    $sql->execute();
}

function edit_logs($connection, $logs2)
{
    $sql = $connection->prepare("INSERT INTO `logs` (`user`, `act`, `time`) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $logs2['id'], $logs2['act'], $logs2['time']);
    $sql->execute();
}

function add_new_user($connection, $logs2)
{
    $sql = $connection->prepare("INSERT INTO `logs` (`user`, `act`, `time`) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $logs2['id'], $logs2['act'], $logs2['time']);
    $sql->execute();
}

?>