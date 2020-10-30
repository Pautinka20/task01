<?php
require_once('check.php');
if($user==null){
    header('Location : index.php');
}
if($user->isManager()){
    header('HTTP/1.0 403 Forbidden');
}
require_once("panel.php");
?>