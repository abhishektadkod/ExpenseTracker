<?php
session_start();
include 'db_connect.php';

$d = $_POST["date"];
$desc = $_POST["des"];
$p = $_POST["price"];

$sql = "INSERT INTO exp (description,price,date,id)
VALUES ('".$desc."', '".$p."','".$d."','".$_SESSION['login_user']."')";

echo $sql;

if ($connection->query($sql) === TRUE) {
    $_SESSION['c1']=1;
    ?>
<script>
//alert('Signed in successfully!');

document.location.href='main.php';
</script>
<?php
}

else{?>
    <script>
   // alert('Enter the correct username or password!');
 document.location.href='main.php';
 </script>
<?php  }

$connection->close();
?> 