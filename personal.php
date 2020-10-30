<?php
require_once("check.php");
require_once("update.php");
require_once ("logs/logs_connect.php");
if($user==NULL){
    header('Location: index.php');
}
else{ ?>
   <?php
    $temp1=$_GET['temp'];
    $temp2=0;
   if($_GET['id']!=0){
       edit_users_personal($conn,$_GET['name'],$_GET['surname'],$_GET['login'],$_GET['password'],$_GET['id'],$_GET['language']);
       $user->name=$_GET['name'];
       $user->surname=$_GET['surname'];
       $user->login=$_GET['login'];
       $user->password=$_GET['password'];
       $user->lang=$_GET['language'];
       $lang=$user->lang;
       $_GET['act']='Изменил данные о себе';
       $_GET['time']=date("G:i:s, d.m.Y ");
       add_logs($connection,$_GET);
   }
    if($temp1!=0){$temp2=1;}
    ?>
    <?=$translate[$lang]['Name']?> :
    <br><form>
        <input name='id' type="hidden" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$_SESSION['id']?>"/>
<input name='name' type="text" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$user->name?>"/>
    <br>
    <?=$translate[$lang]['Surname']?> :
    <br>
    <input name='surname' type="text" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$user->surname?>"/>
    <br>
    <?=$translate[$lang]['Login']?> :
    <br>
    <input name='login' type="text" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$user->login?>"/>
    <br>
    <?=$translate[$lang]['Password']?> :
    <br>
    <input name='password' type="password" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$user->password?>"/>
    <br>
    <?=$translate[$lang]['Language']?> :
    <br>
    <select name="language" <?php if($temp2==0){ ?>disabled<?php } ?>>
        <option value="<?=$user->lang?>"><?=$user->lang?></option>
        <option value="ru">ru</option>
        <option value="ua">ua</option>
        <option value="it">it</option>
        <option value="en">en</option>
    </select>
    <br>
<?php if($temp2!=0){ ?><a href="personal.php"><input type="submit" val='send!'/></a><?php } ?>
    </form>
    <br>
    <?php if($temp2==0){ ?><a href="personal.php?temp=1"><?=$translate[$lang]['Edit']?></a><?php } ?>
    <br>
    <?php if($temp2==0){?><a href="<?=$user->role?>.php"><?=$translate[$lang]['Back']?></a><?php } ?>
<?php if($temp2!=0){?><a href="personal.php"><?=$translate[$lang]['Back']?></a><?php } ?>
    <br>
    <a href="index.php"><?=$translate[$lang]['Sign out']?></a><br>
<?php
}
?>
