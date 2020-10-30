
<!DOCTYPE html>
<html>
<head>
<style>

table, td, th {
  border: 1px solid black;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
require_once 'connect.php';

mysqli_select_db($conn,"ajax_demo");
$sql="SELECT * FROM `users` WHERE id = '$q'";
$result = mysqli_query($conn,$sql);
?>
<table>
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Login</th>
    <th>Language</th>
    <th>Role</th>
</tr>
    <?php
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['surname'] . "</td>";
  echo "<td>" . $row['login'] . "</td>";
    echo "<td>" . $row['language'] . "</td>";
  echo "<td>" . $row['role'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>