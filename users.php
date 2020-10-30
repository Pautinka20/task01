<?php
require_once("check.php");
require_once ("logs/logs_connect.php");
if($user==NULL){
    header('Location: index.php');
}
else {
    if($user->isAdmin() || $user->isManager()){
    if(isset($_GET['del'])){
    delete_users($conn,$_GET['del']);
    $_GET['id']=$_SESSION['id'];
        $_GET['act']='Удалил пользователя id '.$_GET['del'];
        $_GET['time']=date("G:i:s, d.m.Y ");
        delete_logs($connection,$_GET);
        $_GET=NULL;
}
if(isset($_GET['id'])){
    edit_users($conn, $_GET);
    $_GET['act']='Изменил данные у id '.$_GET['id'];
    $_GET['time']=date("G:i:s, d.m.Y ");
    $_GET['id']=$_SESSION['id'];
    edit_logs($connection,$_GET);
}
if (isset($_GET['temp'])) {
    $a=0;
foreach ($users as $key => $user) {
    if ($_GET['login'] == $user['login']) {
        edit_users($conn, $_GET);
        $a=1;
    }
}
if($a==0) {
    $_GET['act']='Добавил нового пользователя';
    $_GET['id']=$_SESSION['id'];
    $_GET['time']=date("G:i:s, d.m.Y ");
    add_new_user($connection, $_GET);
        add_users($conn,$_GET);
    }
}
        ?>
        <html>
        <head>
            <meta charset="utf-8">
            <script>
                function showUser(str) {
                    if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                    } else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHint").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET","getuser.php?q="+str,true);
                        xmlhttp.send();
                    }
                }
            </script>
        </head>
        <body>
        <table border="1">
            <caption><?=$translate[$lang]['User table']?></caption>
            <tr>
                <th>id</th>
                <th><?=$translate[$lang]['Name']?></th>
                <th><?=$translate[$lang]['Surname']?></th>
                <th><?=$translate[$lang]['Login']?></th>
                <th><?=$translate[$lang]['Language']?></th>
                <th><?=$translate[$lang]['Role']?></th>
            </tr>
            <?php
            foreach ($users as $key => $user1) {
                ?>
                <tr>
                <td><?php echo $user1['id'] ?></td>
                <td><?php echo $user1['name'] ?></td>
                <td><?php echo $user1['surname'] ?></td>
                <td><?php echo $user1['login'] ?></td>
                <td><?php echo $user1['language'] ?></td>
                <td><?php echo $user1['role'] ?></td>
                <?php if($user->isAdmin()){?><td><a href="edit.php?id=<?= $user1['id']?>">edit</a></td>
                    <td><a href="users.php?del=<?=$user1['id']?>">delete</a></td>
                    </tr>
                    <?php
                }}
            ?>
        </table>
        <br>
        <?=$translate[$lang]['Search']?> :
        <div>
            <form>
                <select name="users" onchange="showUser(this.value)">
                    <?
                    mysqli_select_db($conn,"ajax_demo");
                    $sql="SELECT * FROM `users`";
                    $result = mysqli_query($conn,$sql);

                    echo '<option value="">' .'Select a person'. '</option>';
                    while($row = mysqli_fetch_array($result)) {
                        echo '<option value="'. $row['id'].'">'.$row['name'] ." " .$row['surname'].'</option>';
                    }
                    var_dump($row['id']);
                    ?>
                </select>
            </form>
            <div id="txtHint"><b></b></div>
        </div>
        <br>
        <?php if($user->isAdmin()){?><a href="add_user.php?add=new"><?=$translate[$lang]['Add new user']?></a>
            <br><?php }?>
        <a href="<?=$user->role?>.php"><?=$translate[$lang]['Back']?></a>
        </body>
        </html>
    <?php }
    else{
        header("Location : client.php");
    }} ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $('form').sumbit(function (e) {
        e.preventDefault();
        $.ajax({
            method: "GET",
            url: "/users.php",
            data:{
                name: $("#name").val(),
            },
        })
        .done(function (response) {
            $('tr:gt(0)').remove();
            $.each(response.data, function (index, value) {
                $('table').append('<tr><td>'+value.id+'</td><td>'+value.name+'</td><td>'+value.surname+'</td><td>'+value.login+'</td><td>'+value.lang+'</td><td>'+value.role+'</td></tr>');

            });
        });
    })
    $('#name').on('keyup',function (e) {
        $('form').trigger('submit');
    });
</script>










